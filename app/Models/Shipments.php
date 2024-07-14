<?php

namespace App\Models;

use App\Config\MySql;
use PDO;

class Shipments extends MySql
{
    public function create(int $userId, array $data): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO shipments (user_id, size, method, location_from, location_to, price, note, delivery_info) 
            VALUES (:user_id, :size, :method, :location_from, :location_to, :price, :note, :delivery_info)
        ");

        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":size", $data['size']);
        $stmt->bindParam(":method", $data['method']);
        $stmt->bindParam(":location_from", $data['location_from']);
        $stmt->bindParam(":location_to", $data['location_to']);
        $stmt->bindParam(":price", $data['price']);
        $stmt->bindParam(":note", $data['note']);
        $stmt->bindParam(":delivery_info", $data['delivery_info']);

        $stmt->execute();
    }

    public function getShipmentById(int $id): array
    {
        $stmt = $this->db->prepare("SELECT * FROM shipments WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM shipments WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function getShipmentsForUser(int $userId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM shipments WHERE user_id = :userId");
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}