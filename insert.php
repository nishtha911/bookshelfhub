<?php
include "db.php";

$stmt = $conn->prepare(
  "INSERT INTO books (title, author, rating) VALUES (?, ?, ?)"
);
$stmt->bind_param("ssi", $_POST['title'], $_POST['author'], $_POST['rating']);
$stmt->execute();

header("Location: index.php");
?>
