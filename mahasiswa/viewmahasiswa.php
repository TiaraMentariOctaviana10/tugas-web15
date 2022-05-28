<?php
include '../koneksi.php';      // memanggil file koneksi.php untuk melakukan koneksi database
$_GET['tabel'] = "t_mahasiswa";
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            table{
                width: 840px;
                margin: auto;
            }
            h1{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Tabel Mahasiswa</h1>
        <center><a href="input.php">Input Data</a></center>
        <br>
        <?php require('../search.php') ?>
        <br/>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama Mahasiswa</th>
                <th>No HP</th>
                <th>Pilihan</th>
            </tr>
            <?php
            if(isset($_GET['search'])){
                search($link);
            }
            else{
                // jalankan query untuk menampilkan semua asecending berdasarkan IdMahasiswa
                $query = "SELECT * FROM t_Mahasiswa ORDER BY NPM ASC";
                $result = mysqli_query($link, $query);

                // mengecek apakah ada error ketika menjalankan query
                if(!$result) {
                die ("Query Error: ".mysqli_errno($link).
                " - ".mysqli_error($link));
            }
                // hasil query akan disimpan dalaam variabel $data dalam bentuk array
                // kemudian dicetak dengan perulangan while
                while ($data = mysqli_fetch_assoc($result))
                {
                    // mencetak / meamplikan data
                    echo "<tr>";
                    echo "<td>".$data['NPM']."</td>";       // menampilan data NPM
                    echo "<td>".$data['namaMHS']."</td>";    // menampilkan data namaMHS
                    echo "<td>".$data['noHP']."</td>";       // menampilkan data noHP
                    // membuat  link untuk mengedit dan menghapus data
                    echo '<td>
                    <a href="editmahasiswa.php?NPM='.$data['NPM'].'">Edit</a> /
                    <a href="hapusmahasiswa.php?NPM='.$data['NPM'].'"
                    onclick="return confirm(\'Anda yakin akan mengahpus data?\')">Hapus</a>
                    </td>';
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>
