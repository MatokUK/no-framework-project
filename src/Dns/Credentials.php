<?php

namespace WS\Dns;

class Credentials
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $domain;

    public function __construct($username, $password, $domain)
    {
        $this->username = $username;
        $this->password = $password;
        $this->domain = $domain;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDomain()
    {
        return $this->domain;
    }
}