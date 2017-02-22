<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Client;

use Amp\Artax\Notify;
use Amp\Deferred;
use Amp\Promise;
use ExceptionalJSON\DecodeErrorException;
use PeeHaa\AsyncTwitter\Api\Client\Exception\StreamFailureException;
use PeeHaa\AsyncTwitter\Api\Client\Exception\StreamOpenFailureException;
use PeeHaa\AsyncTwitter\Api\StatusStream;

class StreamReader
{
    /**
     * @uses processResponseHeaders
     * @uses processBodyData
     * @uses processResponseComplete
     * @uses processError
     */
    private static $progressHandlers = [
        Notify::RESPONSE_HEADERS   => 'processResponseHeaders',
        Notify::RESPONSE_BODY_DATA => 'processBodyData',
        Notify::RESPONSE           => 'processResponseComplete',
        Notify::ERROR              => 'processError',
    ];

    /**
     * @var StatusStream
     */
    private $stream;

    private $openDeferred;
    private $inflateCtx;
    private $rawDataBuffer = '';

    public function __construct()
    {
        $this->openDeferred = new Deferred;
    }

    private function processBodyData(string $data)
    {
        if ($this->stream === null) {
            return;
        }

        /** @noinspection PhpUndefinedFunctionInspection */
        $this->rawDataBuffer .= $this->inflateCtx !== null
            ? \inflate_add($this->inflateCtx, $data)
            : $data;

        while (false !== $pos = \strpos($this->rawDataBuffer, "\r\n")) {
            if ($pos > 0) {
                try {
                    $this->stream->update(\json_try_decode(\substr($this->rawDataBuffer, 0, $pos), true));
                } catch (DecodeErrorException $e) {
                    $this->stream->fail(new StreamFailureException('Error decoding stream data', 0, $e));
                    $this->inflateCtx = $this->stream = null;
                    return;
                }
            }

            $this->rawDataBuffer = (string)\substr($this->rawDataBuffer, $pos + 2);
        }
    }

    private function processResponseHeaders(array $info)
    {
        static $zlibEncodingMap = [
            'gzip'    => ZLIB_ENCODING_GZIP,
            'x-gzip'  => ZLIB_ENCODING_GZIP,    // recommended for compatibility by MDN
            'deflate' => ZLIB_ENCODING_DEFLATE,
        ];

        $status = (int)($info['status'] ?? -1);
        $headers = (array)($info['headers'] ?? []);

        if ($status !== 200) {
            $this->openDeferred->fail(new StreamOpenFailureException("Server responded with HTTP status {$status}"));
        }

        $encoding = 'identity';

        foreach ($headers as $name => $values) {
            if (\strtolower($name) !== 'content-encoding') {
                continue;
            }

            $encoding = \strtolower($values[0] ?? 'identity');
        }

        if ($encoding !== 'identity') {
            if (!isset($zlibEncodingMap[$encoding])) {
                $this->openDeferred->fail(
                    new StreamOpenFailureException("Server is using an encoding format I don't understand: {$encoding}")
                );
            }

            /** @noinspection PhpUndefinedFunctionInspection */
            $this->inflateCtx = \inflate_init($zlibEncodingMap[$encoding]);
        }

        $this->stream = new StatusStream;

        $this->openDeferred->succeed($this->stream);
    }

    private function processError(\Throwable $error)
    {
        if ($this->stream === null) {
            return;
        }

        $this->stream->fail(new StreamFailureException("HTTP request error", 0, $error));
        $this->inflateCtx = $this->stream = null;
    }

    private function processResponseComplete()
    {
        if ($this->stream === null) {
            return;
        }

        $this->stream->end();
        $this->inflateCtx = $this->stream = null;
    }

    public function awaitStreamOpen(): Promise
    {
        return $this->openDeferred->promise();
    }

    public function onProgress(array $data)
    {
        if (!isset(self::$progressHandlers[$data[0]])) {
            return;
        }

        \call_user_func([$this, self::$progressHandlers[$data[0]]], $data[1]);
    }
}
