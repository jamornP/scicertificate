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
                            <h1 class="m-0">Create Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create Certificate</li>
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
                                    <h3 class="card-title">สร้าง Certificate</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="bs-stepper linear">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step active" data-target="#one">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="one" id="one-trigger" aria-selected="true">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">เลือก Background</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#two">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="two" id="two-trigger" aria-selected="false" disabled="disabled">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">เลือก ลายเซ็นต์</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#tree">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="tree" id="tree-trigger" aria-selected="false" disabled="disabled">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">เลือกรูปแบบข้อความ</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#four">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="four" id="four-trigger" aria-selected="false" disabled="disabled">
                                                    <span class="bs-stepper-circle">4</span>
                                                    <span class="bs-stepper-label">upload File Excel</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <div id="one" class="content active dstepper-block" role="tabpanel" aria-labelledby="one-trigger">
                                                <p>1. เลือก Background</p>
                                                <div class="row">
                                                    <?php
                                                    $data = $bgObj->getBg("data");
                                                    $i = 0;
                                                    foreach ($data as $bg) {
                                                        $i++;
                                                        echo "
                                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                                <div class='form-group clearfix'>
                                                                    <div class='icheck-success d-inline'>
                                                                        <input type='radio' id='bg{$i}' name='bg' value='{$bg['b_id']}' checked >  
                                                                        <label for='bg{$i}'>
                                                                            <img src='{$bg['b_path']}{$bg['b_name']}' class='img-thumbnail shadow' alt='...' >
                                                                        </label>
                                                                    </div>
                                                                    <p class='text-center'><a href='{$bg['b_path']}{$bg['b_name']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }
                                                    ?>
                                                </div>
                                                <hr>
                                                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                            </div>
                                            <div id="two" class="content" role="tabpanel" aria-labelledby="two-trigger">
                                                <p>2. เลือก ลายเซ็นต์</p>
                                                <div class="row">
                                                    <?php
                                                    $data = $bgObj->getCa("data");
                                                    $i = 0;
                                                    foreach ($data as $ca) {
                                                        $i++;
                                                        echo "
                                                            <div class='col-lg-2 col-md-4 col-6 p-1'>
                                                                <div class='form-group clearfix'>
                                                                    <div class='icheck-success d-inline'>
                                                                        <input type='radio' id='ca{$i}' name='ca' value='{$ca['ca_id']}' checked>  
                                                                        <label for='ca{$i}'>
                                                                            {$ca['ca_name']} <a href='{$ca['ca_path']}' target='_bank'><i class='nav-icon fas fa-eye'></i></a>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }
                                                    ?>
                                                </div>
                                                <hr>
                                                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                            </div>
                                            <div id="tree" class="content" role="tabpanel" aria-labelledby="tree-trigger">
                                                <p>3. เลือกรูปแบบ</p>
                                                <div class="row">
                                                    <?php
                                                    $data = $bgObj->getFile("data");
                                                    $i = 0;
                                                    foreach ($data as $f) {
                                                        $i++;
                                                        echo "
                                                            <div class='col-lg-2 col-md-4 col-4 p-1'>
                                                                <div class='form-group clearfix'>
                                                                    <div class='icheck-success d-inline'>
                                                                        <input type='radio' id='f{$i}' name='filephp' value='{$f['f_id']}' checked>  
                                                                        <label for='f{$i}'>
                                                                            <img src='{$f['f_img']}' class='img-thumbnail shadow' alt='...' >
                                                                        </label>
                                                                    </div>
                                                                    <p class='text-center'><a href='{$f['f_img']}' target='_bank'><i class='nav-icon fas fa-eye'></i> preview</a></p>
                                                                </div>
                                                                
                                                            </div>
                                                        ";
                                                    }
                                                    ?>
                                                </div>
                                                <hr>
                                                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                            </div>
                                            <div id="four" class="content" role="tabpanel" aria-labelledby="four-trigger">
                                                <p>4. upload File Excel</p>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Minimal</label>
                                                            <select class="form-control select2" style="width: 100%;">
                                                                <option selected="selected">Alabama</option>
                                                                <option>Alaska</option>
                                                                <option>California</option>
                                                                <option>Delaware</option>
                                                                <option>Tennessee</option>
                                                                <option>Texas</option>
                                                                <option>Washington</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <!-- Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin. -->
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
        $(function() {
            bsCustomFileInput.init();

            
        });
    </script>
</body>

</html>