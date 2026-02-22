<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$id = $_GET['id'];

$stmt = $conn->prepare("
SELECT posts.*, categories.name AS category_name
FROM posts
JOIN categories ON posts.category_id = categories.id
WHERE category_id=?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h3 class="mb-4">Category Posts</h3>

<?php while($row = $result->fetch_assoc()): ?>

<div class="card mb-4 p-4">
  <h4><?= $row['title']; ?></h4>
  <small class="text-success"><?= $row['category_name']; ?></small>
  <p class="mt-2"><?= substr($row['content'],0,150); ?>...</p>
  <a href="post.php?id=<?= $row['id']; ?>" class="btn btn-success">Read More</a>
</div>

<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>