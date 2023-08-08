<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
    <!-- -------- -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/link.php"; ?>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- ----- -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/load.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/menu_left.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/navbar.php"; ?>
        

        <div class="content-wrapper">
        <?php
            // if(isset($_POST['add'])){
                print_r($_FILES['bg']);
            // }
        ?>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">พื้นหลัง Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Background</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Bg ทั้งหมด</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data" id="from-post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputFile">File Background</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="bg">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary" name="add">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>
        
    </div>
    <!-- ---------  -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/footer.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/script.php"; ?>
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
</body>

</html>