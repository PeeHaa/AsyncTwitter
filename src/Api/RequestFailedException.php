<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api;

use PeeHaa\AsyncTwitter\Exception;

class RequestFailedException extends Exception
{
    private $extraErrorInfo;

    public function __construct(string $message, int $code = 0, \Throwable $previous = null, array $extraErrorInfo = [])
    {
        parent::__construct($message, $code, $previous);

        $this->extraErrorInfo = $extraErrorInfo;
    }

    public function hasExtraErrorInfo(): bool
    {
        return (bool)count($this->extraErrorInfo);
    }

    public function getExtraErrorInfo(): array
    {
        return $this->extraErrorInfo;
    }
}
