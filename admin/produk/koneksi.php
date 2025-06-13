<?php
$koneksi = mysqli_connect("127.0.0.1", "root", "", "perkebunan_db");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi ke database gagal: " . mysqli_connect_error();
    exit;
}
?>
