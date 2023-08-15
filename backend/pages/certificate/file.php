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
            // $msg = "บันทึกไม่สำเร็จ";
            // echo "<script>";
            // echo "alertError('{$msg}')";
            // echo "</script>";
        ?>
        <!-- ----- -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/load.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/menu_left.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/backend/components/navbar.php"; ?>


        <div class="content-wrapper">
            <?php
            if (isset($_POST['add'])) {
                // print_r($_FILES['bg']);
                // echo "<br>";
                // print_r($_POST);
                if(isset($_FILES['file_php']['tmp_name'])){
                    $ext=(explode(".",$_FILES['file_php']['name']));
                    $new_namef = $_POST['ca_name'].".".$ext[1];
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/scicertificate/backend/gen_certificate/".$new_namef;
                    if($_FILES['file_php']['error']==0){
                        move_uploaded_file($_FILES['file_php']['tmp_name'],$file_path);
                        if(isset($_FILES['bg']['tmp_name'])){
                            $ext=(explode(".",$_FILES['bg']['name']));
                            $new_name = $_POST['ca_name'].".".$ext[1];
                            $file_path = $_SERVER['DOCUMENT_ROOT']."/scicertificate/backend/images/example/".$new_name;
                            $data['f_name'] = $new_namef;
                            $data['f_path'] = "/scicertificate/backend/gen_certificate/";
                            if($_FILES['bg']['error']==0){
                                move_uploaded_file($_FILES['bg']['tmp_name'],$file_path);
                                
                                $data['f_img'] = "/scicertificate/backend/images/example/".$new_name;
                                $data['status'] = 1;
                                // print_r($data);
                                $ck = $bgObj->addFile($data);
                                if($ck){
                                    $msg = "บันทึกข้อมูลสำเร็จ";
                                    echo "<script>";
                                    echo "alertSuccess('{$msg}','file.php')";
                                    echo "</script>";
                                }else{
                                    $msg = "บันทึกข่อมูลไม่สำเร็จ";
                                    echo "<script>";
                                    echo "alertError('{$msg}')";
                                    echo "</script>";
                                }
                            }
                        }else{
                            echo "No File Example";
                        }
                       
                    }else{
                        echo "No file PHP";
                    }
                }else{
                    echo "No file PHP";
                }
            }
            ?>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">File PHP Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">File PHP</li>
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
                                    <h3 class="card-title">เพิ่ม File PHP</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data" id="from-post">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">File PHP</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile"  accept=".php" name="file_php">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="b_name">ชื่อ File</label>
                                                        <input type="text" class="form-control" id="b_name" placeholder="ชื่อ File" name="ca_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile2">Image ตัวอย่าง Certificate</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile2"  accept=".png, .jpg" name="bg">
                                                                <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary mt-4" name="add">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="card-footer">
                                            
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ตัวอย่าง Certificate ทั้งหมด</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                            $data = $bgObj->getFile("data");
                                            foreach($data as $f){
                                                echo "
                                                    <div class='col-md-2 col-6 p-1'>
                                                        <img src='{$f['f_img']}' class='img-thumbnail shadow' alt='...'>
                                                    </div>
                                                ";
                                            }
                                        ?>
                                        
                                    </div>
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