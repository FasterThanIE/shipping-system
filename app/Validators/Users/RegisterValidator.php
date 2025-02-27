<?php

namespace App\Validators\Users;

use App\Validators\BaseValidator;
use App\Validators\RulesInterfaces;

class RegisterValidator extends BaseValidator implements RulesInterfaces
{
    public function validateData(array $data): bool
    {
        return $this->validate($data, $this->rules());
    }

    public function rules(): array
    {
        return ['email', 'password'];
    }
}