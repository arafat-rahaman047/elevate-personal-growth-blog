<?php
include 'includes/db.php';
include 'includes/header.php';

$result = $conn->query("
  SELECT posts.*, categories.name AS category_name
  FROM posts
  JOIN categories ON posts.category_id = categories.id
  ORDER BY created_at DESC
");

echo '<h2 class="mb-4">All Blogs</h2>';
while ($row = $result->fetch_assoc()):
  ?>
  <div class="card mb-4 p-4">
    <h4><?= htmlspecialchars($row['title']); ?></h4>
    <small class="text-success">Category: <?= htmlspecialchars($row['category_name']); ?></small>
    <p class="mt-2"><?= substr(strip_tags($row['content']), 0, 200); ?>...</p>
    <a href="post.php?id=<?= $row['id']; ?>" class="btn btn-success">Read More</a>
  </div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>