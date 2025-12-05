<?php
include "db.php";

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$rating = $_POST['rating'];

$sql = "UPDATE books SET title='$title', author='$author', rating='$rating' WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: index.php");
exit();
?>
