<?php

namespace WS\Session;

class FlashMessage
{
    private $read = false;

    public function __construct()
    {
        session_start();
    }

    public function addSuccess($message)
    {
        $this->addMessage('msg_success', $message);
    }

    public function addError($message)
    {
        $this->addMessage('msg_error', $message);
    }

    private function addMessage($key, $message)
    {
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = [];
        }

        $_SESSION[$key][] = $message;
    }

    public function getMessages($type)
    {
        $this->read = true;

        $key = $type === 'success' ? 'msg_success' : 'msg_error';

        return isset($_SESSION[$key]) ? $_SESSION[$key] : [];
    }

    public function __destruct()
    {
        if ($this->read) {
            unset($_SESSION['msg_success']);
            unset($_SESSION['msg_error']);
        }
    }
}