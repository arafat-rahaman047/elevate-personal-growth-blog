<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$id = (int) $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h2><?= htmlspecialchars($row['title']); ?></h2>
    </div>
    <div class="card-body">
      <?= nl2br(htmlspecialchars($row['content'])); ?>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>