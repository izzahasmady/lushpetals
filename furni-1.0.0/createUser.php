<?php
include 'dbconn.php';

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$noPhone = $_POST["noPhone"];

// Default role is 'User' unless it's the admin's credentials
$role = ($_POST["email"] === 'admin@gmail.com' && $_POST["password"] === 'admin123') ? 'Admin' : 'User';

$sqlSignUp = "INSERT INTO account (name, email, password, noPhone, role) VALUES ('$name', '$email', '$password', '$noPhone', '$role')";

if ($conn->query($sqlSignUp) === TRUE) {
    // Registration successful, redirect to login page
    header("location: login.php");
    exit();
} else {
    // Handle errors if the query fails
    echo "Error: " . $sqlSignUp . "<br>" . $conn->error;
}

$conn->close();
?>
