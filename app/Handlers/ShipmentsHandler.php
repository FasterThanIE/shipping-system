<?php


use App\Controllers\ShipmentsController;


if(!isset($_POST['type']) && !isset($_GET['type'])) {
    die("ERROR");
}

require_once "../../vendor/autoload.php";

$shipmentsController = new ShipmentsController();
$response = false;
$redirectTo = null;

$type = isset($_POST['type']) ? strtolower($_POST['type']) : strtolower($_GET['type']);

switch ($type) {
    case "create":
        $response = $shipmentsController->createShipment($_POST);
        $redirectTo = "index.php";
        $response = true;
        break;
    case "delete":
        $response = $shipmentsController->deleteShipment($_GET);
        $redirectTo = "index.php";
        $response = true;
        break;
}


if(!$response) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../".$redirectTo);
}