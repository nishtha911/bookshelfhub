<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookShelf Hub</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/js/main.js"></script>
</head>
<body class="bg-slate-100 min-h-screen">

<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-3xl font-bold text-center mb-6">📚 BookShelf Hub</h1>

  <!-- Search -->
  <form method="GET" class="flex gap-3 mb-6">
    <input type="text" name="search" placeholder="Search by title or author"
      class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-500">
    <button class="bg-indigo-600 text-white px-6 rounded-lg hover:bg-indigo-700">
      Search
    </button>
  </form>

  <!-- Add Button -->
  <a href="add.php"
     class="inline-block mb-4 bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700">
     ➕ Add Book
  </a>

  <!-- Table -->
  <div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-center">
      <thead class="bg-slate-200">
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
               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
               Edit
            </a>
            <a href="delete.php?id=<?= $row['id'] ?>"
               onclick="return confirmDelete()"
               class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
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
