<?php

namespace JeroenG\Flickr;

use GuzzleHttp\Client;

class Api
{
    /**
     * Flickr API key.
     * 
     * @var string
     */
    protected $key;

    /**
     * Guzzle Client instance.
     * 
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Flickr API response format.
     * 
     * @var string
     */
    public $format;

    /**
     * Create a new Flickr Api instance.
     * 
     * @param  string $apiKey
     * @param  string $format
     * @param  string $endpoint
     * @return void
     */
    public function __construct($apiKey, $format = 'rest', $endpoint = 'https://api.flickr.com/services/rest/')
    {
        $this->key = $apiKey;
        $this->format = $format;

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $endpoint,
        ]);
    }

    /**
     * Make a Flickr API request.
     * 
     * @param  string                   $call
     * @param  array|null               $parameters
     * @return \JeroenG\Flickr\Response
     */
    public function request($call, $parameters = null)
    {
        $guzzleResponse = $this->client->get($this->api().'&method='.$call.$this->parameters($parameters));

        if ($guzzleResponse->getStatusCode() == 200) {
            return new Response($guzzleResponse);
        } else {
            return 'Failed request';
        }
    }

    /**
     * Compile the standard API part of the REST request.
     * 
     * @return string
     */
    protected function api()
    {
        return '?api_key='.$this->key.'&format='.$this->format;
    }

    /**
     * Compile the parameters from an array into a string.
     * 
     * @param  array  $array
     * @return string
     */
    protected function parameters($array)
    {
        if ( ! is_array($array)) {
            return;
        }
        $encoded = [];

        foreach ($array as $k => $v) {
            $encoded[] = urlencode($k).'='.urlencode($v);
        }

        return '&'.implode('&', $encoded);
    }
}
