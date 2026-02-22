<?php
session_start();
include '../includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid post ID.");
}
$id = (int) $_GET['id'];

if (isset($_POST['update'])) {
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);

  $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
  $stmt->bind_param("ssi", $title, $content, $id);

  if ($stmt->execute()) {
    header("Location: manage_posts.php");
    exit();
  } else {
    echo "Error updating post: " . $stmt->error;
  }
}

$stmt = $conn->prepare("SELECT title, content FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
  die("Post not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Edit Post</h4>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($row['title']); ?>"
              class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea id="content" name="content" rows="6" class="form-control"
              required><?= htmlspecialchars($row['content']); ?></textarea>
          </div>
          <button type="submit" name="update" class="btn btn-success">Update</button>
          <a href="manage_posts.php" class="btn btn-secondary ms-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>