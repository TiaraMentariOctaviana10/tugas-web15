<?php
// buka koneksi dengan MySQL
include("koneksi.php");

// mengecek apakah di url ada GET idDosen
if(isset($_GET["idDosen"])) {

    // menyimpan variabel id dai url ke dalam variabel $idDosen
    $id = $_GET["idDosen"];

    // jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM t_dosen WHERE idDOsen='$id' ";
    $hasil_query = mysqli_query($link, $query);

    // periksa query, apakah ada kesalahan
    if(!$hasil_query) {
        die("Gagal menghapus data: ".mysqli_errno($lik).
        " - ".mysqli_error($link));
    }
}
// melakukan redirect ke halaman viewdosen.php
header("location:viewdosen.php");
?>