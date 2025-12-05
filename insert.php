<?php
include "db.php";

$title = $_POST['title'];
$author = $_POST['author'];
$rating = $_POST['rating'];

$sql = "INSERT INTO books (title, author, rating) VALUES ('$title', '$author', '$rating')";
mysqli_query($conn, $sql);

header("Location: index.php");
exit();
?>
