<?php

require_once "vendor/autoload.php";

$session = new \App\Config\Session();

if(!$session->hasKey('user')) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

        <form action="app/Handlers/ShipmentsHandler.php" method="post">

            <label for="sender">Sender:</label><br>
            <input type="number" id="sender" name="sender" min="1" required><br>

            <label for="locationFrom">Location From:</label><br>
            <input type="text" id="locationFrom" name="locationFrom" required><br>

            <label for="locationTo">Location To:</label><br>
            <input type="text" id="locationTo" name="locationTo" required><br>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" min="0" required><br>

            <label for="size">Size:</label><br>
            <input type="number" id="size" name="size" min="1" required><br>

            <label for="method">Method:</label><br>
            <input type="number" id="method" name="method" min="1" required><br>

            <input type="hidden" name="type" value="create">
            <input type="submit" value="Submit">
        </form>

    </body>
</html>
