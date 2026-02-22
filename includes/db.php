<?php
$conn = new mysqli("localhost", "root", "", "elevate_blog");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>