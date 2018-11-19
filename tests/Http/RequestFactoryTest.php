<?php

namespace WS\Test\Http;

use PHPUnit\Framework\TestCase;
use WS\Http\RequestFactory;

class RequestFactoryTest extends TestCase
{
    /**
     * @dataProvider routePathTests
     */
    public function testPathOfCreatedRequest($uri, $expectedRoutePath)
    {
        $server = ['REQUEST_URI' => $uri];
        $request = RequestFactory::createRequest($server);

        $this->assertEquals($expectedRoutePath, $request->getRoutePath());
    }

    /**
     * @dataProvider isGetTests
     */
    public function testIsGet($method, $expectedResult)
    {
        $server = ['REQUEST_METHOD' => $method];
        $request = RequestFactory::createRequest($server);

        $this->assertEquals($expectedResult, $request->isGet());
    }
    /**
     * @dataProvider isPostTests
     */
    public function testIsPost($method, $expectedResult)
    {
        $server = ['REQUEST_METHOD' => $method];
        $request = RequestFactory::createRequest($server);

        $this->assertEquals($expectedResult, $request->isPost());
    }

    public function isGetTests()
    {
        return [
            ['get', true],
            ['GET', true],
            ['post', false],
            ['POST', false],
            ['foo', false],
        ];
    }

    public function isPostTests()
    {
        return [
            ['post', true],
            ['POST', true],
            ['get', false],
            ['GET', false],
            ['foo', false],
        ];
    }

    public function routePathTests()
    {
        return [
            ['/foo', '/foo'],
            ['/foo?param=value', '/foo'],
            ['/foo?param=value#something', '/foo'],
            ['/foo#something', '/foo'],
        ];
    }
}