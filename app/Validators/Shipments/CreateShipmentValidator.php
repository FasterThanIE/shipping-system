<?php

namespace App\Validators\Shipments;

use App\Validators\BaseValidator;
use App\Validators\RulesInterfaces;

class CreateShipmentValidator extends BaseValidator implements RulesInterfaces
{
    public function validateData(array $data): bool
    {
        return $this->validate($data, $this->rules());
    }

    public function rules(): array
    {
        return [
            'method', 'size', 'location_from',
            'location_to', 'price', 'note',
            'delivery_info',
        ];
    }
}