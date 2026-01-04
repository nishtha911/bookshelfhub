<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>BookShelf Hub</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/main.js"></script>
</head>
<body>

<div class="container">
  <h1>📚 BookShelf Hub</h1>

  <div class="card">
    <form method="GET">
      <input type="text" name="search" placeholder="Search by title or author">
      <button type="submit">Search</button>
    </form>
  </div>

  <a href="add.php"><button style="margin-top:20px;">➕ Add Book</button></a>

  <table>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Rating</th>
      <th>Actions</th>
    </tr>

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
<tr>
  <td><?= $row['title'] ?></td>
  <td><?= $row['author'] ?></td>
  <td><?= $row['rating'] ?>/5</td>
  <td>
    <a class="action-btn edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
    <a class="action-btn delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirmDelete()">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
  </table>
</div>

</body>
</html>
