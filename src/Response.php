<?php

namespace JeroenG\Flickr;

use Psr\Http\Message\ResponseInterface;

class Response
{
    protected array $contents;

    public function __construct(ResponseInterface $guzzleResponse)
    {
        $this->contents = unserialize($guzzleResponse->getBody()->getContents());
    }

    public function getStatus(): string
    {
        return $this->contents['stat'];
    }

    public function getContent(string $method): string
    {
        return $this->contents[$method]['_content'];
    }

    public function __get($variable)
    {
        return $this->contents[$variable];
    }
}
