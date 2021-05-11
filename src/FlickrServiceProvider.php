<?php

namespace JeroenG\Flickr;

use Illuminate\Support\ServiceProvider;

class FlickrServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->app->singleton(
            'flickr',
            function ($app) {
                $api = new Api(config('services.flickr.key', env('FLICKR_KEY')));

                return new Flickr($api);
            }
        );
    }

    public function provides(): array
    {
        return ['flickr'];
    }
}
