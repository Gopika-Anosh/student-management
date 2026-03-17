<?php
include 'db_connection.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";
$conn->query($sql);

header("Location: view_students.php");
exit;
?>