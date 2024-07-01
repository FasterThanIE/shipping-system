<?php

if(!isset($_POST['type'])) {
    die("ERROR");
}

require_once "../../vendor/autoload.php";

$userController = new \App\Controllers\UserController();
$response = false;
$redirectTo = null;

switch (strtolower($_POST['type'])) {
    case "register":
        $response = $userController->register($_POST);
        $redirectTo = "user.php";
        break;
    case "login":
        $response = $userController->login($_POST);
        $redirectTo = "user.php";
        break;
    case "logout":
        $response = $userController->logout();
        $redirectTo = "login.php";
        break;
    default:
        throw new Exception("Invalid type");
}


if(!$response) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../../".$redirectTo);
}