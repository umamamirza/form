
<?php
include('dbConnection.php');

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (!empty($name) && !empty($email) && !empty($password)) {
   $sql = "INSERT INTO students(name, email, password) VALUES ('$name', '$email', '$password')";
 if ($conn->query($sql) === TRUE) {
    echo "Student Saved Successfully";
    
} else {
    echo "Unable to Save Student: ". $conn->error;
}
}

$conn->close();
?>
