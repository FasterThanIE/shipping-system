<?php

namespace App\Controllers;

use App\Models\User;
use App\Validators\Users\RegisterValidator;

class UserController
{
    private readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function register(array $data): bool
    {
        $validator = new RegisterValidator();

        if(!$validator->validateData($data) || $this->user->exists($data['email'])) {
            return false;
        }

        $this->user->register($data['email'], $data['password']);
        return true;
    }
}