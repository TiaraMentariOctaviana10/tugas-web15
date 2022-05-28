<?php 
    require("koneksi.php");

    function inputDosen($link){
        if(isset($_POST['input'])){
            $namaDosen = $_POST['namaDosen'];
            $noHP = $_POST['noHP'];
            $sql = "INSERT INTO t_dosen (namaDosen,noHP) VALUES ('".$namaDosen."','".$noHP."')";
            $query = mysqli_query($link, $sql);
        }
    };
?>