<?php

use Dotenv\Dotenv;
use JeroenG\Flickr\Api;
use JeroenG\Flickr\Flickr;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public Flickr $flickr;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->safeLoad();
        parent::__construct();

        $api = new Api($_ENV['FLICKR_KEY'], 'php_serial');
        $this->flickr = new Flickr($api);
    }

    public function testEcho(): void
    {
        $test = $this->flickr->echoThis('helloworld');
        self::assertEquals('ok', $test->stat);
        self::assertEquals('php_serial', $test->getContent('format'));
        self::assertEquals('helloworld', $test->getContent('this'));
    }
}
