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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $judulhalaman; ?> | Travelling Jadi Mudah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Dengan MDTravel, Travelling Jadi Mudah" name="description" />
        <meta content="Dody" name="author" />

        <!--favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- magnific popup -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />

        <!-- Boxicon -->
        <link rel="stylesheet" type="text/css" href="css/boxicons.min.css" />

        <!-- owl carousel -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
        <link rel="stylesheet" href="css/owl.theme.default.min.css" />

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" id="app-css" rel="stylesheet" type="text/css" />
        <!-- third party css -->
            <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->

        <!-- Plugin css -->
        <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

        <link href="assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
        <link href="assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Start navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky">
            <div class="container">
                <a class="navbar-brand mb-4 mt-4" href="index.php">
                    <img src="assets/images/logo/vector/default-monochrome.svg" class="logo-light" alt="" height="20" />
                    <img src="assets/images/logo/vector/default-monochrome.svg" class="logo-dark" alt="" height="20" />
                </a>

                <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"><i class="bx bx-menu"></i></span>
                </a>

                <div class="collapse navbar-collapse mt-4" id="navbarNav">
                    <?php
                            if (!isset($_SESSION['uname'])){ ?>
                    <a href="register.php" class="btn btn-sm btn-outline-warning nav-btn ml-auto">Daftar</a>
                    <a href="login.php" class="btn btn-sm btn-outline-primary nav-btn ml-4">Login</a>
                    <?php }else{ ?>
                    <p class="ml-auto"><a href="profile.php" class="text-dark"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle" height="40">
                    <strong><?php echo $userdata['nama_lengkap'];?></strong></a> - <a href="logout.php">Logout</a></p>
                </div>
                 <?php } ?>
            </div>
            <!-- end container -->
        </nav>
        <!-- end navbar -->

        <!-- start hero -->
        <section class="hero-1 position-relative" id="home" style="background-image: url(images/hero-1-bg.png);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <img class="img-fluid" src="images/travel.png" alt="" />
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-sm-6">
                        <div class="card form-box position-relative p-4 mt-sm-0 mt-4">
                            <div class="m-2">
                                <div class="text-center">
                                    <p class="text-muted text-uppercase mb-3">Hi, Mau Pergi Kemana?</p>
                                    <h4 class="font-size-22">Cari Jadwal</h4>
                                </div>
                                <!-- start form -->
                                <form class="mt-4" method="post" action=""> 
                                    <div class="form-group">
                                        <label><strong><i class="fas fa-plane-departure"></i> Saya Berangkat Dari</strong></label>
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
                                   <div class="form-group">
                                        <label><strong><i class="fas fa-plane-arrival"></i> Saya Mau Ke</strong></label>
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
                                    <div class="form-group">
                                        <label><strong>Tanggal Berangkat</strong></label>
                                        <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Tanggal Berangkat" id="datepicker-autoclose" data-date-format="dd MM yyyy" name="tanggal">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Jumlah Tiket</strong></label>
                                        <input class="form-control" type="number" name="jumlahtiket" min="1">
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit" name="caritiket">Cari Tiket</button>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->

            <div class="container-fluid">
                <div class="row">
                    <div class="hero-bottom-shape">
                        <img class="img-fluid w-100 shape-light" src="images/hero-1-bottom-shape-light.png" alt="" />
                        <img class="img-fluid w-100 shape-dark" src="images/hero-1-bottom-shape-dark.png" alt="" />
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end hero -->

        <!-- start service -->
        <section class="section bg-light" id="services">
            <div class="container">
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
                        <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="mdi mdi-alert mr-2"></i>
                            <strong>Maaf, Data Tiket Tidak Ditemukan.</strong>
                        </div>
           <?php } }else{ ?>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="font-weight-medium mb-3">Mengapa MDTravel</h3>
                            <p class="text-muted">Kami sudah melayani lebih dari 15 tahun pada bidang jasa tiket online.</p>
                        </div>
                    </div>
                    <!-- end-col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5">
                                <img class="mb-4 pb-2" src="images/fast.png" alt="" height="100" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Proses Cepat</h5>
                                <p class="text-muted mb-3">Kami Mengedepankan Kecepatan Dalam Pemrosesan Data Calon Penumpang.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="mb-4 pb-2" src="images/rp.png" alt="" height="100" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Harga Terjangkau</h5>
                                <p class="text-muted mb-3">Harga Yang Ada Pada Platform Kami Adalah Harga Yang Kompetitif.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="mb-4 pb-2" src="images/easy.png" alt="" height="100" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Mudah</h5>
                                <p class="text-muted mb-3">Kemudahan Bagi Calon Penumpang Untuk Menggunakan Aplikasi Kami.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                
                <div class="row justify-content-center mt-4">
                    
                     <div class="col-lg-9">
                         <form method="post" action="">
                        <input type="text" name="input_invoice" class="form-control">
                    </div>
                    
                    <div class="col-lg-auto">
                        <button class="btn btn-primary" name="cek_invoice">Cek Invoice / Tiket</button>
                        </form>
                    </div>
                    
                    <?php
                if (isset($_POST['cek_invoice'])){
                    $inp_noinvoice = $_POST['input_invoice'];
                    $dat_invoice = mysqli_query($conn, "SELECT * FROM md_invoice WHERE nomor_invoice='$inp_noinvoice' OR kode_tiket='$inp_noinvoice'");
                    $checkinvoice = mysqli_num_rows($dat_invoice);
                    if($checkinvoice === 1){
                        $_SESSION['kodeinvoice'] = "$inp_noinvoice";
                        echo "<script>location.replace('invoice.php');</script>";
                    }else{ ?>
                        <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show mt-4" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="mdi mdi-alert mr-2"></i>
                            <strong>Maaf, Data Tiket / Invoice Tidak Ditemukan.</strong>
                        </div>
                    <?php } } ?>
                
                </div>
                
            <?php } ?>
            </div>
            <!-- end container -->
        </section>
        <!-- end services -->
        

        <!-- start testimonial -->
        <section class="section bg-light position-relative" id="review">
            <div class="container">
                <div class="hero-bg-overlay"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="text-center">
                                    <img class="img-fluid w-auto mx-auto mb-5" src="images/quote-icon.png" alt="" />
                                    <h3 class="font-size-20 mb-4">" Murah, Mudah, Dan Sangat Simple. Saya Sangat Suka Menggunakan Aplikasi Ini "</h3>
                                    <h6 class="text-muted">- Althea Daffa P.</h6>
                                </div>
                            </div>
                            <!-- end owl item -->
                            <div class="item">
                                <div class="text-center">
                                    <img class="img-fluid w-auto mx-auto mb-5" src="images/quote-icon.png" alt="" />
                                    <h3 class="font-size-20 mb-4">" Terimakasih ! Aplikasi Ini Sangat Mudah Pemakaiannya "</h3>
                                    <h6 class="text-muted">- Aulia Nur Fiqri</h6>
                                </div>
                            </div>
                            <!-- end owl item -->
                            <div class="item">
                                <div class="text-center">
                                    <img class="img-fluid w-auto mx-auto mb-5" src="images/quote-icon.png" alt="" />
                                    <h3 class="font-size-20 mb-4">" Semoga Ada Diskon-Diskon Menarik Di Aplikasi Ini, Hehehehe "</h3>
                                    <h6 class="text-muted">- Ferry Wahyu</h6>
                                </div>
                            </div>
                            <!-- end owl item -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end testimonial -->

        <!-- start faq -->
        <section class="section faq-bg position-relative" style="background-image: url(images/bandara.jpg);" id="faq">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <h3 class="text-white mb-5">
                            Frequently <br />
                            Asked Question
                        </h3>
                        <div class="accordion" id="accordionExample">
                            <div class="card rounded mb-3">
                                <div class="card-header position-relative border-bottom" id="headingOne">
                                    <a class="font-weight-medium faq-list mb-0" href="#collapseOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Apakah MDTravel Menjamin Tiket Calon Penumpang ?
                                    </a>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Tentu, MDTravel Menjamin Tiket Perjalan Calon Penumpang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded mb-3">
                                <div class="card-header border-bottom" id="headingTwo">
                                    <a class="font-weight-medium faq-list collapsed mb-0" href="#collapseTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Apakah Bisa Refund ?
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Saat Ini Fitur Refund Pada Aplikasi Belum Tersedia, Akan Tetapi Calon Penumpang Dapat Mengirimi Kami Email Untuk Pengajuan Refund Maksimal -2 H Keberangkatan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded mb-3">
                                <div class="card-header border-bottom" id="headingThree">
                                    <a class="font-weight-medium faq-list collapsed mb-0" href="collapseThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Apakah MDTravel Melayani Tiket Pesawat Antar Negara ?
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Mohon Maaf, Sayangnya MDTravel Belum Melayani Tiket Antar Negara.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 col-lg-5 offset-lg-1 offset-xl-2 col-md-6">
                        <div class="card rounded text-center p-4">
                            <h4 class="font-size-22 my-4">Masih Ada Pertanyaan ?</h4>
                            <div class="border-bottom mb-4"></div>
                            <p class="text-muted mb-3">Kami berharap beberapa pertanyaan FAQ dapat menjawab pertanyaan anda.</p>
                            <p class="text-muted">Tetapi apabila anda mempunyai pertanyaan yang tidak ada pada FAQ, anda bisa mengirim kami pertanyaan.</p>
                            <a href="mailto:dodypratama252@gmail.com" class="btn btn-primary my-4">Tanya Kami</a>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end faq -->

        <!-- start brandlogo -->
        <section class="brand-section border-bottom">
            <div class="container">
                <div class="row">
                     
                     <?php 
                    $gambarmaskapai = mysqli_query($conn, "SELECT * FROM md_maskapai");
                    while ($datamaskapai = mysqli_fetch_array($gambarmaskapai)){ ?>
                    <div class="col-lg-3 col-md-3">
                        <div class="client-image my-3">
                            <img class="img-fluid mx-auto d-block" src="<?php echo "assets/images/maskapai/".$datamaskapai['logo_maskapai'];?>" alt="" />
                        </div>
                    </div>
                    <?php } ?>
                     
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end brandlogo -->

        <!-- start footer -->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <a href="index-1.html" class="footer-logo">
                            <img src="assets/images/logo/vector/default-monochrome.svg" class="logo-dark" alt="" height="20" />
                            <img src="assets/images/logo/vector/default-monochrome.svg" class="logo-light" alt="" height="20" />
                        </a>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- end footer -->

        <!-- start footer alter -->
        <div class="footer-alt bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="py-4">
                            <p class="text-white text-center mb-0">2021 © MDTravel. Mdody.com</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end footer alter -->

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- smooth link -->
        <script src="js/scrollspy.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>

        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>

        <!-- magnific popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific.init.js"></script>

        <script src="js/app.js"></script>
        <script src="https://kit.fontawesome.com/bbc1c7660b.js" crossorigin="anonymous"></script>

                <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!--<script src="assets/js/magnific.init.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/scrollspy.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/app.js"></script>-->


        <script src="assets/libs/morris-js/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>
        <script src="assets/js/pages/dashboard.init.js"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/vendor.min.js"></script>
        <!-- Vendor js -->

        <script src="assets/libs/moment/moment.min.js"></script>
        <script src="assets/libs/switchery/switchery.min.js"></script>
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>
        <script src="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>
        <!-- Required datatable js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>

        
        <script src="assets/libs/select2/select2.min.js"></script>



        <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
        
        <!-- Init js-->
        <script src="assets/js/pages/form-advanced.init.js"></script>



    </body>
</html>
