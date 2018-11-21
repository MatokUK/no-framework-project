<?php

namespace WS\Session;

class CSRF
{
    public function __construct()
    {
        SessionStarter::start();
    }

    public function generate()
    {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));

        return $_SESSION['csrf'];
    }

    public function validate($userToken)
    {
        return hash_equals($_SESSION['csrf'], $userToken);
    }
}