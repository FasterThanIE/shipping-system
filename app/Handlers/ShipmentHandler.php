<?php

require_once "../../vendor/autoload.php";

use App\Controllers\ShipmentController;

if(!isset($_POST['type'])) {
    die("ERROR");
}

$session = new \App\Config\Session();
if(!$session->hasKey('user')) {
    header("Location: login.php");
    exit();
}

require_once "../../vendor/autoload.php";

$shipmentController = new ShipmentController();
$response = false;
$redirectTo = null;

switch (strtolower($_POST['type'])) {
    case "create":
        $shipmentController->create($_POST);
        $redirectTo = "index.php";
        $response = true;
        break;
    default:
        throw new Exception("Invalid type");
}


if(!$response) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../".$redirectTo);
}