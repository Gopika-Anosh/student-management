<?php
include 'db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];

    $sql_update = "UPDATE students SET name='$name', email='$email', course='$course', phone='$phone' WHERE id=$id";
    if($conn->query($sql_update) === TRUE){
        header("Location: view_students.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Student</title>
</head>
<body>
<h2>Edit Student</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    Course: <input type="text" name="course" value="<?php echo $row['course']; ?>" required><br><br>
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
    <input type="submit" name="update" value="Update Student">
</form>
<a href="view_students.php">Back to List</a>
</body>
</html>