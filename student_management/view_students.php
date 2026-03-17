<?php
include 'db_connection.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>View Students</title>
</head>
<body>
<h2>Student List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Phone</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['course']."</td>
            <td>".$row['phone']."</td>
            <td><a href='edit_student.php?id=".$row['id']."'>Edit</a></td>
            <td><a href='delete_student.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
    ?>
</table>
<a href="add_student.php">Add Student</a>
</body>
</html>