# :package_name

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Quality Score][ico-code-quality]][link-code-quality]

Modern PHP package to make Flickr API calls. Ships with Laravel implementation.

## Install

Via Composer

``` bash
$ composer require jeroen-g/flickr
```

## Usage

### General

```php
// $key is your Flickr API key. $format is optional, it sets the Flickr response format.
$flickr = new JeroenG\Flickr\Flickr(new JeroenG\Flickr\Api($key, $format));

// https://www.flickr.com/services/api/flickr.test.echo.html
$echoTest = $flickr->echoThis('helloworld');

// https://www.flickr.com/services/api/flickr.photosets.getList.html
$photosets = $flickr->listSets($arrayOfParameters);

// Setting up other API requests. See https://www.flickr.com/services/api
$result = $flickr->request('flickr.method', $arrayOfParameters);
```

### Laravel

Add the Service Provider and (optionally) the facade to config/app.php:
`JeroenG\Flickr\FlickrServiceProvider::class,`
`'Flickr' => JeroenG\Flickr\FlickrLaravelFacade::class,`
In your .env file, set a `FLICKR_KEY` and `FLICKR_SECRET` with your Flickr API key and secret. More information on this is found [here](https://www.flickr.com/services/api/keys/).

The functions act mostly the same as above, for example:
```php
$echoTest = Flickr::echoThis('helloworld');
```

## Change log

Please see the [changelog](changelog.md) for more information what has changed recently.

## Contributing

Please see [contributing](contributing.md) for details.

## Credits

- [JeroenG][link-author]
- [All Contributors][link-contributors]

## License

The EUPL License. Please see the [License File](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jeroen-g/flickr.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jeroen-g/flickr.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jeroen-g/flickr
[link-code-quality]: https://scrutinizer-ci.com/g/jeroen-g/flickr
[link-author]: https://github.com/Jeroen-G
[link-contributors]: ../../contributors