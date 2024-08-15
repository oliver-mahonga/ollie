<?php

include 'connection.php';
if (isset($_POST['SN']) && isset($_POST['SE'])) {
    $name = $_POST['SN'];
    $email = $_POST['SE'];
} else {
    $message = "Required fields are missing.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}

// Check if the email already exists in the database
$checkEmailQuery = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT * FROM students WHERE email='$email'");

if (mysqli_num_rows($checkEmailQuery) > 0) {
    $message = "Email already in use.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addstudents.php?message=Email+already+in+use");
} else {
    // Insert the new student into the database
    $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO students (name, email) VALUES ('$name', '$email')");

    if ($q) {
        $message = "Student added successfully.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:addstudents.php?message=Student+added+successfully");
    } else {
        $message = "Failed to add student. Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:addstudents.php?message=Failed+to+add+student.+Please+try+again");
    }
}
?>
