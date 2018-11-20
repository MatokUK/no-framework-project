<?php

namespace WS\Http;

abstract class RequestFactory
{
    public static function createRequest(array $server, array $postData = [])
    {
        $getData = static::parseUrlQuery($server['REQUEST_URI']);
        $request = new Request($getData, $postData);

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

    private static function parseUrlQuery($uri)
    {
        $parsed = parse_url($uri);
        if (!isset($parsed['query'])) {
            return [];
        }
        $parsedPairs = explode('&', $parsed['query']);

        $result = [];
        foreach ($parsedPairs as $parsedPair) {
            $keyValue = explode('=', $parsedPair, 2);
            $result[$keyValue[0]] = isset($keyValue[1]) ? $keyValue[1] : null;
        }

        return $result;
    }
}