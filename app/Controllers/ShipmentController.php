<?php

namespace App\Controllers;

use App\Config\Session;
use App\Models\Shipments;
use App\Validators\Shipments\CreateShipmentValidator;

class ShipmentController
{

    private readonly Session $session;
    private readonly Shipments $shipments;

    public function __construct()
    {
        $this->session = new Session();
        $this->shipments = new Shipments();
    }

    public function create(array $data): bool
    {
        $validator = new CreateShipmentValidator();

        if(!$validator->validateData($data)) {
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }

        $this->shipments->create($this->session->get('user'), $data);

        return true;
    }
}