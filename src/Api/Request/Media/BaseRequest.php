<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Media;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest as ApiBaseRequest;

abstract class BaseRequest extends ApiBaseRequest implements Request
{
    const BASE_URL = 'http://upload.twitter.com/1.1';

    /**
     * @param string $filePath
     * @return $this
     */
    public function setFilePath(string $filePath)
    {
        $this->parameters['file_path'] = $filePath;

        return $this;
    }
}
