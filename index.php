<?php

use App\Config\Session;
use App\Enums\Shipments\LocationEnum;
use App\Enums\Shipments\MethodEnum;
use App\Enums\Shipments\SizeEnum;
use App\Enums\Shipments\StatusEnum;
use App\Models\Shipments;

require_once "vendor/autoload.php";

$session = new Session();
if(!$session->hasKey('user')) {
    header("Location: login.php");
    exit();
}

$shipmentsModel = new Shipments();

$shipments = $shipmentsModel->getShipmentsForUser($session->get('user'));

?>

<!DOCTYPE HTML>


<html>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Status</th>
            <th>Size</th>
            <th>Location From</th>
            <th>Location To</th>
            <th>Price</th>
            <th>Method</th>
            <th>Note</th>
            <th>Delivery Info</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($shipments as $shipment): ?>
            <tr>
                <td><?= $shipment['id'] ?></td>
                <td><?= StatusEnum::from($shipment['status'])->getName() ?></td>
                <td><?= SizeEnum::from($shipment['size'])->getName() ?></td>
                <td><?= LocationEnum::from($shipment['location_from'])->getName() ?></td>
                <td><?= LocationEnum::from($shipment['location_to'])->getName() ?></td>
                <td><?= $shipment['price'] ?></td>
                <td><?= MethodEnum::from($shipment['method'])->getName() ?></td>
                <td><?= $shipment['note'] ?></td>
                <td><?= $shipment['delivery_info'] ?></td>
                <td><?= $shipment['created_at'] ?></td>
                <td><?= $shipment['updated_at'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    </body>

</html>

