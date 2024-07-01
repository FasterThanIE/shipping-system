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
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }

        $user = $this->user->getByEmail($data['email']);

        if(!password_verify($data['password'], $user['password'])) {
            $this->session->set("form_validation_error", "Niste uneli dobru sifru, probajte ponovo.");
            return false;
        }

        $this->session->set("loggedIn", true);
        $this->session->set("user", $user['id']);
        return true;
    }

    public function logout(): bool
    {
        $this->session->delete("loggedIn");
        $this->session->delete("user");
        return true;
    }

    public function register(array $data): bool
    {
        $validator = new RegisterValidator();

        if(!$validator->validateData($data) || $this->user->exists($data['email'])) {
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }

        $this->user->register($data['email'], $data['password']);

        $user = $this->user->getByEmail($data['email']);
        $this->session->set("loggedIn", true);
        $this->session->set("user", $user['id']);
        return true;
    }
}