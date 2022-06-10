<?php
$judulhalaman = "Login";
require_once "mdconfig.php";
header('Cache-Control: no cache');
session_start();
$msgauth = "";

if (isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $authuser = mysqli_query($conn, "SELECT * FROM md_user WHERE (username='$username' OR email='$username') AND password='$password'");
    $checkuser = mysqli_num_rows($authuser);
    if($checkuser === 1){
        $userdata = mysqli_fetch_array($authuser);
        $_SESSION['uname'] = $userdata['username'];  
        header("location:profile.php");
    }else{

        $msgauth = "<div class='alert alert-icon alert-danger text-danger fade show mt-4' role='alert'><i class='mdi mdi-alert mr-2'></i><strong>Maaf, Login Gagal.</strong></div>";
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
                                <form class="p-2" method="post" action="">
                                    <div class="form-group">
                                        <label for="user">Username / Email</label>
                                        <input class="form-control" type="text" id="user" required placeholder="Masukan Username/Email" name="username">
                                    </div>
                                    <div class="form-group">
                                        <!--<a href="page-recoverpw.html" class="text-muted float-right">Forgot your password?</a>-->
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required id="password" placeholder="Masukan password" name="password">
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Belum Punya Akun? <a href="register.php" class="text-dark ml-1"><b>Daftar</b></a></p>
                            </div>
                        </div>
                        <?php echo $msgauth;?>
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