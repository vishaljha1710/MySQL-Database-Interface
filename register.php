<?php

$fname = val($_POST["fname"]);  
$lname = val($_POST["lname"]);  
$email = val($_POST["email"]);  

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('$fname', '$lname', '$email')";

if ($conn->query($sql) === TRUE) {
	$sql="SELECT * FROM users where email='$email'";
    $result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$id=$row['id'];
    echo "New record created successfully. Record ID is: ".$id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>