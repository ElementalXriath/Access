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
$author = $_POST['author'];
$note = $_POST['note'];
$assignment_id = $_POST['assignment_id'];




$sql = "INSERT INTO notes (date, author, note, assignment_id)
VALUES ('$date', '$author', '$note', '$assignment_id')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>