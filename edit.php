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
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-6 rounded-xl shadow w-full max-w-md">
  <h2 class="text-2xl font-bold mb-4">✏️ Edit Book</h2>

  <form action="update.php" method="POST" class="space-y-4">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">

    <input type="text" name="title" value="<?= $book['title'] ?>" required
      class="w-full p-3 border rounded-lg">

    <input type="text" name="author" value="<?= $book['author'] ?>" required
      class="w-full p-3 border rounded-lg">

    <input type="number" name="rating" min="1" max="5" value="<?= $book['rating'] ?>" required
      class="w-full p-3 border rounded-lg">

    <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
      Update Book
    </button>
  </form>
</div>

</body>
</html>
