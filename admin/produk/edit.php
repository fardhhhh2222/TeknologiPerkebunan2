<?php
include 'koneksi.php'; // Sesuaikan dengan struktur folder

// Cek apakah ID ada
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM produk_layanan WHERE id='$id'");

// Cek apakah data ditemukan
if (mysqli_num_rows($data) === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$d = mysqli_fetch_assoc($data);

// Proses update jika form disubmit
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $fitur = mysqli_real_escape_string($koneksi, $_POST['fitur']);

    mysqli_query($koneksi, "UPDATE produk_layanan SET nama='$nama', kategori='$kategori', deskripsi='$deskripsi', fitur='$fitur' WHERE id='$id'");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Edit Produk</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($d['nama']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Hardware" <?= ($d['kategori'] == 'Hardware') ? 'selected' : '' ?>>Hardware</option>
        <option value="Software" <?= ($d['kategori'] == 'Software') ? 'selected' : '' ?>>Software</option>
        <option value="Konsultasi" <?= ($d['kategori'] == 'Service') ? 'selected' : '' ?>>Service</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required><?= htmlspecialchars($d['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label>Fitur</label>
      <textarea name="fitur" class="form-control" required><?= htmlspecialchars($d['fitur']) ?></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
