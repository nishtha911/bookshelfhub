<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add a New Book</h2>

<form action="insert.php" method="POST">
    <label>Title: </label>
    <input type="text" name="title" required><br><br>

    <label>Author: </label>
    <input type="text" name="author" required><br><br>

    <label>Rating (1–5): </label>
    <input type="number" name="rating" required min="1" max="5"><br><br>

    <button type="submit">Add Book</button>
</form>

</body>
</html>
