<?php

use App\Controllers\ShipmentController;

if(!isset($_POST['type'])) {
    die("ERROR");
}

require_once "../../vendor/autoload.php";

$shipmentController = new ShipmentController();
$response = false;
$redirectTo = null;

switch (strtolower($_POST['type'])) {
    case "create":
        $shipmentController->create();
        $redirectTo = "index.php";
    default:
        throw new Exception("Invalid type");
}


if(!$response) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../".$redirectTo);
}