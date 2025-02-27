<?php

namespace App\Models;

use App\Config\MySql;
use PDO;

class User extends MySql
{
    public function register(string $email, string $password): void
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
    }

    public function exists(string $email): bool
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam("email", $email);
        $stmt->execute();

        return $stmt->rowCount() >= 1;
    }

    public function getByEmail(string $email): array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam("email", $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}