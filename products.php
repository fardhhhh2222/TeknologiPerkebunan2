<?php include 'koneksi.php'; ?>
<!doctype html>
<html lang="id" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Produk & Layanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-card { border: none; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 30px; transition: 0.3s; }
    .product-card:hover { transform: translateY(-5px); }
    .price-card { border: 1px solid #dee2e6; border-radius: 10px; padding: 20px; margin-bottom: 20px; transition: 0.3s; }
    .price-card:hover { transform: scale(1.02); }
    .feature-list { list-style: none; padding-left: 0; }
    .feature-list li { padding: 8px 0; border-bottom: 1px solid #eee; }
    .feature-list li:last-child { border-bottom: none; }
  </style>
</head>
<body>

<!-- Navbar -->
<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">TEKNOLOGI DAN INOVASI PERKEBUNAN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.html">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="technology.html">Teknologi</a></li>
          <li class="nav-item"><a class="nav-link active" href="products.php">Produk & Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="case-studies.html">Studi Kasus</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="resources.html">Resources</a></li>
          <li class="nav-item"><a class="nav-link" href="training.html">Training</a></li>
          <li class="nav-item"><a class="nav-link" href="partnership.html">Partnership</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Hero Section -->
<section class="hero-section text-center text-white bg-dark py-5">
  <div class="container">
    <h1 class="display-4 fw-bold">Produk & Layanan</h1>
    <p class="lead">Solusi Digitalisasi Perkebunan Anda</p>
  </div>
</section>

<main class="container">
<?php
$kategori_query = mysqli_query($conn, "SELECT DISTINCT kategori FROM produk_layanan");
while ($kategori_row = mysqli_fetch_assoc($kategori_query)) {
  $kategori = $kategori_row['kategori'];
  
  // Ubah tampilan nama kategori jika perlu
  $kategori_label = ($kategori == 'Service') ? 'Layanan' : htmlspecialchars($kategori);
  
  echo '<section class="mb-5">';
  echo '<h2 class="text-center mb-4">' . $kategori_label . '</h2>';
  echo '<div class="row">';

  $kategori_safe = mysqli_real_escape_string($conn, $kategori);
  $produk_query = mysqli_query($conn, "SELECT * FROM produk_layanan WHERE kategori = '$kategori_safe'");
  while ($row = mysqli_fetch_assoc($produk_query)) {
    $card_class = ($kategori == 'Software') ? 'price-card' : 'product-card card h-100';
    $col_class = ($kategori == 'Service') ? 'col-md-6' : (($kategori == 'Software') ? 'col-md-6 col-lg-4' : 'col-md-4');

    echo '<div class="'.$col_class.'">';
    echo '<div class="'.$card_class.' p-3">';
    echo '<h3>' . htmlspecialchars($row['nama']) . '</h3>';
    echo '<p>' . htmlspecialchars($row['deskripsi']) . '</p>';
    echo '<ul class="feature-list">';
    $fitur = explode("✓", $row['fitur']);
    foreach ($fitur as $f) {
      $f = trim($f);
      if ($f !== "") echo "<li>✓ $f</li>";
    }
    echo '</ul>';
    echo '<a href="contact.html" class="btn btn-primary mt-3">'.(($kategori == 'Software') ? 'Pilih Paket' : 'Tanya Harga').'</a>';
    echo '</div></div>';
  }

  echo '</div></section>';
}
?>

<!-- CTA -->
<section class="text-center py-5 mb-5">
  <h2>Butuh Solusi Custom?</h2>
  <p class="lead">Tim kami siap membantu Anda!</p>
  <a href="contact.html" class="btn btn-primary btn-lg">Konsultasi Gratis</a>
</section>

</main>

<footer class="container py-4 text-center">
  <p>&copy; 2025 Teknologi dan Inovasi Perkebunan</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
