<?php

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public $flickr;

    public function __construct()
    {
        parent::__construct();

        $api = new JeroenG\Flickr\Api($_ENV['FLICKR_KEY'], 'php_serial');
        $this->flickr = new JeroenG\Flickr\Flickr($api);
    }

    public function testEcho()
    {
        $test = $this->flickr->echoThis('helloworld');

        $this->assertEquals('ok', $test->stat);
        $this->assertEquals('php_serial', $test->getContent('format'));
    }
}
