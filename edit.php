<?php
include "db.php";
$id = $_GET['id'];

$book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM books WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

<h2>Edit Book</h2>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

    <label>Title: </label>
    <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br><br>

    <label>Author: </label>
    <input type="text" name="author" value="<?php echo $book['author']; ?>" required><br><br>

    <label>Rating: </label>
    <input type="number" name="rating" value="<?php echo $book['rating']; ?>" min="1" max="5" required><br><br>

    <button type="submit">Update</button>

</form>

</body>
</html>
