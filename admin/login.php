<?php
session_start();
include 'produk/koneksi.php'; // Pastikan koneksi pakai $koneksi

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Email dan kata sandi wajib diisi.";
    } else {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt  = $koneksi->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Versi cepat: tanpa password_hash
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email']   = $user['email'];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Kata sandi salah.";
            }
        } else {
            $error = "Akun tidak ditemukan.";
        }
    }
}
?>

<!doctype html>
<html lang="id" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <title>Login - Teknologi Perkebunan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .card {
        background-color: #1e1e2f;
        border: none;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
        animation: fadeIn 1s ease-in-out;
      }
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
      .form-control {
        background-color: #2b2b3d;
        color: #fff;
        border: 1px solid #444;
      }
      .form-control:focus {
        background-color: #2b2b3d;
        color: #fff;
        border-color: #0dcaf0;
        box-shadow: none;
      }
    </style>
  </head>
  <body>
    <main class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card text-center">
            <h1 class="h4 mb-3 fw-bold text-light">Masuk ke Teknologi Perkebunan</h1>

            <?php if (!empty($error)): ?>
              <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="post" action="">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-4">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Kata Sandi</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
              <div class="mt-3">
                <small class="text-muted">Belum punya akun? <a href="register.html" class="text-info">Daftar sekarang</a></small>
              </div>
              <p class="mt-5 mb-2 text-secondary small">&copy; 2025 Teknologi Perkebunan</p>
            </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
