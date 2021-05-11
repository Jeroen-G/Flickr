<?php

namespace JeroenG\Flickr;

class Flickr
{
    public Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function request(string $method, ?array $parameters = null): Response
    {
        return $this->api->request($method, $parameters);
    }

    /**
     * Flickr echo request, for testing purposes.
     */
    public function echoThis(string $string): Response
    {
        return $this->request('flickr.test.echo', ['this' => $string]);
    }

    /**
     * Get a list of photosets.
     */
    public function listSets(?array $parameters = null): Response
    {
        return $this->request('flickr.photosets.getList', $parameters);
    }

    /**
     * Get all photos in a photoset.
     */
    public function photosForSet(
        string $setId,
        string $userId,
        ?array $otherParameters = null
    ): Response {
        $parameters['photoset_id'] = $setId;
        $parameters['user_id'] = $userId;

        if (is_array($otherParameters)) {
            $parameters = array_merge($parameters, $otherParameters);
        }

        return $this->request('flickr.photosets.getPhotos', $parameters);
    }

    /**
     * Get all info on a photo.
     */
    public function photoInfo(string $photoId, ?string $secretId = null): Response
    {
        $parameters['photo_id'] = $photoId;

        if (! is_null($secretId)) {
            $parameters['secret'] = $secretId;
        }

        return $this->request('flickr.photos.getInfo', $parameters);
    }
}
