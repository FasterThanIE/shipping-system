<?php


use App\Controllers\ShipmentsController;

if(!isset($_POST['type'])) {
    die("ERROR");
}

require_once "../../vendor/autoload.php";

$shipmentsController = new ShipmentsController();
$response = false;
$redirectTo = null;

switch (strtolower($_POST['type'])) {
    case "create":
        $response = $shipmentsController->createShipment($_POST);
        $redirectTo = "index.php";
        $response = true;
        break;
}


if(!$response) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../".$redirectTo);
}