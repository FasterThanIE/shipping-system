<?php
require_once "vendor/autoload.php";
$session = new \App\Config\Session();
?>

<!DOCTYPE HTML>


<html>

    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body class="vh-100">

        <form method="POST" action="app/Handlers/UserHandler.php" class="d-flex justify-content-center align-items-center h-100 flex-column">

            <h4>Register a new account</h4>

            <?php if($session->hasKey('form_validation_error')): ?>
                <p><?= $session->get('form_validation_error') ?></p>
            <?php endif; ?>

            <div class="mb-3 col-10 col-md-4">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div>
                    <input name="email" placeholder="Enter your email" type="email" class="form-control" id="inputEmail">
                </div>
            </div>
            <div class="mb-3 col-10 col-md-4">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div>
                    <input name="password" placeholder="Enter your password" type="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 col-10 col-md-4">
                <input type="submit" name="type" class="btn col-12 btn-primary" value="Register">
            </div>

            <a>Already have an account? <a href="login.php">CLICK HERE</a></a>

        </form>

    </body>

</html>