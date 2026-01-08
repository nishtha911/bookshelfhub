<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookShelf Hub</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/js/main.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'EB Garamond', serif; }
  </style>
</head>
<body class="bg-gradient-to-br from-red-900 to-red-950 min-h-screen py-10">

<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-3xl font-bold text-center mb-6 text-white">📚 BookShelf Hub</h1>

  <!-- Search -->
  <form method="GET" class="flex gap-3 mb-6">
    <input type="text" name="search" placeholder="Search by title or author"
      class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-red-500">
    <button class="bg-red-900 text-white px-6 rounded-lg hover:bg-red-800">
      Search
    </button>
  </form>

  <!-- Add Button -->
  <a href="add.php"
     class="inline-block mb-4 bg-red-700 text-white px-5 py-2 rounded-lg hover:bg-red-800">
     ➕ Add Book
  </a>

  <!-- Table -->
  <div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-center">
      <thead class="bg-red-900 text-white">
        <tr>
          <th class="p-3">Title</th>
          <th class="p-3">Author</th>
          <th class="p-3">Rating</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
$search = $_GET['search'] ?? '';
$stmt = $conn->prepare(
  "SELECT * FROM books WHERE title LIKE ? OR author LIKE ?"
);
$param = "%$search%";
$stmt->bind_param("ss", $param, $param);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()):
?>
        <tr class="border-b">
          <td class="p-3"><?= $row['title'] ?></td>
          <td class="p-3"><?= $row['author'] ?></td>
          <td class="p-3"><?= $row['rating'] ?>/5</td>
          <td class="p-3 flex justify-center gap-3">
            <a href="edit.php?id=<?= $row['id'] ?>"
               class="bg-amber-600 text-white px-3 py-1 rounded hover:bg-amber-700">
               Edit
            </a>
            <a href="delete.php?id=<?= $row['id'] ?>"
               onclick="return confirmDelete()"
               class="bg-red-700 text-white px-3 py-1 rounded hover:bg-red-800">
               Delete
            </a>
          </td>
        </tr>
<?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
