<?php
include "db.php";

$stmt = $conn->prepare("DELETE FROM books WHERE id=?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

header("Location: index.php");
?>
