<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="hero mb-5">
  <h1>Transform Your Life Daily</h1>
  <p>Read powerful articles about mindset, habits & productivity.</p>
</div>
<div id="growthSlider" class="carousel slide mb-5" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#growthSlider" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#growthSlider" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#growthSlider" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner rounded shadow">

    <div class="carousel-item active">
      <img src="assets/images/slider1.jpg" class="d-block w-100 slider-img">
      <div class="carousel-caption">
        <h2>Master Your Mindset</h2>
        <p>Change your thinking, change your life.</p>
        <a href="category.php?id=1" class="btn btn-success">Explore Mindset</a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="assets/images/slider2.jpg" class="d-block w-100 slider-img">
      <div class="carousel-caption">
        <h2>Build Powerful Habits</h2>
        <p>Small daily habits create big success.</p>
        <a href="category.php?id=3" class="btn btn-success">Explore Habits</a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="assets/images/slider3.jpg" class="d-block w-100 slider-img">
      <div class="carousel-caption">
        <h2>Achieve Your Goals</h2>
        <p>Turn your dreams into reality.</p>
        <a href="category.php?id=4" class="btn btn-success">Explore Goals</a>
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#growthSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#growthSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>
<h3 class="mb-4">Latest Articles</h3>

<?php
$result = $conn->query("
SELECT posts.*, categories.name AS category_name
FROM posts
JOIN categories ON posts.category_id = categories.id
ORDER BY created_at DESC
");

while ($row = $result->fetch_assoc()):
  ?>

  <div class="card mb-4 p-4">
    <h4><?= $row['title']; ?></h4>
    <small class="text-success">Category: <?= $row['category_name']; ?></small>
    <p class="mt-2"><?= substr($row['content'], 0, 200); ?>...</p>
    <a href="post.php?id=<?= $row['id']; ?>" class="btn btn-success">Read More</a>
  </div>

<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>