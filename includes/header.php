<!DOCTYPE html>
<html>

<head>
  <title>Elevate - Personal Growth Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-success shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="index.php">🌱 Elevate</a>

      <div class="d-flex align-items-center ms-auto">
        <a href="blogs.php" class="btn btn-outline-light me-2">Blogs</a>
        <a href="admin/login.php" class="btn btn-light me-2">Admin Login</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </nav>

  <!-- Offcanvas Sidebar -->
  <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="sidebarMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="admin/login.php" class="text-decoration-none">Admin Login</a></li>
        <li class="list-group-item"><a href="blogs.php" class="text-decoration-none">Blogs</a></li>
        <li class="list-group-item"><a href="about.php" class="text-decoration-none">About Us</a></li>
        <li class="list-group-item"><a href="contact.php" class="text-decoration-none">Contact</a></li>
        <li class="list-group-item"><a href="category.php?id=1" class="text-decoration-none">Mindset</a></li>
        <li class="list-group-item"><a href="category.php?id=3" class="text-decoration-none">Habits</a></li>
        <li class="list-group-item"><a href="category.php?id=4" class="text-decoration-none">Goals</a></li>
      </ul>
    </div>
  </div>

  <div class="container mt-4">