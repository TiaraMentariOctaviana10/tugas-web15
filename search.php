<?php 
    require'koneksi.php';

    function search($link){
        $tabel = $_GET['tabel'];
        $search = $_GET['text_search'];
        if($tabel == "t_dosen"){
            $berdasarkan = "kodeMK";
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
                    <td><?php echo $pecah['kodeMK'] ?></td>
                    <td><?php echo $pecah['namaMK'] ?></td>
                    <td><?php echo $pecah['sks'] ?></td>
                    <td>
                        <a href="editmatakuliah.php?idDosen=<?php echo $pecah['kodeMK']?>">Edit</a>
                        <a href="hapusmatakuliah.php?idDosen=<?php echo $pecah['kodeMK']?>" onclick="return confirm('Anda yakin akan mengahpus data?')">Hapus</a></td>;
                </tr>
<?php
            }
            else if($tabel == "t_matakuliah"){
?>
                <tr>
                    <td><?php echo $pecah['kodeMK'] ?></td>
                    <td><?php echo $pecah['namaMK'] ?></td>
                    <td><?php echo $pecah['sks'] ?></td>
                    <td><?php echo $pecah['jam'] ?></td>
                    <td>
                        <a href="editmatakuliah.php?NPM=<?php echo $pecah['NPM']?>">Edit</a>
                        <a href="hapusmatakuliah.php?NPM=<?php echo $pecah['NPM']?>" onclick="return confirm('Anda yakin akan mengahpus data?')">Hapus</a></td>;
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