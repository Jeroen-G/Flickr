<?php

namespace JeroenG\Flickr;

use Illuminate\Support\ServiceProvider;

class FlickrServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app->singleton('flickr', function ($app) {
            $api = new Api(config('services.flickr.key', env('FLICKR_KEY')));

            return new Flickr($api);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['flickr'];
    }
}
