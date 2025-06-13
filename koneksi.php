<?php
$host = '127.0.0.1';
// Host database ( biasanya localhost )
$user = 'root';
// Username database
$pass = '';
// Password database
$db   = 'perkebunan_db';
// Nama database

// Membuat koneksi
$conn = mysqli_connect( $host, $user, $pass, $db );

// Cek koneksi
if ( !$conn ) {
    die( 'Koneksi gagal: ' . mysqli_connect_error() );
}
?>
