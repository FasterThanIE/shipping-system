
<?php use App\Enums\Shipments\LocationEnum;
use App\Enums\Shipments\MethodEnum;
use App\Enums\Shipments\SizeEnum;

require_once "vendor/autoload.php";

$locations = LocationEnum::cases();
?>

<!doctype html>

<html lang="en">

    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <form class="container mt-5">

            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <select class="form-control" id="size" name="method">
                    <?php foreach (SizeEnum::cases() as $case): ?>
                        <option value="<?= $case->value ?>"><?= $case->getName() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="method" class="form-label">Method</label>
                <select class="form-control" id="method" name="method">
                    <?php foreach (MethodEnum::cases() as $case): ?>
                        <option value="<?= $case->value ?>"><?= $case->getName() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="location_from" class="form-label">Location From</label>
                <select class="form-control" id="location_from" name="location_from">
                    <?php foreach ($locations as $case): ?>
                        <option value="<?= $case->value ?>"><?= $case->getName() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="location_to" class="form-label">Location To</label>
                <select class="form-control" id="location_to" name="location_to">
                    <?php foreach ($locations as $case): ?>
                        <option value="<?= $case->value ?>"><?= $case->getName() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="price">
            </div>


            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea name="note" class="form-control" id="note"></textarea>
            </div>

            <div class="mb-3">
                <label for="delivery_info" class="form-label">Delivery Info</label>
                <textarea name="delivery_info" class="form-control" id="delivery_info" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </body>

</html>