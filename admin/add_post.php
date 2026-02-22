<?php
session_start();
include '../includes/db.php';

if (isset($_POST['submit'])) {
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);
  $category = $_POST['category'];

  $stmt = $conn->prepare("INSERT INTO posts(title, content, category_id) VALUES(?,?,?)");
  $stmt->bind_param("ssi", $title, $content, $category);

  if ($stmt->execute()) {
    echo "<div class='alert alert-success text-center'>Post Added!</div>";
  } else {
    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Add New Post</h3>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="6" placeholder="Write your post..." required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
              <?php
              $result = $conn->query("SELECT * FROM categories");
              while ($row = $result->fetch_assoc()):
                ?>
                <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['name']); ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <button name="submit" class="btn btn-success">Publish</button>
          <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>