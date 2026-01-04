<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
  <div class="card">
    <h2>Add New Book</h2>
    <form action="insert.php" method="POST">
      <input type="text" name="title" placeholder="Book Title" required>
      <input type="text" name="author" placeholder="Author Name" required>
      <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" required>
      <button type="submit">Add Book</button>
    </form>
  </div>
</div>

</body>
</html>
