<?php
    $id_produk=$_GET['id'];
    unset($_SESSION['cart'][$id_produk]);

    echo "<script>alert('Product deleted form cart');</script>";
    echo "<script>location='index.php?bettaku=shop';</script>";
?>