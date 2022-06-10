<?php
session_start();
header('Cache-Control: no cache');
require_once "mdconfig.php";

if (empty($_SESSION['kodetiket'] && $_SESSION['kodetiket'] && $_SESSION['kodeinvoice'])){
    echo "<script> location.replace('index.php'); </script>";
}else{

    $jml = $_SESSION['jml'];
    $kodepesan = $_SESSION['kodepesan'];
    $kodetiket = $_SESSION['kodetiket'];
    $kodeinvoice = $_SESSION['kodeinvoice'];

    $tampiltiket = mysqli_query($conn, "SELECT * FROM md_jadwal WHERE kode_pesan='$kodepesan'");
    $ambildatatiket = mysqli_fetch_array($tampiltiket);

    $title_ps = $_POST['title_pemesan'];
    $nama_ps = $_POST['namapemesan'];
    $identitas_ps = $_POST['tipeidt_pemesan'];
    $noidentitas_ps = $_POST['nomoridentitas'];
    $nohp_ps = $_POST['nomorhp'];
    $email_ps = $_POST['emailpemesan'];

    $maskapai = $ambildatatiket['nama_maskapai'];
    $kodepesawat = $ambildatatiket['kode_pesawat'];
    $kelas = $ambildatatiket['kelas'];
    $bandara_b = $ambildatatiket['bandara_berangkat'];
    $tgl_b = $ambildatatiket['tgl_berangkat'];
    $jam_b = $ambildatatiket['jam_berangkat'];
    $bandara_t = $ambildatatiket['bandara_tiba'];
    $tgl_t = $ambildatatiket['tgl_tiba'];
    $jam_t = $ambildatatiket['jam_tiba'];
    $harga = $ambildatatiket['harga'];

    $tgl_pesan = date("d F Y");
    $status = "Belum Lunas";
    $pembayaran = $_POST['metode'];

    $pajak = ($harga * $jml) * (10/100) ;
    $total_harga = ($harga * $jml) + $pajak;

    if (isset($_SESSION['uname'])){
        $username = $_SESSION['uname'];
    }else{
        $username = "";
    }

    for ($i = 1; $i <= $jml; $i++) {
        $title_pn = $_POST['title_penumpang'.$i];
        $nama_pn = $_POST['nama_penumpang'.$i];
        $identitas_pn = $_POST['tipeidt_penumpang'.$i];
        $no_pn = $_POST['noidentitas_penumpang'.$i];

mysqli_query($conn, "INSERT INTO md_penumpang (title_penumpang,nama_penumpang,tipe_identitas,no_identitas,kode_pesan,kode_tiket,nomor_invoice,username) VALUES ('$title_pn','$nama_pn','$identitas_pn','$no_pn','$kodepesan','$kodetiket','$kodeinvoice','$username')");
}

mysqli_query($conn, "INSERT INTO md_tiket (title_pemesan,nama_pemesan,tipe_identitas,no_identitas,no_telepon,email,kode_pesan,nama_maskapai,kode_pesawat,kelas,bandara_berangkat,tgl_berangkat,jam_berangkat,bandara_tiba,tgl_tiba,jam_tiba,harga,kode_tiket,nomor_invoice,jumlah,username) VALUES ('$title_ps','$nama_ps','$identitas_ps','$noidentitas_ps','$nohp_ps','$email_ps','$kodepesan','$maskapai','$kodepesawat','$kelas','$bandara_b','$tgl_b','$jam_b','$bandara_t','$tgl_t','$jam_t','$total_harga','$kodetiket','$kodeinvoice','$jml','$username')");

mysqli_query($conn, "INSERT INTO md_invoice (nomor_invoice,tagihan,tgl_pesan,status,kode_tiket,metode_pembayaran,jumlah,username) VALUES ('$kodeinvoice','$total_harga','$tgl_pesan','$status','$kodetiket','$pembayaran','$jml','$username')");

    echo "<script> location.replace('invoice.php'); </script>";
}
?>