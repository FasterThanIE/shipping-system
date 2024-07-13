<?php


namespace App\Validators\Shipments;

use App\Models\Shipments;
use App\Validators\BaseValidator;
use App\Validators\RulesInterfaces;

class NewShipmentValidator extends BaseValidator implements RulesInterfaces
{

    public function rules(): array
    {
        return [
            'locationFrom', 'locationTo',
            'price', 'size', 'method',
        ];
    }

    public function validateDataWithFlags(array $data): bool
    {
        return $this->validateData($data)
            && in_array($data['size'], Shipments::ALLOWED_SIZES)
            && in_array($data['method'], Shipments::ALLOWED_METHODS);
    }

    public function validateData(array $data): bool
    {
        return $this->validate($data, $this->rules());
    }
}