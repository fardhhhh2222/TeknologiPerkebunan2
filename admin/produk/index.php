<?php
include 'koneksi.php';

// Ambil data dari database
$data = mysqli_query($koneksi, "SELECT * FROM produk_layanan");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kelola Produk & Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Produk & Layanan</h2>

  <div class="d-flex justify-content-between mb-3">
    <a href="../dashboard.php" class="btn btn-secondary">← Kembali ke Dashboard</a>
    <a href="create.php" class="btn btn-success">+ Tambah</a>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Kategori</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Fitur</th>
        <th>Created At</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($d = mysqli_fetch_array($data)) { ?>
      <tr>
        <td><?= htmlspecialchars($d['id']) ?></td>
        <td><?= htmlspecialchars($d['kategori']) ?></td>
        <td><?= htmlspecialchars($d['nama']) ?></td>
        <td><?= nl2br(htmlspecialchars($d['deskripsi'])) ?></td>
        <td><?= nl2br(htmlspecialchars($d['fitur'])) ?></td>
        <td><?= htmlspecialchars($d['created_at']) ?></td>
        <td>
          <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
