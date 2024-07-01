<?php

namespace App\Validators;

class BaseValidator
{
    public function validate(array $data, array $rules): bool
    {
        foreach ($rules as $rule) {
            if(!array_key_exists($rule, $data)) {
                return false;
            }
        }
        return true;
    }
}