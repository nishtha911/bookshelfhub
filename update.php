<?php
include "db.php";

$stmt = $conn->prepare(
  "UPDATE books SET title=?, author=?, rating=? WHERE id=?"
);
$stmt->bind_param(
  "ssii",
  $_POST['title'],
  $_POST['author'],
  $_POST['rating'],
  $_POST['id']
);
$stmt->execute();

header("Location: index.php");
?>
