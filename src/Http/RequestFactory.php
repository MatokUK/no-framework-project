<?php

namespace WS\Http;

abstract class RequestFactory
{
    public static function createRequest(array $server, array $postData = [])
    {
        $request = new Request([], $postData);

        $request->setRoutePath(static::parsePath($server));
        if (!isset($server['REQUEST_METHOD'])) {
            $server['REQUEST_METHOD'] = 'GET';
        }
        $request->setMethod($server['REQUEST_METHOD']);

        return $request;
    }

    private static function parsePath(array $server)
    {
        if (isset($server['REQUEST_URI']) && !empty($server['REQUEST_URI'])) {
            return preg_replace('/[?#].*$/', '', $server['REQUEST_URI']);
        }

        return '/';
    }
}