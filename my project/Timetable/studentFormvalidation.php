<?php
session_start();
include 'connection.php'; // Make sure this file path is correct

if (isset($_POST['studentName'], $_POST['studentEmail'])) {
    $name = $_POST['studentName'];
    $email = $_POST['studentEmail'];

    $query = "SELECT * FROM students WHERE name = '$name' AND email = '$email'";
    $result = mysqli_query($con, $query); // Use $conn here instead of $mysql

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loggedin_name'] = $row['name'];
        $_SESSION['loggedin_id'] = $row['id']; // Assuming 'id' is the student ID field
        header("Location: studentpage.php"); // Redirect to student page
        exit();
    } else {
        $message = "Invalid credentials. Please try again.";
        echo "<script type='text/javascript'>alert('$message');window.location.href = 'index.php';</script>";
    }
}
?>
