<?php

namespace App\Controllers;

use App\Config\Session;
use App\Models\Shipments;
use App\Validators\Shipments\CreateShipmentValidator;
use App\Validators\Shipments\DeleteShipmentValidator;

class ShipmentController
{

    private readonly Session $session;
    private readonly Shipments $shipments;

    public function __construct()
    {
        $this->session = new Session();
        $this->shipments = new Shipments();
    }

    public function delete(array $data): bool
    {
        $validator = new DeleteShipmentValidator();

        if(!$validator->validateData($data)) {
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }

        $shipment = $this->shipments->getShipmentById($data['id']);

        if($shipment === null || $shipment['user_id'] !== $this->session->get('user')) {
            return false;
        }

        $this->shipments->delete($data['id']);

        return true;
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