<?php

namespace App\Controllers;

use App\Config\Session;
use App\Models\Shipments;
use App\Models\User;
use App\Validators\Shipments\DeleteShipmentValidator;
use App\Validators\Shipments\NewShipmentValidator;

class ShipmentsController
{
    private readonly Session $session;
    private readonly Shipments $shipments;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->session = new Session();
        $this->shipments = new Shipments();

        if(!$this->session->hasKey('user')) {
            throw new \Exception("Cannot be invoked by guests");
        }

    }

    public function createShipment(array $data): bool
    {
        $validator = new NewShipmentValidator();

        if(!$validator->validateDataWithFlags($data)) {
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }

        $data['sender'] = $this->session->get('user');
        $this->shipments->create($data);

        return true;
    }

    public function deleteShipment(array $data): bool
    {
        $validator = new DeleteShipmentValidator();

        if(!$validator->validateData($data)) {
            $this->session->set("form_validation_error", "Niste dobro uneli podatke");
            return false;
        }

        $shipment = $this->shipments->getShipmentById($data['id']);

        if($shipment['sender'] !== $this->session->get('user')) {
            return false;
        }

        $this->shipments->deleteById($data['id']);

        return true;
    }
}