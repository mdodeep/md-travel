<?php
$judulhalaman = "Invoice";
require_once "mdconfig.php";
session_start();
header('Cache-Control: no cache');


if (!isset($_SESSION['kodeinvoice'])){
 header("location:index.php");
}else{

    $nomorinvoice = $_SESSION['kodeinvoice'];

    $invoice_d = mysqli_query($conn, "SELECT * FROM md_invoice WHERE (nomor_invoice='$nomorinvoice' OR kode_tiket='$nomorinvoice')");
    $penumpang_d = mysqli_query($conn, "SELECT * FROM md_penumpang WHERE (nomor_invoice='$nomorinvoice' OR kode_tiket='$nomorinvoice')");
    $tiket_d = mysqli_query($conn, "SELECT * FROM md_tiket WHERE (nomor_invoice='$nomorinvoice' OR kode_tiket='$nomorinvoice')");

    $ambildatainvoice = mysqli_fetch_array($invoice_d);
    $ambildatatiket = mysqli_fetch_array($tiket_d);
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
                        <!-- start  -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <img src="assets/images/logo/vector/default-monochrome.svg" alt="" height="28">
                                        <div class="clearfix">
                                            <div class="float-left mb-2">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-left mt-3">
                                                    <p class="h3">Invoice</p>
                                                    <p><strong>Tanggal Pemesanan : </strong> <?php echo $ambildatainvoice['tgl_pesan']?></p>
                                                    <p><b>Nama Pemesan :</b> [<?php echo $ambildatatiket['title_pemesan']?>] <?php echo $ambildatatiket['nama_pemesan']?></p>
                                                    <p><b>Nomor Identitas :</b> <?php echo $ambildatatiket['no_identitas']?> [<?php echo $ambildatatiket['tipe_identitas']?>]</p>
                                                </div>

                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <div class="mt-3 text-right">
                                                    <p><strong>Tanggal Pelunasan : </strong> <?php echo $ambildatainvoice['tgl_bayar']?></p>
                                                    <p><strong>Status Invoice : </strong>
                                                    <?php if ($ambildatainvoice['status'] == "Lunas"){ $st = "success"; }else{ $st = "danger"; } ?><span class="badge text-<?php echo $st;?>"><?php echo $ambildatainvoice['status']?></span></p>
                                                    <p><strong>Nomor Invoice: </strong> <?php echo $ambildatainvoice['nomor_invoice']?></p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-centered mt-4">
                                                        <thead>
                                                        <tr><th>No</th>
                                                            <th>Nama Penumpang</th>
                                                            <th>Nomor Identitas</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            while ($ambildatapenumpang = mysqli_fetch_array($penumpang_d))
                                                            {
                                                                $i++;
                                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                                <b><?php echo $ambildatapenumpang['nama_penumpang'] ?></b>
                                                            </td>
                                                            <td><?php echo $ambildatapenumpang['no_identitas'] ?> <b>[<?php echo $ambildatapenumpang['tipe_identitas'] ?>]</b></td>
                                                        </tr>
                                                    <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="clearfix pt-4">
                                                    <h6 class="text-muted">Catatan :</h6>

                                                    <small>
                                                        <p>Tagihan Dapat Dibayarkan Maksimal 1 Hari Sebelum Tanggal Keberangkatan</p>
                                                    </small>
                                                </div>

                                            </div>

                                            <div class="col-6">
                                                
                                                <div class="float-right">
                                                    <h4>Total Tagihan : <?php echo " Rp " . number_format($ambildatatiket['harga'],0,',','.');?></h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="text-right d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light mr-1"><i class="fa fa-print mr-1"></i> Print</a>
                                                <?php if ($ambildatainvoice['status'] == "Lunas"){ ?>
                                                <a href="tiket.php" class="btn btn-success waves-effect waves-light"><i class="fas fa-ticket-alt mr-1"></i> Lihat Tiket</a>
                                                <?php }else{ ?>
                                                <a href="pay.php" class="btn btn-success waves-effect waves-light"><i class="fas fa-ticket-alt mr-1"></i> Bayar Tagihan</a>
                                                <?php } ?>


                                            </div>
                                        </div>
                                    </div>
                                    <center><p class="pt-4"><b>Metode Pembayaran :</b> <?php echo $ambildatainvoice['metode_pembayaran']?></p> <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://project.mdody.com/tugaskuliah/mdtravel/pay.php?payid=<?php echo $ambildatainvoice['nomor_invoice']?>"><p class="pt-2">Scan Barcode Ini Untuk Melakukan Pembayaran</p></center>
                                    <?php if (!isset($_SESSION['uname'])){ ?>
                                <div class="mt-4 alert alert-icon alert-danger text-danger fade show text-center" role="alert">
                                    <i class="mdi mdi-alert mr-2"></i>
                                    <strong>Karena Anda Tidak Login, Anda Wajib Untuk Menyimpan Nomor Invoice/Tagihan Anda. </strong><br>
                                    <strong>Nomor Invoice Anda Adalah : <?php echo $ambildatainvoice['nomor_invoice']?></strong>
                                </div>
                    <?php } ?>
                                </div>

                            </div>
                            <!-- end row -->

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

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>

<?php 
}
 ?>