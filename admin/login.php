<?php
session_start();
include '../includes/db.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $admin = $result->fetch_assoc();

  if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
  } else {
    echo "<div class='alert alert-danger'>Invalid Login</div>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Login - Elevate Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>

<body>

  <div class="brand">🌱 Elevate Admin Panel</div>

  <div class="login-card">

    <h3>Admin Login</h3>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger text-center">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
      <button name="login" class="btn btn-success w-100">Login</button>
    </form>

  </div>

</body>

</html>