<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/auth/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scie-certificate</title>
    <!-- -------- -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/link.php"; ?>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>

</head>

<body class="">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="card card-info" style="display:box; margin: 0 auto; max-width:50%;">
            <div class="card-header">
                <h3 class="card-title">Login</h3>
            </div>
            <form class="form-horizontal">
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="email" class="text-primary fs-18">Email :</label>
                        <input type="email" name="email" id="email" class="form-control" autofocus required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="text-primary fs-18">Password :</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>

                <div class="card-footer deflex">

                    <button type="submit" class="btn btn-info">Sign in</button>
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                    <br>
                    <button onclick="window.location = '<?php echo $login_url; ?>'" type="button" class="btn btn-primary float-right mt-2">
                        <div class=""><img src="/repair-sci/images/logo_google2.png" alt="Logo" style="display:box; margin: 0 auto; max-width:24px;"> Sign in with Google </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>