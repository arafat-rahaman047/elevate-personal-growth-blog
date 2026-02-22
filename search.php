<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<form method="GET" class="mb-4">
  <input type="text" name="keyword" class="form-control" placeholder="Search articles...">
</form>

<?php
if(isset($_GET['keyword'])){
  $keyword = "%" . $_GET['keyword'] . "%";

  $stmt = $conn->prepare("SELECT * FROM posts WHERE title LIKE ?");
  $stmt->bind_param("s", $keyword);
  $stmt->execute();
  $result = $stmt->get_result();

  while($row = $result->fetch_assoc()):
?>

<div class="card mb-3 p-3">
  <h4><?= $row['title']; ?></h4>
  <a href="post.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Read More</a>
</div>

<?php endwhile; } ?>

<?php include 'includes/footer.php'; ?>