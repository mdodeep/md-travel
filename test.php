<?php
header('Cache-Control: no cache');
require_once "mdconfig.php";
session_start();
if (isset($_GET['payid'])){
    $checkid = $_GET['payid'];
    $checkpay = mysqli_query($conn, "SELECT * FROM md_invoice WHERE nomor_invoice='$checkid'");
    $checkinvoice = mysqli_num_rows($checkpay);
    if($checkinvoice === 1){
        $_SESSION['kodeinvoice'];
        header("Refresh:0");
    }else{
    	echo "Data Salah";
    }
}
?>