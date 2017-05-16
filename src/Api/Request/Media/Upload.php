<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Media;

use PeeHaa\AsyncTwitter\Api\Request\Media\Response\UploadResponse;
use PeeHaa\AsyncTwitter\Exception;
use PeeHaa\AsyncTwitter\Request\FieldParameter;
use PeeHaa\AsyncTwitter\Request\FileParameter;

/**
 * @link https://dev.twitter.com/rest/reference/post/media/upload-append
 */
class Upload extends BaseRequest
{
    const METHOD   = 'POST';
    const ENDPOINT = '/media/upload.json';

    public function __construct()
    {
        parent::__construct(self::METHOD, self::ENDPOINT);
    }

    public function setAdditionalOwners(array $userIds)
    {
        if (count($userIds) > 100) {
            throw new Exception('A maximum of 100 addition owners can be specified for a media resource');
        }

        foreach ($userIds as $id) {
            if (!\ctype_digit((string)$id)) {
                throw new Exception('User IDs must be numeric');
            }
        }

        $this->parameters['additional_owners'] = implode(',', $userIds);

        return $this;
    }

    public function getParameters(): array
    {
        $parameters = [new FileParameter('media', $this->parameters['file_path'])];

        if (isset($this->parameters['additional_owners'])) {
            $parameters[] = new FieldParameter('additional_owners', $this->parameters['additional_owners']);
        }

        return $parameters;
    }

    public function handleResponse(array $responseData)
    {
        $mediaId = $responseData['media_id_string'] ?? '';
        $size = (int)($responseData['size'] ?? 0);
        $expiryTime = new \DateTimeImmutable('@' . (time() + ($responseData['expires_after_secs'] ?? 0)));
        $mimeType = $responseData['image']['image_type'] ?? '';
        $width = (int)($responseData['image']['w'] ?? 0);
        $height = (int)($responseData['image']['h'] ?? 0);

        return new UploadResponse($mediaId, $size, $expiryTime, $mimeType, $width, $height);
    }
}
