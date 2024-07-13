<?php

namespace App\Models;

use App\Config\MySql;
use PDO;

class Shipments extends MySql
{

    const STATUS_SENT       = 1;
    const STATUS_RECEIVED   = 2;
    const STATUS_REJECTED   = 3;
    const STATUS_RETURNED   = 4;

    const ALLOWED_STATUSES = [
        self::STATUS_SENT, self::STATUS_RECEIVED,
        self::STATUS_REJECTED, self::STATUS_RETURNED,
    ];

    const SIZE_SMALL    = 1;
    const SIZE_MEDIUM   = 2;
    const SIZE_LARGE    = 3;

    const ALLOWED_SIZES = [
        self::SIZE_SMALL, self::SIZE_MEDIUM, self::SIZE_LARGE,
    ];

    const METHOD_AIRPLANE   = 1;
    const METHOD_SHIP       = 2;
    const METHOD_VAN        = 3;

    const ALLOWED_METHODS = [
        self::METHOD_AIRPLANE, self::METHOD_SHIP, self::METHOD_VAN,
    ];

    public function create(array $data): void
    {

        $stmt = $this->db->prepare("
            INSERT INTO shipments 
                (sender, location_from, location_to, price, size, method) 
            VALUES (:sender, :locationFrom, :locationTo, :price, :size, :method)
        ");

        $stmt->bindParam(':sender', $data['sender'], PDO::PARAM_INT);
        $stmt->bindParam(':locationFrom', $data['locationFrom']);
        $stmt->bindParam(':locationTo', $data['locationTo']);
        $stmt->bindParam(':price', $data['price'], PDO::PARAM_INT);
        $stmt->bindParam(':size', $data['size'], PDO::PARAM_INT);
        $stmt->bindParam(':method', $data['method'], PDO::PARAM_INT);

        $stmt->execute();

    }
}