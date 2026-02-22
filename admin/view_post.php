<?php
session_start();
include '../includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid post ID.");
}
$id = (int) $_GET['id'];

$stmt = $conn->prepare("
    SELECT posts.title, posts.content, posts.created_at, categories.name AS category_name
    FROM posts
    LEFT JOIN categories ON posts.category_id = categories.id
    WHERE posts.id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
  die("Post not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($post['title']); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h2 class="mb-0"><?= htmlspecialchars($post['title']); ?></h2>
      </div>
      <div class="card-body">
        <p class="text-muted mb-2">
          <strong>Category:</strong> <?= htmlspecialchars($post['category_name'] ?? 'Uncategorized'); ?> |
          <strong>Date:</strong> <?= date('M d, Y', strtotime($post['created_at'] ?? 'now')); ?>
        </p>
        <hr>
        <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
      </div>
      <div class="card-footer">
        <a href="manage_posts.php" class="btn btn-secondary">Back to Posts</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>