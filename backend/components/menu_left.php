<?php session_start(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/function/function.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/scicertificate/auth/auth.php"; ?>
<?php

// use App\Model\Auth;
// $authObj = new Auth;
use App\Model\Background;
$bgObj = new Background;
date_default_timezone_set('Asia/Bangkok');
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1e1e34;">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
        <img src="/parttime/imges/logo-white.png" alt="AdminLTE Logo" class="" style="display:table; margin: 0 auto; max-width:200px;">
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION['img'];?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['name'];?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Certificate
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/scicertificate/backend/pages/certificate/background.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Background</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/scicertificate/backend/pages/certificate/ca.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/scicertificate/backend/pages/certificate/file.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>File Gen Certificate</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Group Events</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/scicertificate/auth/login.php" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <br>
        <br>
    </div>
   
</aside>