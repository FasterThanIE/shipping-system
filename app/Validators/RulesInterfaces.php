<?php

namespace App\Validators;

interface RulesInterfaces
{
    public function rules(): array;
    public function validateData(array $data): bool;
}