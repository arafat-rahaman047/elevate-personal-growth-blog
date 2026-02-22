<?php
session_start();
include '../includes/db.php';

$result = $conn->query("
  SELECT posts.id, posts.title, posts.content, posts.created_at, categories.name AS category_name
  FROM posts
  LEFT JOIN categories ON posts.category_id = categories.id
  ORDER BY posts.id DESC
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Manage Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Manage Posts</h2>
      <div class="d-flex">
        <a href="add_post.php" class="btn btn-primary me-2">Add New Post</a>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
      </div>
    </div>


    <?php if ($result->num_rows > 0): ?>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td>
                <strong><?= htmlspecialchars($row['title']); ?></strong><br>
                <small class="text-muted"><?= substr(strip_tags($row['content']), 0, 50); ?>...</small>
              </td>
              <td><?= $row['category_name'] ?? 'Uncategorized'; ?></td>
              <td><?= date('M d, Y', strtotime($row['created_at'] ?? 'now')); ?></td>
              <td>
                <a href="edit_post.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_post.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
                  onclick="return confirm('Delete this post?')">Delete</a>
                <a href="view_post.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">View</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <p class="text-muted">Total Posts: <strong><?= $result->num_rows; ?></strong></p>
    <?php else: ?>
      <div class="alert alert-info text-center">No posts found. <a href="add_post.php">Create one now</a>.</div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>