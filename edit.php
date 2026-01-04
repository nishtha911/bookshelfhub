<?php
include "db.php";
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM books WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$book = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Book</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
  <div class="card">
    <h2>Edit Book</h2>
    <form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?= $book['id'] ?>">
      <input type="text" name="title" value="<?= $book['title'] ?>" required>
      <input type="text" name="author" value="<?= $book['author'] ?>" required>
      <input type="number" name="rating" value="<?= $book['rating'] ?>" min="1" max="5" required>
      <button type="submit">Update Book</button>
    </form>
  </div>
</div>

</body>
</html>
