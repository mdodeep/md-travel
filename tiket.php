<?php
$judulhalaman = "Tiket";
require_once "mdconfig.php";
session_start();
header('Cache-Control: no cache');

if (!isset($_SESSION['kodeinvoice'])){
       header("location:index.php");
}else{

    $nomorinvoice = $_SESSION['kodeinvoice'];
    $tiket_d = mysqli_query($conn, "SELECT * FROM md_tiket WHERE nomor_invoice='$nomorinvoice'");
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
                        <div id='doc'>
                        <div class="pt-4"></div>
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title text-white mb-0">Tiket Anda Telah Terbit</h3>
                                </div>
                                <div class="card-body bg-warning">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="ml-3 mt-3">
                                            <img src="<?php echo "assets/images/maskapai/".$ambildatatiket['nama_maskapai'].".png";?>" height="50">
                                            <p class="text-white h1">[<?php echo $ambildatatiket['title_pemesan']?>] <?php echo $ambildatatiket['nama_pemesan']?></p>
                                            <p class="text-white h4"><?php echo $ambildatatiket['no_identitas']?> [<?php echo $ambildatatiket['tipe_identitas']?>]</p>
                                            <p>&nbsp;</p>
                                            <p class="text-white h5"><?php echo $ambildatatiket['jumlah']?> Tiket Pesawat</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2 text-center pt-4 pb-4">
                                            <p class="text-white h3">Berangkat Dari</p>
                                            <p class="text-white"><?php echo $ambildatatiket['bandara_berangkat']?></p>
                                            <p class="text-white h3">Tiba Di</p>
                                            <p class="text-white"><?php echo $ambildatatiket['bandara_tiba']?></p>
                                            <p>&nbsp;</p>
                                            <p class="text-white">Di Mohon Untuk Checkin Maximal 10 Menit Sebelum Penerbangan</p>
                                        </div>

                                        <div class="col-md-4 mb-2 text-right">
                                            <div class="mr-3 mt-3">
                                            <p class="text-white h5">Nomor Tiket : <?php echo $ambildatatiket['kode_tiket']?></p>
                                            <p><img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=TestQR"></p>
                                            <p class="text-right text-white">Scan Untuk Checkin Di Bandara</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                    <div class="alert alert-icon alert-info fade show" role="alert">
                            <center><p class="text-danger"><i class="mdi mdi-alert mr-2"></i><b>Karena Anda Tidak Login Pada Sistem Kami, Dimohon Untuk Menyimpan Nomor Tiket Anda.</b></p><p class="text-success"><b>Nomor Tiket Anda Adalah : <?php echo $ambildatatiket['kode_tiket']?></b></p></center>
                        </div>
                        </div>

                            <div align="center">
                               <button type="button" onclick="saveDoc()" class="btn btn-success waves-effect waves-light btn_print">
                                <i class="fas fa-print font-size-16 align-middle me-2"></i> Simpan Tiket
                            </button>
                        </div>
    
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
        <script src="assets/libs/pdf/html2canvas.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    var pdf = new jsPDF('l', 'pt', [1650, 510]);

    function saveDoc() {
        window.html2canvas = html2canvas
            pdf.html(document.getElementById('doc'), {
                callback: function (pdf) {
                    pdf.save('DOC.pdf');
                }
            })
       }
   </script>
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