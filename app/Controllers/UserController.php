<?php

namespace App\Controllers;

use App\Config\Session;
use App\Models\User;
use App\Validators\Users\RegisterValidator;

class UserController
{
    private readonly User $user;
    private readonly Session $session;

    public function __construct()
    {
        $this->user = new User();
        $this->session = new Session();
    }

    public function login(array $data): bool
    {
        $validator = new RegisterValidator();

        if(!$validator->validateData($data) || !$this->user->exists($data['email'])) {
            return false;
        }

        $user = $this->user->getByEmail($data['email']);

        if(!password_verify($data['password'], $user['password'])) {
            return false;
        }

        $this->session->set("loggedIn", true);
        $this->session->set("user", $user['id']);
        return true;
    }

    public function register(array $data): bool
    {
        $validator = new RegisterValidator();

        if(!$validator->validateData($data) || $this->user->exists($data['email'])) {
            return false;
        }

        $this->user->register($data['email'], $data['password']);

        $user = $this->user->getByEmail($data['email']);
        $this->session->set("loggedIn", true);
        $this->session->set("user", $user['id']);
        return true;
    }
}