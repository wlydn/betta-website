<?php 
    session_start();

    $koneksi = new mysqli("localhost","root","","db_bettaku");
    
    if( !$koneksi ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
 ?>