<?php

namespace WS\Test\Http;

use PHPUnit\Framework\TestCase;
use WS\Http\Request;

class RequestTest extends TestCase
{
    public function testQuery()
    {
        $request = new Request(['foo' => 'bar']);

        $this->assertEquals('bar', $request->query('foo'));
        $this->assertEquals('xxx', $request->query('baz', 'xxx'));
        $this->assertNull($request->query('baz'));
    }

    public function testPost()
    {
        $request = new Request([], ['foo' => 'bar']);

        $this->assertEquals('bar', $request->post('foo'));
        $this->assertEquals('xxx', $request->post('baz', 'xxx'));
        $this->assertNull($request->post('baz'));
    }
}