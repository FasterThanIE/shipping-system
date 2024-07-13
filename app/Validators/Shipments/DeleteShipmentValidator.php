<?php


namespace App\Validators\Shipments;

use App\Validators\BaseValidator;
use App\Validators\RulesInterfaces;

class DeleteShipmentValidator extends BaseValidator implements RulesInterfaces
{

    public function rules(): array
    {
        return ['id',];
    }

    public function validateData(array $data): bool
    {
        return $this->validate($data, $this->rules());
    }
}