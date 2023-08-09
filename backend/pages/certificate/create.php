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
        <?php
        // $msg = "บันทึกสำเร็จ";
        // $url = "background.php";
        // echo "<script>";
        // echo "alertSuccess('{$msg}','{$url}')";
        // echo "</script>";
        ?>
        <!-- ----- -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/load.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/menu_left.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/navbar.php"; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ceeate Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Ceeate Certificate</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">bs-stepper</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="bs-stepper linear">
                                        <div class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->
                                            <div class="step active" data-target="#logins-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger" aria-selected="true">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Logins</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="false" disabled="disabled">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Various information</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <!-- your steps content here -->
                                            <div id="logins-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                            </div>
                                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <from>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">ข้อมูล Certificate</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>1. เลือก Background</p>
                                        <div class="row">
                                            <?php
                                            $data = $bgObj->getBg("data");
                                            $i = 0;
                                            foreach ($data as $bg) {
                                                $i++;
                                                // echo "
                                                //     <div class='col-md-1 col-2 p-1'>
                                                //             <img src='{$bg['b_path']}{$bg['b_name']}' class='img-thumbnail shadow' alt='...' for='{$i}'>
                                                //             <p class='text-center'><input class='form-check-input' type='radio' name='bg' id='{$i}' value='{$bg['b_id']}' required> เลือก</p>
                                                //     </div>
                                                // ";
                                                echo "
                                                    <div class='col-md-1 col-2 p-1'>
                                                        <div class='form-group clearfix'>
                                                            <div class='icheck-success d-inline'>
                                                                <input type='radio' id='bg{$i}' name='r1' >  
                                                                <label for='bg{$i}'>
                                                                    <img src='{$bg['b_path']}{$bg['b_name']}' class='img-thumbnail shadow' alt='...' >
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ";
                                            }
                                            ?>
                                        </div>
                                        <p>2. เลือก ลายเซ็นต์</p>
                                        <div class="row">
                                            <?php
                                            $data = $bgObj->getCa("data");
                                            $i = 0;
                                            foreach ($data as $ca) {
                                                $i++;
                                                // echo "
                                                //         <div class='col-md-1 col-2 p-1'>
                                                //             <img src='{$ca['ca_path']}{$ca['ca_name']}' class='img-thumbnail shadow' alt='...' for='{$i}'>
                                                //             <p class='text-center'><input class='form-check-input' type='radio' name='ca' id='{$i}' value='{$ca['ca_id']}' required> เลือก</p>
                                                //         </div>
                                                //     ";
                                                echo "
                                                <div class='col-md-1 col-2 p-1'>
                                                    <div class='form-group clearfix'>
                                                        <div class='icheck-success d-inline'>
                                                            <input type='radio' id='ca{$i}' name='{$ca['ca_id']}' check>  
                                                            <label for='ca{$i}'>
                                                                <img src='{$ca['ca_path']}{$ca['ca_name']}' class='img-thumbnail shadow' alt='...' >
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                            }
                                            ?>
                                        </div>
                                        <p>3. เลือกรูปแบบ</p>
                                        <div class="row">
                                            <?php
                                            $data = $bgObj->getFile("data");
                                            $i = 0;
                                            foreach ($data as $f) {
                                                $i++;
                                                echo "
                                                        <div class='col-md-1 col-3 p-1'>
                                                            <img src='{$f['f_img']}' class='img-thumbnail shadow' alt='...' for='{$i}'>
                                                            <p class='text-center'><input class='form-check-input' type='radio' name='filephp' id='{$i}' value='{$f['f_id']}' required> เลือก</p>
                                                        </div>
                                                    ";
                                            }
                                            ?>
                                        </div>
                                        <p>4. เลือกกิจกรรม</p>
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </from>
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
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>