<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome | E-Bookmu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-info text-white">

  <!-- Navbar branding pojok kiri -->
  <nav class="navbar bg-transparent">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-white"><h3>E-Bookmu</h3></span>
    </div>
  </nav>

  <!-- Konten tengah -->
  <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="text-center">
      <h1 class="display-4 fw-bold">Welcome</h1>
      <p class="lead">Selamat datang di e-Library. Temukan berbagai bacaan digital menarik dan edukatif untuk semua kalangan.</p>
      <div class="">
      <a href="{{ route('login')}}" class="btn btn-light px-4">Login</a>
      <a href="{{ route('register')}}" class="btn btn-outline-light px-4">Register</a>
    </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
