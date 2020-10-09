<?php

namespace JeroenG\Flickr;

use Illuminate\Support\Facades\Facade;

class FlickrLaravelFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'flickr';
    }
}
