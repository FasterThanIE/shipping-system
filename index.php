<?php

use App\Config\Session;
use App\Models\Shipments;

require_once "vendor/autoload.php";

$session = new Session();

if(!$session->hasKey('user')) {
    header("Location: login.php");
    exit();
}

$shipments = new Shipments();

?>

<!DOCTYPE HTML>


<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


    <body>

        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Price</th>
                    <th scope="col">Size</th>
                    <th scope="col">Method</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Action</th>
                </tr>

                </thead>
                <tbody>

                <?php foreach ($shipments->getAllShipmentsForUser($session->get('user')) as $shipment): ?>
                    <tr>
                        <td><?= $shipment['id'] ?></td>
                        <td><?= Shipments::STATUS_NAMES[$shipment['status']] ?></td>
                        <td><?= $shipment['location_from'] ?></td>
                        <td><?= $shipment['location_to'] ?></td>
                        <td><?= $shipment['price'] ?></td>
                        <td><?= Shipments::SIZES_NAMES[$shipment['size']] ?></td>
                        <td><?= Shipments::METHOD_NAMES[$shipment['method']] ?></td>
                        <td><?= $shipment['created_at'] ?></td>
                        <td>
                            <a class="btn btn-primary">EDIT</a>
                            <a href="app/Handlers/ShipmentsHandler.php?type=delete&id=<?= $shipment['id'] ?>" class="btn btn-danger">DELETE</a>
                        </td>
                    </tr>
                <?php endforeach ?>

                </tbody>
            </table>
        </div>



    </body>

</html>

