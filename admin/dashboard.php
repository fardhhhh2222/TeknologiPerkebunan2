<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin | Teknologi & Inovasi Perkebunan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #198754;
      color: white;
      padding: 1rem;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 1rem 0;
    }
    .sidebar a:hover {
      text-decoration: underline;
    }
    .content {
      padding: 2rem;
    }
    .card-dashboard {
      border: none;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      transition: 0.2s ease;
    }
    .card-dashboard:hover {
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <h4 class="mb-4">🌿 Admin Panel</h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="produk/index.php">Produk & Layanan</a>
        <a href="logout.php">Keluar</a>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 content">
        <h2 class="mb-4">Dashboard Admin</h2>
      <p class="text-muted">Selamat datang, <strong>Admin</strong></p>
        <div class="col-md-4">
          <div class="card card-dashboard p-3">
            <div class="d-flex justify-content-between">
              <div>
                <h5>Produk & Layanan</h5>
                <p class="text-muted">8 layanan</p>
              </div>
              <i class="fas fa-box-open fa-2x text-success"></i>
            </div>
            <a href="produk/index.php" class="btn btn-sm btn-success mt-2">Kelola</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
