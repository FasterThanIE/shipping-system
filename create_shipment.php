<?php

use App\Config\Session;
use App\Models\Shipments;

require_once "vendor/autoload.php";

$session = new Session();

if(!$session->hasKey('user')) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <form action="app/Handlers/ShipmentsHandler.php" method="post" class="m-3">
            <div class="mb-3">
                <label for="sender" class="form-label">Sender:</label>
                <input type="number" id="sender" name="sender" min="1" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="locationFrom" class="form-label">Location From:</label>
                <input type="text" id="locationFrom" name="locationFrom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="locationTo" class="form-label">Location To:</label>
                <input type="text" id="locationTo" name="locationTo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" min="0" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="size" class="form-label">Size:</label>
                <select name="size" class="form-select">
                    <?php foreach (Shipments::ALLOWED_SIZES as $size): ?>
                        <option value="<?= $size ?>"><?= Shipments::SIZES_NAMES[$size] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="method" class="form-label">Method:</label>
                <select name="method" class="form-select">
                    <?php foreach (Shipments::ALLOWED_METHODS as $method): ?>
                        <option value="<?= $method ?>"><?= Shipments::METHOD_NAMES[$method] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="type" value="create">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </body>
</html>
