<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

  <h2>Welcome, <?= htmlspecialchars($_SESSION['admin']); ?> 👋</h2>

  <div class="mt-4">
    <a href="add_post.php" class="btn btn-success me-2">Add New Post</a>
    <a href="manage_posts.php" class="btn btn-primary me-2">Manage Posts</a>
    <a href="../index.php" class="btn btn-info me-2">Back to Home</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>

</body>

</html>