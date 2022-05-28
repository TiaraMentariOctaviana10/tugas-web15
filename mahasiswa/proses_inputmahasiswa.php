<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// mengecek apakah tombol input dari form  telah di  klik
if (isset($_POST['input'])) {

// membuat variabel untuk menampung data dari form
$namaMHS = $_POST['namaMHS'];
$noHP = $_POST['noHP'];

// jalankan query INSERT untuk menambah data ke database
$query = "INSERT INTO t_mahasiswa VALUES (NULL, '$namaMHS', '$noHP')";
$result = mysqli_query($link, $query);

// periksa query apakah ada error
if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
    " - ".mysqli_error($link));
    }
}

// melakukan redirect (mengalihkan) ke halaman viewMahasiswa.php
header("location:viewmahasiswa.php");
?>