<?php
$judulhalaman = "Pembayaran";
require_once "mdconfig.php";
session_start();
header('Cache-Control: no cache');

if (isset($_GET['payid'])){
    $checkid = $_GET['payid'];
    $checkpay = mysqli_query($conn, "SELECT * FROM md_invoice WHERE nomor_invoice='$checkid'");
    $checkinvoice = mysqli_num_rows($checkpay);
    if($checkinvoice === 1){
        $_SESSION['kodeinvoice'] = "$checkid";
    }else{
        echo "Data Salah";
    }
}

if (!isset($_SESSION['kodeinvoice'])){
 header("location:index.php");
}else{

    $nomorinvoice = $_SESSION['kodeinvoice'];

    $invoice_d = mysqli_query($conn, "SELECT * FROM md_invoice WHERE nomor_invoice='$nomorinvoice'");
    $penumpang_d = mysqli_query($conn, "SELECT * FROM md_penumpang WHERE nomor_invoice='$nomorinvoice'");
    $tiket_d = mysqli_query($conn, "SELECT * FROM md_tiket WHERE nomor_invoice='$nomorinvoice'");

    $ambildatainvoice = mysqli_fetch_array($invoice_d);
    $ambildatatiket = mysqli_fetch_array($tiket_d);

    if ($ambildatainvoice['status'] == "Lunas"){
        header("location:invoice.php");
    }

    $kodepesan = $ambildatatiket['kode_pesan'];
    $ambiljadwal = mysqli_query($conn, "SELECT * FROM md_jadwal WHERE kode_pesan='$kodepesan'");
    $ambildatajadwal = mysqli_fetch_array($ambiljadwal);
    $tanggalbayar = date('d F Y');
    $kurangtiket = $ambildatajadwal['kuota'] - $ambildatatiket['jumlah'];

    $msg = "";


    if (isset($_POST['bayar'])){
        if ($_POST['pin'] == "123456"){
            mysqli_query($conn, "UPDATE md_jadwal SET kuota='$kurangtiket' WHERE kode_pesan='$kodepesan'");
            mysqli_query($conn, "UPDATE md_invoice SET tgl_bayar='$tanggalbayar',status='Lunas'");
            $msg = "<div class='alert alert-icon alert-success text-success alert-dismissible fade show' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> <i class='mdi mdi-alert mr-2'></i> <strong>Transaksi Berhasil</strong> </div>";
            echo "<script> location.replace('invoice.php'); </script>";
        }else{
            $msg = "<div class='alert alert-icon alert-danger text-danger alert-dismissible fade show' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> <i class='mdi mdi-alert mr-2'></i> <strong>Maaf, Transaksi Gagal. Silahkan Coba Lagi</strong> </div>";
        }
    }
    include "hook/public/header.php";
    ?>
    <body data-layout="horizontal">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <header id="topnav">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <div class="container-fluid">
                        <ul class="list-unstyled topnav-menu float-right mb-0">

                            <li class="dropdown notification-list">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>

                        <!-- LOGO -->
                        <div class="logo-box">
                            <a href="index.php" class="logo text-center">
                                <span class="logo-lg">
                                        <img src="assets/images/logo/vector/default-monochrome-white.svg" alt="" height="26">
                                        <!-- <span class="logo-lg-text-light">Simple</span> -->
                                </span>
                                <span class="logo-sm">
                                        <!-- <span class="logo-sm-text-dark">S</span> -->
                                <img src="assets/images/logo/vector/default-monochrome-white.svg" alt="" height="18">
                                </span>
                            </a>
                        </div>

                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu">

                                <li class="has-submenu">
                                    <a href="index.php">
                                        <i class="ti-home"></i>Dashboard
                                    </a>
                                </li>

                                <!--<li class="has-submenu">
                                    <a href="#"> <i class="ti-files"></i>Pages</a>
                                    <ul class="submenu">
                                        <li><a href="pages-login.html">Login</a></li>

                                    </ul>
                                </li>-->

                            </ul>
                            <!-- End navigation menu -->

                            <div class="clearfix"></div>
                        </div>
                        <!-- end #navigation -->

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- end Topbar -->
            </header>
            <!-- End Navigation Bar-->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <h4 class="header-title mb-3"><?php echo date("l").", ".date("d F Y");?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!--end row -->
                        <div class="pt-4"></div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title text-white mb-0">Pembayaran E-Wallet</h3>
                            </div>
                            <div class="card-body bg-soft-info">
                                <center>
                                    <?php 
                                    $metode = $ambildatainvoice['metode_pembayaran'];
                                    if ($metode == "E-Wallet"){
                                        include "assets/images/payment/ewallet.php";
                                    }
                                    else{
                                        include "assets/images/payment/transfer.php";
                                    }
                                    ?>
                                </center>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div align="center">
                                            <form method="post" action="">
                                            <p class="h3 mt-4">Total Tagihan Anda</p>
                                            <p class="h1"><?php echo " Rp " . number_format($ambildatatiket['harga'],0,',','.');?></p>
                                            <p><input class="form-control col-md-3" type="password" name="pin" placeholder="Default Pin : 123456"></p>
                                            <label>Masukan PIN Anda</label>
                                            <p><button class="btn btn-success waves-effect waves-light" type="submit" name="bayar"><i class="fas fa-ticket-alt mr-1"></i> Bayar Tagihan</button></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> 
                        <?php echo $msg;?>

                    </div>
                    <!-- end container-fluid -->

                    

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    Copyright &copy;<?php echo date("Y");?> MDTravel | <a href="https://mdody.com/">Mdody</a>
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

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/select2/select2.min.js"></script>
        <script src="assets/libs/moment/moment.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

        <!--init -->
        <script src="assets/js/pages/datatables.init.js"></script>
        <script src="assets/js/pages/form-advanced.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>
<?php } ?>