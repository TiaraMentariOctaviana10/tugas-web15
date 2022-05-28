<?php 
    require('koneksi.php');

    function search($link){
        $tabel = $_GET['tabel'];
        $search = $_GET['text_search'];
        if($tabel == "t_dosen"){
            $berdasarkan = "namaDosen";
        }
        $sql = "SELECT * FROM ".$tabel." WHERE ".$berdasarkan." like '%".$search."%'";
        $query = mysqli_query($link,$sql);
        
        while($pecah = mysqli_fetch_array($query)){
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