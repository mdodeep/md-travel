<?php
$judulhalaman = "Admin";
require_once "mdconfig.php";
header('Cache-Control: no cache');
session_start();
$auth = $_SESSION['uname'];
$authuser = mysqli_query($conn, "SELECT * FROM md_user WHERE username='$auth'");
$userdata = mysqli_fetch_array($authuser);
$msg = "";

$invoice = mysqli_query($conn, "SELECT * FROM md_invoice");
$user = mysqli_query($conn, "SELECT * FROM md_user");
$tiket = mysqli_query($conn, "SELECT * FROM md_tiket");
$kota = mysqli_query($conn, "SELECT * FROM md_kota");
$maskapai = mysqli_query($conn, "SELECT * FROM md_maskapai");
$bandara = mysqli_query($conn, "SELECT * FROM md_bandara");
$jadwal = mysqli_query($conn, "SELECT * FROM md_jadwal");

if (!isset($_SESSION['uname'])){
    echo "<script> location.replace('index.php'); </script>";
}

if ($userdata['roles'] < 9){
    echo "<script> location.replace('index.php'); </script>";
}
include "hook/public/header.php";
?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                    <?php echo $userdata['nama_depan'];?>  <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <!-- item-->
                            <a href="profile.php" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="logout.php" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="assets/images/logo/vector/default-monochrome.svg" alt="" height="26">
                            <!-- <span class="logo-lg-text-dark">Simple</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">S</span> -->
                            <img src="assets/images/logo/vector/default-monochrome.svg" alt="" height="14">
                        </span>
                    </a>

                    <a href="index.html" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="26">
                            <!-- <span class="logo-lg-text-light">Simple</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-light">S</span> -->
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                </ul>
            </div>
            <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">


                <div class="user-box">
                        <div class="float-left">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <a href="#"><?php echo $userdata['nama_lengkap'];?></a>
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
    
            <!--- Sidemenu -->
            <div id="sidebar-menu">
    
                <ul class="metismenu" id="side-menu">
    
                    <li class="menu-title">Navigation</li>
    
                    <li>
                        <a href="admin.php">
                            <i class="ti-home"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="?nav=tambahmaskapai">
                            <i class="ti-agenda"></i>
                            <span> Tambah Maskapai </span>
                        </a>
                    </li>

                    <li>
                        <a href="?nav=tambahkota">
                            <i class="ti-map-alt"></i>
                            <span> Tambah Kota </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="?nav=tambahbandara&jum=1">
                            <i class="ti-archive"></i>
                            <span> Tambah Bandara </span>
                        </a>
                    </li>

                    <li>
                        <a href="?nav=tambahjadwal">
                            <i class="ti-calendar"></i>
                            <span> Tambah Jadwal </span>
                        </a>
                    </li>
    
                </ul>
    
            </div>
            <!-- End Sidebar -->
    
            <div class="clearfix"></div>

    
    </div>
    <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <!-- start  -->
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title"><?php echo date("l , d F Y");?></h4>
                                </div>
                            </div>

                            <?php 

                            if (isset($_GET['nav'])){
                                if ($_GET['nav'] == "tambahkota"){
                                    include "hook/admin/tambahkota.php" ;
                                }

                                elseif ($_GET['nav'] == "tambahbandara"){
                                    include "hook/admin/tambahbandara.php" ;
                                }

                                elseif ($_GET['nav'] == "tambahjadwal"){
                                    include "hook/admin/tambahjadwal.php" ;
                                }

                                elseif ($_GET['nav'] == "tambahmaskapai"){
                                    include "hook/admin/tambahmaskapai.php" ;
                                }

                                else{
                                    include "hook/admin/404.php" ;
                                }


                            }else{

                            include "hook/admin/in.php" ;

                            }

                            ?>

                    </div>
                    <!-- end container-fluid -->

                    

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    2017 - 2020 &copy; Simple theme by <a href="">Coderthemes</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>
                <!-- end content -->

            </div>
            <!-- END content-page -->

        </div>
        <!-- END wrapper -->

        <?php include "hook/public/jshook.php"; ?>

    </body>

</html>