<?php
include 'koneksi.php'; // Pastikan path ini sesuai

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Amankan input
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $fitur = mysqli_real_escape_string($koneksi, $_POST['fitur']);

    // Query insert termasuk kategori
    mysqli_query($koneksi, "INSERT INTO produk_layanan (nama, kategori, deskripsi, fitur) VALUES ('$nama', '$kategori', '$deskripsi', '$fitur')");

    // Redirect ke index
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Tambah Produk</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Hardware">Hardware</option>
        <option value="Software">Software</option>
        <option value="Konsultasi">Service</option>
        <!-- Tambahkan kategori lain jika perlu -->
      </select>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Fitur</label>
      <textarea name="fitur" class="form-control" placeholder="Contoh: ✓ Fitur 1 ✓ Fitur 2" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
