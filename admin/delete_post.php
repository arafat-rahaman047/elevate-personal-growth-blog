<?php
session_start();
include '../includes/db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: manage_posts.php?error=No post ID provided');
  exit();
}

$id = intval($_GET['id']);

$check_stmt = $conn->prepare("SELECT title FROM posts WHERE id = ?");
$check_stmt->bind_param("i", $id);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows === 0) {
  header('Location: manage_posts.php?error=Post not found');
  exit();
}

$post = $result->fetch_assoc();
$delete_stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$delete_stmt->bind_param("i", $id);

if ($delete_stmt->execute()) {
  header('Location: manage_posts.php?success=Post "' . urlencode($post['title']) . '" deleted successfully');
} else {
  header('Location: manage_posts.php?error=Failed to delete post');
}

$delete_stmt->close();
$check_stmt->close();
$conn->close();
exit();