<?php
// menampilkan file koneksi.php untuk membuat koneksi
include '../koneksi.php';

// mengecek apakah di url ada nilai GET idDosen
if (isset($_GET['NPM'])) {
    // ambil nilai idDosen dari url dan disimpan dalam variabel $id
    $id = ($_GET["NPM"]);

    // menampilkan dat t_dosen dari databse yang mempunyai idDosen=$id
    $query = "SELECT * FROM t_mahasiswa WHERE NPM='$id'";
    $result = mysqli_query($link, $query);
    // mengecek apakah query gagal
    if(!$result) {
        die ("Query Error: ".mysqli_errno($link).
        " - ".mysqli_error($link));
    }
    // mengambil  data dari database dan membuat variabel-variabel untuk menampung data
    // variabel ini nantinya akan ditamplikan pada form
    $data = mysqli_fetch_assoc($result);
    $NPM = $data["NPM"];
    $namaMHS = $data["namaMHS"];
    $noHP = $data["noHP"];
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:viewmahasiswa.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            h1{
                text-align: center;
            }
            .container{
                width: 400px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <h1>Edit Data</h1>
        <div class="container">
            <form id="form_mahasiswa" action="proses_editmahasiswa.php" method="post">

            <fieldset>
                <legend>Edit Data Mahasiswa</legend>
                <p>
                    <label for="NPM">ID : </label>
                    <input type="hidden" name="NPM" value="<?php echo $NPM ; ?>">
                    <input type="text" name="NPMDisabled" id="NPMDisabled" value="<?php echo $NPM ?>" disabled>
                </p>
                <p>
                    <label for="namaMHS">Nama Mahasiswa : </label>
                    <input type="text" name="namaMHS" id="namaMHS" value="<?php echo $namaMHS ?>">
                </p>
                <p>
                    <label for="noHP">No HP : </label>
                    <input type="text" name="noHP" value="<?php echo $noHP ?>">
                </p>
            </fieldset>
            <p>
                <input type="submit" name="edit" value="Update Data">
            </p>
            </form>
        </div>
    </body>
</html>



