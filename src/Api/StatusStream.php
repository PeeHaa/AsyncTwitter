<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api;

use Amp\Deferred;
use Amp\Failure;
use Amp\Promise;
use Amp\Success;

class StatusStream implements Stream
{
    private $buffer = [];

    /**
     * @var Deferred
     */
    private $readPromisor = null;

    private $error = null;
    private $ended = false;

    private function resolveReadPromise($value): bool
    {
        $promisor = $this->readPromisor;
        $this->readPromisor = null;

        if ($promisor === null) {
            return false;
        }

        $promisor->succeed($value);

        return true;
    }

    public function update($status)
    {
        if (!$this->resolveReadPromise($status)) {
            $this->buffer[] = $status;
        }
    }

    public function end()
    {
        $this->ended = true;

        $this->resolveReadPromise(null);
    }

    public function fail(\Throwable $error)
    {
        $this->error = $error;

        $promisor = $this->readPromisor;
        $this->readPromisor = null;

        if ($promisor !== null) {
            $promisor->fail($error);
        }
    }

    public function read(): Promise
    {
        if ($this->error !== null) {
            return new Failure($this->error);
        }

        if ($this->ended) {
            return new Success(null);
        }

        if (count($this->buffer) > 0) {
            return new Success(\array_shift($this->buffer));
        }

        if ($this->readPromisor === null) {
            $this->readPromisor = new Deferred;
        }

        return $this->readPromisor->promise();
    }

    public function close()
    {
        $this->end(); // todo
    }
}
