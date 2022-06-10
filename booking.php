<?php
$judulhalaman = "Booking Tiket";
session_start();
header('Cache-Control: no cache');
require_once "mdconfig.php";
$jml = $_SESSION['jml'];

if (empty($_POST['kodepesan'] && $_SESSION['jml'])){
    echo "<script> location.replace('index.php'); </script>";
}

$_SESSION['kodepesan'] = $_POST['kodepesan'];
$kodepesan = $_SESSION['kodepesan'];

if (isset($_SESSION['uname'])){
    $auth = $_SESSION['uname'];
    $authuser = mysqli_query($conn, "SELECT * FROM md_user WHERE username='$auth'");
    $ambildatauser = mysqli_fetch_array($authuser);
    $in_title = $ambildatauser['title'];
    $in_nama = $ambildatauser['nama_lengkap'];
    $in_tipe = $ambildatauser['tipe_identitas'];
    $in_noidt = $ambildatauser['nomor_identitas'];
    $in_hp = $ambildatauser['nomor_telepon'];
    $in_email = $ambildatauser['email'];
}else{
    $in_title = "";
    $in_nama = "";
    $in_tipe = "";
    $in_noidt = "";
    $in_hp = "";
    $in_email = "";
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

                            <li class="dropdown notification-list">
                            <?php
                            if (!isset($_SESSION['uname'])){ ?>
                                <button class="btn btn-warning mt-3 mr-1">Register</button><button class="btn btn-success mt-3">Login</button>
                            <?php }else{ ?>
                                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name d-none d-xl-inline-block ml-2">
                                                            <?php echo $in_nama;?>  <i class="mdi mdi-chevron-down"></i> 
                                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-outline"></i>
                                        <span>Profile</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout-variant"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>
                            <?php
                            }
                            ?>

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
                            <?php if (!isset($_SESSION['uname'])){ ?>
                                <div class="alert alert-icon alert-danger text-danger fade show" role="alert">
                                    <i class="mdi mdi-alert mr-2"></i>
                                    <strong>Kamu Belum Login, Pastikan Kamu Menyimpan Nomor Tiket dan Nomor Invoice Pemesanan</strong>
                                </div>
                            <?php } ?>

                        <form method="post" action="tn.php">
                            <!--end row -->
                            <div class="pt-4"></div>
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title text-white mb-0">Data Pemesanan Tiket</h3>
                                </div>
                                <div class="card-body">
                                    <h3>Data Pemesan</h3>
                                    <div class="row">
                                        <div class="mb-4 col-md-3">
                                            <label>Title</label>
                                            <select class="form-control"  name="title_pemesan">
                                                <?php if (isset($_SESSION['uname'])){ ?>
                                                <option value="<?php echo $in_title;?>"><?php echo $in_title;?></option>
                                                <?php }else{ ?>
                                                <option value="Tuan">Tuan</option>
                                                <option value="Nyonya">Nyonya</option>
                                            <?php } ?>
                                            </select>
                                        </div>

                                        <div class="mb-4 col-md-9">
                                            <label>Nama Pemesan</label>
                                            <input type="text" name="namapemesan" class="form-control" value="<?php echo $in_nama;?>">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-3">
                                            <label>Jenis Identitas</label>
                                            <select class="form-control"  name="tipeidt_pemesan">
                                                <?php if (isset($_SESSION['uname'])){ ?>
                                                <option value="<?php echo $in_tipe;?>"><?php echo $in_tipe;?></option>
                                                <?php }else{ ?>
                                                <option value="KTP">KTP</option>
                                                <option value="SIM">SIM</option>
                                                <option value="PASSPOR">PASSPOR</option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="mb-4 col-md-9">
                                            <label>Nomor Identitas</label>
                                            <input type="number" name="nomoridentitas" class="form-control" value="<?php echo $in_noidt;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-4">
                                            <label>Nomor HP Pemesan</label>
                                            <input type="number" name="nomorhp" class="form-control" value="<?php echo $in_hp;?>">
                                        </div>

                                        <div class="mb-4 col-md-8">
                                            <label>Email Pemesan</label>
                                            <input type="email" name="emailpemesan" class="form-control" value="<?php echo $in_email;?>">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <?php 
                            for ($i = 1; $i <= $jml; $i++) { ?>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <h3 class="card-title text-white mb-0">Data Penumpang Ke <?php echo $i;?></h3>
                                            </div>
                                            <div class="card-body">

                                                <h3>Data Penumpang</h3>
                                                <div class="row">
                                                    <div class="mb-4 col-md-3">
                                                        <label>Title</label>
                                                        <select class="form-control"  name="title_penumpang<?php echo $i;?>">
                                                            <option value="Tuan">Tuan</option>
                                                            <option value="Nyonya">Nyonya</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-4 col-md-9">
                                                        <label>Nama Penumpang</label>
                                                        <input type="text" name="nama_penumpang<?php echo $i;?>" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 col-md-3">
                                                        <label>Jenis Identitas</label>
                                                        <select class="form-control"  name="tipeidt_penumpang<?php echo $i;?>">
                                                            <option value="KTP">KTP</option>
                                                            <option value="SIM">SIM</option>
                                                            <option value="PASSPOR">PASSPOR</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-4 col-md-9">
                                                        <label>Nomor Identitas</label>
                                                        <input type="number" name="noidentitas_penumpang<?php echo $i;?>" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="text-center pb-3"><h5>Dimohon Untuk Mengecek Kembali Data-Data Yang Sudah Dimasukan</h5></div>
                            <div class="pt-4"></div>
                            <div class="card">
                        <?php
                        $tampiltiket = mysqli_query($conn, "SELECT * FROM md_jadwal WHERE kode_pesan='$kodepesan'");
                        $randomchar = "M5IE7Z7481PQQOONER9YF20K3XLCAJFLYI8J6D0NHSP6MGWVU4BDBKZ1RHX32AVGCWSU9TT5";
                        $randomkode = substr(str_shuffle($randomchar), 0,8);



                        while ($ambildatatiket = mysqli_fetch_array($tampiltiket)){
                        $kodepesawat = $ambildatatiket['kode_pesawat'];

                        $randominv = "YNRU9XYPX5HF0GQD6KZVK0TO4NUOWFHW1347PJRE92L8AMZITLDC31I5AB2JS7GEQ8BSCV6M";
                        $randominvoice = substr(str_shuffle($randomchar), 0,20);
                        $_SESSION['kodetiket'] = $kodepesan.$randomkode.$kodepesawat;
                        $kodetiket = $_SESSION['kodetiket'];
                        $_SESSION['kodeinvoice'] = $randominvoice;
                        $kodeinvoice = $_SESSION['kodeinvoice'];


                        $pajak = ($ambildatatiket['harga'] * $jml) * (10/100) ;
                        $total_harga = ($ambildatatiket['harga'] * $jml) + $pajak;
                        $hargatiket = number_format($total_harga,0,',','.');

                        ?>
                                <h4 class="card-header bg-warning text-white">Total Tagihan : <strong><?php echo " Rp " . $hargatiket;?></strong></h4>
                                <div class="card-body bg-soft-warning">
                                    <b><p>Tanggal Pemesanan : <?php echo date("d F Y");?></p></b>
                                    <div class="row">
                                        <div class="mb-4 col-md-3">
                                            <img src="<?php echo "assets/images/maskapai/".$ambildatatiket['logo_maskapai'].".png";?>" height="50">
                                            <p class="mt-2">Kode Pesawat : <?php echo $ambildatatiket['kode_pesawat'];?></p>
                                            <p class="h6"><?php echo $ambildatatiket['kelas'];?></p>
                                            <p class="h5">Pemesanan <?php echo $jml;?> Tiket</p>
                                        </div>

                                        <div class="mb-4 col-md-3">
                                            <b><?php echo $ambildatatiket['tgl_berangkat'];?></b><br>
                                            <p>Berangkat Dari</p>
                                            <p class="h4"><?php echo $ambildatatiket['bandara_berangkat'];?></p>
                                            <p class="h6">Jam : <?php echo $ambildatatiket['jam_berangkat'];?></p>
                                        </div>

                                        <div class="mb-4 col-md-3">
                                            <b><?php echo $ambildatatiket['tgl_tiba'];?></b><br>
                                            <p>Tiba Di</p>
                                            <p class="h4"><?php echo $ambildatatiket['bandara_tiba'];?></p>
                                            <p class="h6">Jam : <?php echo $ambildatatiket['jam_tiba'];?></p>
                                        </div>

                                        <div class="mb-4 col-md-3">
                                            <b>Pilih Metode Pembayaran</b><br>
                                            <p></p>
                                            <p><select class="form-control" name="metode">
                                                <option value="E-Wallet">E-Wallet</option>
                                                <option value="Transfer">Transfer</option>
                                            </select></p>
                                            <p>Tagihan Sudah Termasuk Pajak 10%</p>
                                        </div>

                                    </div>
                                    <p class="text-right h5">Kode Tiket : <?php echo $kodetiket;?></p>
                                </div>
                            </div>
                        <?php } ?> 
                            <input type="hidden" name="inv" value="">
                            <button class="btn btn-info mb-4" style="width: 100%" type="submit" name="pesantiket">Pesan Tiket</button>

                        </div>
                        <!-- end container-fluid -->
                </form>
                        
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