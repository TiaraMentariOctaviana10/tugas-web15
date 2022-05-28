<?php
// buka koneksi dengan MySQL
include("../koneksi.php");

// mengecek apakah di url ada GET idDosen
if(isset($_GET["NPM"])) {

    // menyimpan variabel id dai url ke dalam variabel $idDosen
    $id = $_GET["NPM"];

    // jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM t_mahasiswa WHERE NPM='$id' ";
    $hasil_query = mysqli_query($link, $query);

    // periksa query, apakah ada kesalahan
    if(!$hasil_query) {
        die("Gagal menghapus data: ".mysqli_errno($lik).
        " - ".mysqli_error($link));
    }
}
// melakukan redirect ke halaman viewdosen.php
header("location:viewmahasiswa.php");
?>