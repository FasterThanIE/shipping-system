<?php

if(!isset($_POST['type'])) {
    die("ERROR");
}

require_once "../../vendor/autoload.php";

$userController = new \App\Controllers\UserController();

switch (strtolower($_POST['type'])) {
    case "register":
        $userController->register($_POST);
        break;
    default:
        throw new Exception("Invalid type");
}
