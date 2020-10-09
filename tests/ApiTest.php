<?php

use JeroenG\Flickr\Flickr;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public Flickr $flickr;

    public function __construct()
    {
        parent::__construct();

        $api = new JeroenG\Flickr\Api($_ENV['FLICKR_KEY'], 'php_serial');
        $this->flickr = new JeroenG\Flickr\Flickr($api);
    }

    public function testEcho(): void
    {
        $test = $this->flickr->echoThis('helloworld');

        $this->assertEquals('ok', $test->stat);
        $this->assertEquals('php_serial', $test->getContent('format'));
    }
}
