<?php

require_once "../../vendor/autoload.php";

use App\Controllers\ShipmentController;

if(!isset($_POST['type']) && !isset($_GET['type'])) {
    die("ERROR");
}

$type = !isset($_POST['type']) ? $_GET['type'] : $_POST['type'];

$session = new \App\Config\Session();
if(!$session->hasKey('user')) {
    header("Location: login.php");
    exit();
}

require_once "../../vendor/autoload.php";

$shipmentController = new ShipmentController();
$response = false;
$redirectTo = null;

switch (strtolower($type)) {
    case "create":
        $response = $shipmentController->create($_POST);
        $redirectTo = "index.php";
        break;
    case "delete":
        $response = $shipmentController->delete($_GET);
        $redirectTo = "index.php";
        break;
    default:
        throw new Exception("Invalid type");
}


if(!$response) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../".$redirectTo);
}