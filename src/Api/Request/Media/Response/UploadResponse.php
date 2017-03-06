<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Media\Response;

class UploadResponse
{
    private $mediaId;
    private $size;
    private $expiryTime;
    private $mimeType;
    private $width;
    private $height;

    public function __construct(
        string $mediaId, int $size, \DateTimeImmutable $expiryTime,
        string $mimeType, int $width, int $height
    ) {
        $this->mediaId = $mediaId;
        $this->size = $size;
        $this->expiryTime = $expiryTime;
        $this->mimeType = $mimeType;
        $this->width = $width;
        $this->height = $height;
    }

    public function getMediaId(): string
    {
        return $this->mediaId;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getExpiryTime(): \DateTimeImmutable
    {
        return $this->expiryTime;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}
