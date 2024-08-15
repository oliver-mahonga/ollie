<?php

include 'connection.php';

if (isset($_POST['SN']) && isset($_POST['SC']) && isset($_POST['SS']) && isset($_POST['SD']) && isset($_POST['ST'])) {
    $name = $_POST['SN'];
    $code = $_POST['SC'];
    $sem = $_POST['SS'];
    $course = $_POST['ST'];
    $dept = $_POST['SD'];
} else {
    $message = "Required fields are missing.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}


// Check if the subject code already exists in the database

$checkSubjectCodeQuery = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT * FROM subjects WHERE subject_code='$code'");

if (mysqli_num_rows($checkSubjectCodeQuery) > 0) {
    $message = "Subject code already exists.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:addsubjects.php?message=Subject+code+already+exists");
} else {
    // Insert the new subject into the database
    
    $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "INSERT INTO subjects (subject_code, subject_name, course_type, semester, department, isAlloted, allotedto, allotedto2, allotedto3) VALUES ('$code','$name','$course','$sem','$dept',0,'','','')");

    if ($q) {
        $message = "Subject added successfully.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:addsubjects.php?message=Subject+added+successfully");
        
    } else {
        $message = "Failed to add subject. Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location:addsubjects.php?message=Failed+to+add+subject");
        
    }
}

?>
