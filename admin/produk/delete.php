<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM produk_layanan WHERE id='$id'");
header("Location: index.php");
?>
