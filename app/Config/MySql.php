<?php

namespace App\Config;

class MySql
{
    CONST DSN = "mysql:host=localhost;dbname=yt_shipping;";
    const USER = "root";
    const PASSWORD = "";

    protected readonly \PDO $db;

    public function __construct()
    {
        $this->db = new \PDO(self::DSN, self::USER, self::PASSWORD);
    }
}