<?php

namespace JeroenG\Flickr;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * The contents of the Guzzle response.
     *
     * @var object
     */
    protected $contents;

    /**
     * Create a new Response instance.
     *
     * @param \Psr\Http\Message\ResponseInterface $guzzleResponse
     */
    public function __construct(ResponseInterface $guzzleResponse)
    {
        $this->contents = unserialize($guzzleResponse->getBody()->getContents());
    }

    /**
     * Get the status of the Flickr API call.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->contents['stat'];
    }

    /**
     * Get a '_content' value from the contents of the Flickr API call.
     *
     * @param  string $method
     * @return string
     */
    public function getContent($method)
    {
        return $this->contents[$method]['_content'];
    }

    /**
     * Get magically a regular value from the contents of the Flickr API call.
     *
     * @param  string $variable
     * @return mixed
     */
    public function __get($variable)
    {
        return $this->contents[$variable];
    }
}
