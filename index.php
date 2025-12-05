<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>BookShelf Hub</title>
</head>
<body>

<h1>BookShelf Hub</h1>
<a href="add.php">Add New Book</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Rating</th>
        <th>Actions</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['author']."</td>";
        echo "<td>".$row['rating']."</td>";
        echo "<td>
            <a href='edit.php?id=".$row['id']."'>Edit</a> |
            <a href='delete.php?id=".$row['id']."'>Delete</a>
        </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
