<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>E-Bookmu - Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f5f5f5;
    }
    .sidebar {
      background-color: #2c3e50;
      color: #fff;
      min-height: 100vh;
      position: fixed;
      width: 250px;
    }
    .main-content {
      margin-left: 250px;
    }
    .navbar {
      background-color:  #2c3e50;
      color: white;
      height: 70px;
      display: flex;
      align-items: center;
    }
    .nav-link {
      color: #cfd8dc;
      padding: 10px 15px;
      border-radius: 5px;
      margin: 5px 0;
    }
    .nav-link:hover, .nav-link.active {
      background-color: #1e2b38;
      color: white;
    }
    .profile-section {
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid #455a64;
    }
    .profile-img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-color: #ffaa00;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 10px;
    }
    .admin-badge {
      background-color: #ff9800;
      color: white;
      font-size: 12px;
      padding: 3px 10px;
      border-radius: 10px;
    }
    .section-title {
      font-size: 24px;
      margin: 30px 20px 20px;
      color: #333;
    }
    .dashboard-card {
      border: none;
      border-radius: 10px;
      height: 180px;
      color: white;
      position: relative;
      overflow: hidden;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .card-blue { background-color: #2980b9; }
    .card-orange { background-color: #e67e22; }
    .card-green { background-color: #27ae60; }
    .card-red { background-color: #e74c3c; }
    .card-icon {
      position: absolute;
      right: 20px;
      bottom: 10px;
      font-size: 70px;
      opacity: 0.2;
    }
    .more-info {
      font-size: 14px;
      color: rgba(255, 255, 255, 0.9);
    }
    .nav-section {
      padding: 10px 15px;
      font-size: 14px;
      color: #78909c;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
 @include('admin.sidebar')

  <!-- Main Content -->
  <div class="main-content">
   @yield('header')

   @yield('content')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
