<?php

namespace JeroenG\Flickr;

use GuzzleHttp\Client;

class Api
{
    protected string $key;

    protected Client $client;

    public string $format;

    public function __construct(
        string $apiKey,
        string $format = 'php_serial',
        string $endpoint = 'https://api.flickr.com/services/rest/'
    ) {
        $this->key = $apiKey;
        $this->format = $format;

        $this->client = new Client(
            [
                'base_uri' => $endpoint,
            ]
        );
    }

    public function request(string $call, ?array $parameters = null)
    {
        $guzzleResponse = $this->client->get(
            $this->api().'&method='.
            $call.$this->parameters($parameters)
        );

        if ($guzzleResponse->getStatusCode() === 200) {
            return new Response($guzzleResponse);
        }

        return 'Failed request';
    }

    protected function api(): string
    {
        return '?api_key='.$this->key.'&format='.$this->format;
    }

    protected function parameters(array $array): string
    {
        if (! is_array($array)) {
            return '';
        }

        $encoded = [];

        foreach ($array as $k => $v) {
            $encoded[] = urlencode($k).'='.urlencode($v);
        }

        return '&'.implode('&', $encoded);
    }
}
