<?php

namespace App\Config;

class Session
{
    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get(string $key): mixed
    {
        return $_SESSION[$key];
    }

    public function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }
}