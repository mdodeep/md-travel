<?php
require_once "mdconfig.php";
session_start();
$msgauth = "";

if (isset($_SESSION['uname'])){
    header("location:profile.php");
}

if (isset($_POST['daftar'])){
    $title = $_POST['title'];
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $namalengkap = $namadepan." ".$namabelakang;
    $username = $_POST['username'];
    $password = $_POST['password'];

$insertdata = mysqli_query($conn, "INSERT INTO md_user (username,password,title,nama_depan,nama_belakang,nama_lengkap,roles) VALUES ('$username','$password','$title','$namadepan','$namabelakang','$namalengkap','2')");
if ($insertdata){
    session_start();
    $_SESSION['uname'] = "$username";
    header("location:profile.php");
}

}
include "hook/public/header.php";
?>

    <body>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4 mt-3">
                                    <a href="index.php">
                                        <span><img src="assets/images/logo/vector/default-monochrome.svg" alt="" height="30"></span>
                                    </a>
                                </div>
                                <form method="post" action="" class="p-2">

                                    <div class="radio radio-primary form-check-inline">
                                        <input type="radio" name="title" id="radio03" value="Tuan">
                                        <label for="radio03">
                                            Tuan
                                        </label>
                                    </div>


                                    <div class="radio radio-primary form-check-inline">
                                        <input type="radio" name="title" id="radio04" value="Nyonya">
                                        <label for="radio04">
                                            Nyonya
                                        </label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="username">Nama Depan</label>
                                        <input class="form-control" type="text" id="username" required placeholder="Muhammad Dody" name="namadepan">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Nama Belakang</label>
                                        <input class="form-control" type="text" id="username" required placeholder="Pratama" name="namabelakang">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" id="username" required placeholder="Masukan Username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Masukan Password" name="password">
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary btn-block" type="submit" name="daftar"> Daftar </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Sudah Punya Akun? <a href="login.php" class="text-dark ml-1"><b>Login</b></a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>