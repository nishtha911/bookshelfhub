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
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'EB Garamond', serif; }
  </style>
</head>
<body class="bg-gradient-to-br from-red-900 to-red-950 min-h-screen flex items-center justify-center"> 

<div class="bg-red-50 p-6 rounded-xl shadow w-full max-w-md">
  <h2 class="text-2xl font-bold mb-4 text-red-900">✏️ Edit Book</h2>

  <form action="update.php" method="POST" class="space-y-4">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">

    <input type="text" name="title" value="<?= $book['title'] ?>" required
      class="w-full p-3 border rounded-lg">

    <input type="text" name="author" value="<?= $book['author'] ?>" required
      class="w-full p-3 border rounded-lg">

    <input type="number" name="rating" min="1" max="5" value="<?= $book['rating'] ?>" required
      class="w-full p-3 border rounded-lg">

    <button class="w-full bg-red-700 text-white py-2 rounded-lg hover:bg-red-800">
      Update Book
    </button>
  </form>
</div>

</body>
</html>
