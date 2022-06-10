<?php
$judulhalaman = "MDTravel";
session_start();
header('Cache-Control: no cache');
require_once "mdconfig.php";
if (isset($_SESSION['uname'])){
    $auth = $_SESSION['uname'];
    $authuser = mysqli_query($conn, "SELECT * FROM md_user WHERE username='$auth'");
    $userdata = mysqli_fetch_array($authuser);
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
                                <a href="register.php" class="btn btn-warning mt-3 mr-1">Register</a><a href="login.php" class="btn btn-success mt-3">Login</a>
                            <?php }else{ ?>
                                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name d-none d-xl-inline-block ml-2">
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

                            <div class="row mb-4 text-center">
                                <div class="col-xl-12">
                                    <h2>
                                        SELAMAT DATANG DI APLIKASI
                                    </h2>
                                    <img src="assets/images/logo/vector/default-monochrome.svg" alt="" height="30">
                                </div>
                            </div>

                        <!--end row -->
                        <div class="pt-4"></div>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-white mb-0">Cari Tiket Pesawat</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label><i class="fas fa-plane-departure"></i> Saya Berangkat Dari</label>
                                            <select class="form-control" data-toggle="select2" name="berangkat">
                                                <option>Pilih Bandara Keberangkatan</option>
                                                <?php
                                                $tampilkota = mysqli_query($conn, "SELECT nama_kota FROM md_kota"); 
                                                while ($datakota = mysqli_fetch_array($tampilkota)){
                                                    ?>
                                                    <optgroup label="<?php echo $datakota['nama_kota'];?>">
                                                        <?php
                                                        $default = $datakota['nama_kota'];
                                                        $tampilbandara = mysqli_query($conn, "SELECT nama_bandara FROM md_bandara WHERE kota_bandara='$default'");
                                                        while ($databandara = mysqli_fetch_array($tampilbandara)){
                                                            ?>
                                                            <option value="<?php echo $databandara['nama_bandara'];?>"><?php echo $databandara['nama_bandara'];?></option>
                                                        <?php } ?>
                                                    </optgroup>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label><i class="fas fa-plane-arrival"></i> Saya Mau Ke</label>
                                            <select class="form-control" data-toggle="select2" name="tujuan">
                                                <option>Pilih Bandara Tujuan</option>
                                                <?php
                                                $tampilkota = mysqli_query($conn, "SELECT nama_kota FROM md_kota"); 
                                                while ($datakota = mysqli_fetch_array($tampilkota)){
                                                    ?>
                                                    <optgroup label="<?php echo $datakota['nama_kota'];?>">
                                                        <?php
                                                        $default = $datakota['nama_kota'];
                                                        $tampilbandara = mysqli_query($conn, "SELECT nama_bandara FROM md_bandara WHERE kota_bandara='$default'");
                                                        while ($databandara = mysqli_fetch_array($tampilbandara)){
                                                            ?>
                                                            <option value="<?php echo $databandara['nama_bandara'];?>"><?php echo $databandara['nama_bandara'];?></option>
                                                        <?php } ?>
                                                    </optgroup>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Saya Berangkat Tanggal</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Tanggal Berangkat" id="datepicker-autoclose" data-date-format="dd MM yyyy" name="tanggal">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <!-- input-group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Saya Pesan</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" min="1" name="jumlahtiket">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i>&nbsp;Tiket</span>
                                                        </div>
                                                    </div>
                                                    <!-- input-group -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-success" style="width: 50%" type="submit" name="caritiket">Cari Tiket</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> 

                    <?php 
                    if (isset($_POST['caritiket'])){ 
                        $berangkat = $_POST['berangkat'];
                        $tujuan = $_POST['tujuan'];
                        $tgl = $_POST['tanggal'];
                        $jmltiket = $_POST['jumlahtiket'];

                        $tampiltiket = mysqli_query($conn, "SELECT * FROM md_jadwal WHERE (bandara_berangkat='$berangkat' AND bandara_tiba='$tujuan') AND tgl_berangkat='$tgl'");
                        $jumlahdata = mysqli_num_rows($tampiltiket);
                        if ($jumlahdata > 0){ 
                            $_SESSION['jml'] = $jmltiket;
                        ?>

                    <div class="row">
                        <div class="col-xl-12">     
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title text-white mb-0">Tiket Pesawat Yang Tersedia</h3>
                                </div>
                                <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered nowrap table-striped text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table table-striped">
                                            <tr class="bg-soft-info bg-gradient">
                                                <th>Maskapai</th>
                                                <th>Berangkat</th>
                                                <th>Durasi</th>
                                                <th>Tiba</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            while ($ambildatatiket = mysqli_fetch_assoc($tampiltiket)){
                                    $randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                                                $randomkode = substr(str_shuffle($randomchar), 0,8); 

                                                $gabungwaktu_a = $ambildatatiket['tgl_berangkat'];
                                                $gabungwaktu_b = $ambildatatiket['jam_berangkat'];

                                                $gabungwaktu_c = $ambildatatiket['tgl_tiba'];
                                                $gabungwaktu_d = $ambildatatiket['jam_tiba'];
                                                $waktu1 = strtotime($gabungwaktu_b);
                                                $waktu2 = strtotime($gabungwaktu_d);

                                                $waktukurang = $waktu2 - $waktu1;
                                                $jam = floor($waktukurang / (60*60)) ;
                                                $menit = $waktukurang - $jam * (60*60);

                                                $kodepesan = $ambildatatiket['kode_pesan'];
                                                $kodepesawat = $ambildatatiket['kode_pesawat'];
                                                ?>
                                            <tr class="table">
                                                <th scope="row" class="text-center">
                                                    <p class="pt-2"><img src="<?php echo "assets/images/maskapai/".$ambildatatiket['logo_maskapai'].".png";?>" height="20"></p>
                                                    <p>Kode Pesawat : <?php echo $ambildatatiket['kode_pesawat'];?></p>
                                                    <p><?php echo $ambildatatiket['kelas'];?></p>
                                                </th>
                                                <td>
                                                    <p class="h5"><?php echo $ambildatatiket['bandara_berangkat'];?></p>
                                                    <p><?php echo $ambildatatiket['tgl_berangkat'];?></p>
                                                    <p><?php echo $ambildatatiket['jam_berangkat'];?></p>
                                                </td>
                                                <td>
                                                    <i class="h1 fas fa-clock pt-2"></i>
                                                    <p class="h5">
                                                        <?php

                                                        if (empty($jam)){
                                                            echo floor($menit/60) . ' Menit';
                                                        }elseif (empty($menit)){
                                                            echo  $jam . " Jam";
                                                        }else{
                                                            echo $jam . " Jam " . floor($menit/60) . ' Menit';
                                                        }

                                                        ;?>
                                                    </p>

                                                </td>
                                                <td>
                                                    <p class="h5"><?php echo $ambildatatiket['bandara_tiba'];?></p>
                                                    <p><?php echo $ambildatatiket['tgl_tiba'];?></p>
                                                    <p><?php echo $ambildatatiket['jam_tiba'];?></p>
                                                </td>
                                                <td>
                                                    <p class="h5"><?php echo " Rp " . number_format($ambildatatiket['harga'],0,',','.');?></p>
                                                    <p>Sisa Tiket : <strong><?php echo $ambildatatiket['kuota'];?></strong></p>
                                                    <?php if (empty($ambildatatiket['kuota'])) { ?>
                                                    <button class="btn btn-dark" disabled>Tiket Habis</button>
                                                    <?php }else{ ?>
                                        <form method="post" action="booking.php">
                                        <input type="hidden" name="kodepesan" value="<?php echo $kodepesan;?>">
                                                    <button class="btn btn-info" type="submit" name="pesan">Pesan</button>
                                                </form>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                        <div class="alert alert-icon alert-warning text-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="mdi mdi-alert mr-2"></i>
                            <strong>Maaf, Data Tiket Tidak Ditemukan.</strong>
                        </div>
           <?php } } ?>


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
        <script src="assets/libs/select2/select2.min.js"></script>
        <script src="assets/libs/moment/moment.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        
        

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
        
        
        