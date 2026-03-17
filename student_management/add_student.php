<?php
include 'db_connection.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO students (name, email, course, phone) VALUES ('$name','$email','$course','$phone')";
    if($conn->query($sql) === TRUE){
        echo "Student added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Student</title>
</head>
<body>
<h2>Student Registration Form</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>
    <input type="submit" name="submit" value="Add Student">
</form>
<a href="view_students.php">View Students</a>
</body>
</html>