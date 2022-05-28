<?php
// mengecek apakah tombol edit telah di klik
if(isset($_POST['edit'])) {
// buat koneksi dengan database
include("../koneksi.php");

// membuat variabel untuk menampung data dari form edit
$id = $_POST['NPM'];
$namaMHS = $_POST['namaMHS'];
$noHP = $_POST['noHP'];

// buat dan jalankan query UPDATE
$query = "UPDATE t_mahasiswa SET namaMHS = '".$namaMHS."', noHP = '".$noHP."' WHERE NPM = ".$id;

$result = mysqli_query($link, $query);

// periksa hasil query apakah ada error
if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
    " - ".mysqli_error($link));
}
}

// lakukan redirect ke halaman viewMahasiswa.php
header("location:viewmahasiswa.php");
?>