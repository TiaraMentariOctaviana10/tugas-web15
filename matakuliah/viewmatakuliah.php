<?php
include 'koneksi.php';      // memanggil file koneksi.php untuk melakukan koneksi database
$_GET['tabel'] = "t_matakuliah";
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
        <h1>Tabel Matakuliah</h1>
        <center><a href="input.php">Input Data</a></center>
        <br>
        <?php require('../search.php') ?>
        <br/>
        <table border="1">
            <tr>
                <th>kodeMK</th>
                <th>namaMk</th>
                <th>sks</th>
                <th>jam</th>
            </tr>
            <?php
            if(isset($_GET['search'])){
                search($link);
            }
            else{
                // jalankan query untuk menampilkan semua asecending berdasarkan IdDosen
                $query = "SELECT * FROM t_dosen ORDER BY IdDosen ASC";
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
                    echo "<td>$data[kodeMK]</td>";       // menampilan data idDosen
                    echo "<td>$data[namaMK]</td>";    // menampilkan data namaDosen
                    echo "<td>$data[sks]</td>";       // menampilkan data noHP
                    // membuat link untuk mengedit dan menghapus data
                    echo '<td>
                    <a href="editmatakuliah.php?idDosen='.$data['kodeMK'].'">Edit</a> /
                    <a href="hapusmatakuliah.php?idDosen='.$data['kodeMK'].'"
                    onclick="return confirm(\'Anda yakin akan mengahpus data?\')">Hapus</a>
                    </td>';
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>
