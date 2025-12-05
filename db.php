<?php
$conn = mysqli_connect("localhost", "root", "root", "bookshelfhub");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
