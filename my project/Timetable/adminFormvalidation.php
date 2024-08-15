<?php
include 'connection.php';

// Define the hardcoded username and password
$adminUsername = "admin";
$adminPassword = "password123"; // Change this to your actual password

if (isset($_POST['UN'], $_POST['PASS'])) {
    $username = $_POST['UN'];
    $password = $_POST['PASS'];
} else {
    die();
}

// Sanitize input to prevent SQL injection


// Check if the provided username matches the hardcoded admin username
if ($username === $adminUsername) {
    // Verify the password
    if ($password === $adminPassword) {
        // Password matches, redirect to addteachers.php
        header("Location: addteachers.php");
        exit;
    } else {
        // Password doesn't match, display error message
        $message = "Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');window.location.href = 'index.php';</script>";
       
    }
} else {
    // Username not found, display error message
    $message = "Username not found.\\nTry again. Username: $username";
    echo "<script type='text/javascript'>alert('$message');window.location.href = 'index.php';</script>";
}

mysqli_close($con);
?>
