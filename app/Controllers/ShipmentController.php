<?php

namespace App\Controllers;

use App\Config\Session;
use App\Validators\Shipments\CreateShipmentValidator;

class ShipmentController
{

    private readonly Session $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function create(array $data): bool
    {
        $validator = new CreateShipmentValidator();

        if(!$validator->validateData($data)) {
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }
        die("X");

        return true;
    }
}