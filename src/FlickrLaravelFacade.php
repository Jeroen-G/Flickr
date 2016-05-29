<?php

namespace JeroenG\Flickr;

use Illuminate\Support\Facades\Facade;

class FlickrLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flickr';
    }
}
