<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_invoice_v1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$date = $_POST['date'];
$deadline = $_POST['deadline'];
$time = $_POST['time'];
$deadline = $_POST['deadline'];
$description = $_POST['description'];
$employee = $_POST['employee'];
$level = $_POST['level'];
$user_id = $_SESSION['id'];




$sql = "INSERT INTO tasks_board (date, deadline, description, employee, level)
VALUES ('$date', '$deadline', '$description', '$employee', '$level')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: home.php');exit;
?>