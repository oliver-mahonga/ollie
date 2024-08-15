<?php

include 'connection.php';
session_start();

if (isset($_POST['teacherName']) && isset($_POST['score'])) {
    $teacherName = $_POST['teacherName'];
    $score = $_POST['score'];
} else {
    $message = "Required fields are missing.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:studentpage.php?message=$message");
    exit();
}

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "ttms");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the evaluation already exists in the database
$checkEvaluationQuery = mysqli_query($conn, "SELECT * FROM evaluations WHERE teacher_name='$teacherName'");

if (mysqli_num_rows($checkEvaluationQuery) > 0) {
    $message = "You have already submitted an evaluation for this teacher.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:studentpage.php?message=$message");
    exit();
} else {
    // Insert the new evaluation into the database
    $q = mysqli_query($conn, "INSERT INTO evaluations (teacher_name, score) VALUES ('$teacherName', '$score')");

    if ($q) {
        $message = "Evaluation submitted successfully.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:studentpage.php?message=Evaluation+submitted+successfully");
        exit();
    } else {
        $message = "Failed to submit evaluation. Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:studentpage.php?message=Failed+to+submit+evaluation.+Please+try+again");
        exit();
    }
}

// Close the database connection
mysqli_close($conn);

?>
