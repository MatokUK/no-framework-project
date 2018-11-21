<?php

namespace WS\Session;


abstract class SessionStarter
{
    public static function start()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
    }
}