<?php 
    require('koneksi.php');

    function search($link){
        $tabel = $_GET['tabel'];
        $search = $_GET['text_search'];
        if($tabel == "t_dosen"){
            $berdasarkan = "namaDosen";
        }
        else if($tabel == "t_mahasiswa"){
            $berdasarkan = "namaMHS";
        }
        $sql = "SELECT * FROM ".$tabel." WHERE ".$berdasarkan." like '%".$search."%'";
        $query = mysqli_query($link,$sql);
        
        while($pecah = mysqli_fetch_array($query)){
            if($tabel == "t_dosen"){
?>
                <tr>
                    <td><?php echo $pecah['idDosen'] ?></td>
                    <td><?php echo $pecah['namaDosen'] ?></td>
                    <td><?php echo $pecah['noHP'] ?></td>
                    <td>
                        <a href="editdosen.php?idDosen=<?php echo $pecah['idDosen']?>">Edit</a>
                        <a href="hapusdosen.php?idDosen=<?php echo $pecah['idDosen']?>" onclick="return confirm('Anda yakin akan mengahpus data?')">Hapus</a></td>;
                </tr>
<?php
            }
            else if($tabel == "t_mahasiswa"){
?>
                <tr>
                    <td><?php echo $pecah['NPM'] ?></td>
                    <td><?php echo $pecah['namaMHS'] ?></td>
                    <td><?php echo $pecah['prodi'] ?></td>
                    <td><?php echo $pecah['alamat'] ?></td>
                    <td><?php echo $pecah['noHP'] ?></td>
                    <td>
                        <a href="editmahasiswa.php?NPM=<?php echo $pecah['NPM']?>">Edit</a>
                        <a href="hapusmahasiswa.php?NPM=<?php echo $pecah['NPM']?>" onclick="return confirm('Anda yakin akan mengahpus data?')">Hapus</a></td>;
                </tr>
<?php
            }
            
        }
    }
?>

<center>
    <form action="" method="GET">
        <label for="Search">Search: </label>
        <br>
        <input type="text" name="text_search" placeholder="Search">
        <input type="submit" name="search" value="Cari">
    </form>
</center>