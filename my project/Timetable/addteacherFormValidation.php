<?php

include 'connection.php';

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number format (Kenya format)
function validatePhoneNumber($phone) {
    return preg_match('/^\+254\d{9}$/', $phone);
}

if (isset($_POST['TN']) && isset($_POST['TF']) && isset($_POST['TE']) && isset($_POST['TD']) && isset($_POST['AL']) && isset($_POST['TP'])) {
    $name = $_POST['TN'];
    $facno = $_POST['TF'];
    $designation = $_POST['TD'];
    $alias = $_POST['AL'];
    $contact = $_POST['TP'];
    $email = $_POST['TE'];

    // Validate email and phone number format
    if (!validateEmail($email)) {
        $message = "Invalid email format!";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'addteachers.php';</script>";
        die();
    }
    if (!validatePhoneNumber($contact)) {
        $message = "Invalid phone number format!";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'addteachers.php';</script>";
        die();
    }
} else {
    $message = "Dead.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'addteachers.php';</script>";
    die();
}

// Add the teacher to the database
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO teachers VALUES ('$facno','$name','$alias','$designation','$contact','$email')");
$sql = "CREATE TABLE " . $facno . " (
day VARCHAR(10) PRIMARY KEY, 
period1 VARCHAR(30),
period2 VARCHAR(30),
period3 VARCHAR(30),
period4 VARCHAR(30),
period5 VARCHAR(30),
period6 VARCHAR(30)
)";
mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $sql);
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
for ($i = 0; $i < 6; $i++) {
    $day = $days[$i];
    $sql = "INSERT into " . $facno . " VALUES('$day','','','','','','')";
    mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $sql);
}

// Display a notification if the teacher is added successfully
if ($q) {
    $message = "Teacher added successfully!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'addteachers.php';</script>";
    exit(); // Ensure no further code execution after displaying the notification
} else {
    $message = "Failed to add teacher!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'addteachers.php';</script>";
    exit(); // Ensure no further code execution after displaying the notification
}
?>
