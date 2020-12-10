<?php
    
    if(!isset($_SESSION["pelanggan"]))
    {
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    echo "<script>location='index.php?bettakuu=login-user';</script>";
    }
?>