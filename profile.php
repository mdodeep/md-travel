<?php
$judulhalaman = "Profile";
require_once "mdconfig.php";
header('Cache-Control: no cache');
session_start();
$auth = $_SESSION['uname'];
$authuser = mysqli_query($conn, "SELECT * FROM md_user WHERE username='$auth'");
$userdata = mysqli_fetch_array($authuser);
$msg = "";


if (isset($_POST['simpandata'])){
    header("Refresh:1");
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $namalengkap = $namadepan." ".$namabelakang;
    $tipeidentitas = $_POST['tipeidentitas'];
    $nomoridentitas = $_POST['nomoridentitas'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $insertdata = mysqli_query($conn, "UPDATE md_user SET nama_depan='$namadepan',nama_belakang='$namabelakang',nama_lengkap='$namalengkap',tipe_identitas='$tipeidentitas',nomor_identitas='$nomoridentitas',email='$email',alamat='$alamat' WHERE username='$auth'");
    if ($insertdata){
        $msg = "<div class='alert alert-icon alert-success text-success alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fas fa-check'></i><strong>Data Berhasil Disimpan</strong></div>";
    }
}

if (isset($_POST['simpanpassword'])){
    $pwlama = $_POST['pwlama'];
    $pwbaru = $_POST['pwbaru'];

    $insertdata = mysqli_query($conn, "SELECT * FROM md_user WHERE (username='$auth' AND password='$pwlama')");
    $checkuser = mysqli_num_rows($insertdata);
        if($checkuser === 1){
        mysqli_query($conn, "UPDATE  md_user SET password='$pwbaru' WHERE (username='$auth' AND password='$pwlama')");
        $msg = "<div class='alert alert-icon alert-success text-success alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fas fa-check'></i><strong> Password Berhasil Diubah</strong></div>";
        }else{
            $msg = "<div class='alert alert-icon alert-danger text-danger alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='mdi mdi-alert mr-2'></i><strong> Password Gagal Diubah</strong></div>";
        }
 
}


$invoice_d = mysqli_query($conn, "SELECT * FROM md_invoice WHERE username='$auth'");
$penumpang_d = mysqli_query($conn, "SELECT * FROM md_penumpang WHERE username='$auth'");
$tiket_d = mysqli_query($conn, "SELECT * FROM md_tiket WHERE username='$auth'");
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
                                <?php if ($userdata['roles'] == 9){ ?>
                                <li class="has-submenu">
                                    <a href="admin.php">
                                        <i class="ti-user"></i>Admin Dashboard
                                    </a>
                                </li>
                                <?php } ?>

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
                                <div class="p-0 text-center">
                                    <div class="member-card">
                                        <div class="avatar-xxl member-thumb mb-2 center-page mx-auto">
                                            <img src="assets/images/users/avatar-3.jpg" class="rounded-circle img-thumbnail" alt="profile-image">
                                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                        </div>

                                        <div class="">
                                            <h5 class="mt-3"><?php echo $userdata['nama_lengkap'];?></h5>
                                            <p class="text-muted"><?php echo $userdata['email'];?></p>
                                        </div>
                                        <?php if (empty($userdata['nomor_identitas'] OR $userdata['tipe_identitas'] OR $userdata['alamat'] OR $userdata['pin'])){ ?>
                                        <div class="alert alert-icon alert-danger text-danger fade show" role="alert">
                                            <i class="mdi mdi-alert mr-2"></i>
                                            <strong>Data Diri Belum Lengkap, Silahkan Lengkapi Data Diri Di Bagian Settings</strong>
                                        </div>
                                        <?php } ?>
                                    </div>
 <?php echo $msg;?>
                                </div>
                                <!-- end card-box -->

                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <!-- end -->

                        <div class="mt-5">
                            <ul class="nav nav-tabs tabs-bordered">
                                <li class="nav-item">
                                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        Settings
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="home-b1">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <!-- Personal-Information -->
                                            <div class="panel card panel-fill">
                                                <div class="card-header">
                                                    <h5 class="font-16 m-1">Informasi Personal</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <strong>Nama Lengkap</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $userdata['nama_lengkap'];?></p>
                                                    </div>
                                                    <div class="mb-4">
                                                        <strong>Nomor Identitas</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $userdata['nomor_identitas'];?> <b>(<?php echo $userdata['tipe_identitas'];?>)</b></p>
                                                    </div>
                                                    <div class="mb-4">
                                                        <strong>Email</strong>
                                                        <br>
                                                        <p class="text-muted"><?php echo $userdata['email'];?></p>
                                                    </div>
                                                    <div class="mb-0">
                                                        <strong>Alamat</strong>
                                                        <br>
                                                        <p class="text-muted mb-0"><?php echo $userdata['alamat'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->

                                        </div>

                                        <div class="col-lg-8">
                                            <!-- Personal-Information -->
                                            <div class="panel card panel-fill">
                                                <div class="card-header">
                                                    <h5 class="font-16 m-1">Riwayat Pemesanan</h5>
                                                </div>
                                                <div class="card-body">

                                       <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered nowrap table-striped text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="table table-striped">
                                                <tr class="bg-soft-primary bg-gradient">
                                                    <th>Maskapai</th>
                                                    <th>Berangkat</th>
                                                    <th>Tiba</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($ambildatatiket = mysqli_fetch_array($tiket_d)){ 
                                                    while ($ambildatainvoice = mysqli_fetch_array($invoice_d)){ 
                                                        ?>

                                                <tr class="table">
                                                    <th scope="row" class="text-center">
                                                        <p class="pt-2"><img src="<?php echo "assets/images/maskapai/".$ambildatatiket['nama_maskapai'].".png";?>" height="20"></p>
                                                        <p>Kode Pesawat : <?php echo $ambildatatiket['kode_pesawat'];?></p>
                                                        <p><?php echo $ambildatatiket['kelas'];?></p>
                                                    </th>
                                                    <td>
                                                        <p class="h5"><?php echo $ambildatatiket['bandara_berangkat'];?></p>
                                                        <p><?php echo $ambildatatiket['tgl_berangkat'];?></p>
                                                        <p><?php echo $ambildatatiket['jam_berangkat'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="h5"><?php echo $ambildatatiket['bandara_tiba'];?></p>
                                                        <p><?php echo $ambildatatiket['tgl_tiba'];?></p>
                                                        <p><?php echo $ambildatatiket['jam_tiba'];?></p>
                                                    </td>
                                                    <td>
                                                <?php if ($ambildatainvoice['status'] == "Lunas"){ ?>
                                                <p class="pt-2"><a href="tiket.php" class="btn btn-success waves-effect waves-light"><i class="fas fa-ticket-alt mr-1"></i> Lihat Tiket</a></p>
                                                <?php }else{ ?>
                                                <p class="pt-2"><a href="invoice.php" class="btn btn-success waves-effect waves-light"><i class="fas fa-ticket-alt mr-1"></i> Bayar Tagihan</a></p>
                                                <?php } ?>
                                                <p class="pt-2"><a href="invoice.php" class="btn btn-primary waves-effect waves-light"><i class="fas fa-ticket-alt mr-1"></i> Lihat Invoice</a></p>
                                                   </td>
                                                </tr>
                                            <?php 
                                            $_SESSION['kodeinvoice'] = $ambildatainvoice['nomor_invoice']; 
                                        } 
                                    }  
                                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="profile-b1">
                                    <!-- Personal-Information -->
                                    <div class="panel card panel-fill">
                                        <div class="card-header">
                                            <h5 class="font-16 m-1">Edit Profile</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="namadepan">Nama Depan</label>
                                                    <input type="text" value="<?php echo $userdata['nama_depan'];?>" id="namadepan" class="form-control" name="namadepan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="namabelakang">Nama Belakang</label>
                                                    <input type="text" value="<?php echo $userdata['nama_belakang'];?>" id="namabelakang" class="form-control" name="namabelakang">
                                                </div>
                                                <div class="form-group">
                                                    <label for="namalengkap">Nama Lengkap</label>
                                                    <input type="text" value="<?php echo $userdata['nama_lengkap'];?>" id="namalengkap" class="form-control" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipeidentitas">Tipe Identitas</label>
                                                    <select class="form-control" id="tipeidentitas" name="tipeidentitas">
                                                        <option value="KTP">KTP</option>
                                                        <option value="SIM">SIM</option>
                                                        <option value="PASSPOR">PASSPOR</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomoridentitas">Nomor Identitas</label>
                                                    <input type="number" value="<?php echo $userdata['nomor_identitas'];?>" id="FullName" class="form-control" name="nomoridentitas">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Email">Email</label>
                                                    <input type="email" value="<?php echo $userdata['email'];?>" id="Email" class="form-control" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Username">Username</label>
                                                    <input type="text" value="<?php echo $userdata['username'];?>" id="Username" class="form-control" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea style="height: 115px" id="alamat" class="form-control" name="alamat"><?php echo $userdata['alamat'];?></textarea>
                                                </div>
                                                <div class="text-right">
                                                <button class="btn btn-primary waves-effect waves-light width-md" type="submit" name="simpandata">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="panel card panel-fill">
                                        <div class="card-header">
                                            <h5 class="font-16 m-1">Edit Password</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label for="Passwordlama">Password Lama</label>
                                                    <input type="password" placeholder="Masukan Password Lama" id="Passwordlama" class="form-control" name="pwlama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="RePassword">Password Baru</label>
                                                    <input type="password" placeholder="Masukan Password Baru" id="RePassword" class="form-control" name="pwbaru">
                                                </div>
                                                <div class="text-right">
                                                <button class="btn btn-primary waves-effect waves-light width-md" type="submit" name="simpanpassword">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>
                            </div>
                        </div>

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

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>