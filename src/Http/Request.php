<?php

namespace WS\Http;

class Request
{
    /** @var string */
    private $routePath;

    /** @var string */
    private $method;

    /** @var array */
    private $query;

    /** @var array */
    private $post;

    public function __construct(array $query = [], array $post = [])
    {
        $this->query = $query;
        $this->post = $post;
    }

    public function setRoutePath(string $path)
    {
        $this->routePath = $path;
    }

    public function getRoutePath(): string
    {
        return $this->routePath;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    public function query($key, $default = null)
    {
        if (isset($this->query[$key])) {
            return $this->query[$key];
        }

        return $default;
    }

    public function post($key, $default = null)
    {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }

        return $default;
    }

    public function isPost(): bool
    {
        return 'POST' === strtoupper($this->method);
    }

    public function isGet(): bool
    {
        return 'GET' === strtoupper($this->method);
    }
}