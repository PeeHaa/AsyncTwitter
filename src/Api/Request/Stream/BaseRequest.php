<?php declare(strict_types = 1);

namespace PeeHaa\AsyncTwitter\Api\Request\Stream;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest as ApiBaseRequest;

abstract class BaseRequest extends ApiBaseRequest implements Request
{
    const BASE_URL = 'https://stream.twitter.com/1.1';

    /**
     * @param string $level
     * @return $this
     */
    public function filterLevel(string $level)
    {
        $this->parameters['filter_level'] = $level;

        return $this;
    }

    /**
     * @param string[] $languages
     * @return $this
     */
    public function language(array $languages)
    {
        $this->parameters['language'] = implode(',', $languages);

        return $this;
    }
}
