<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 30-09-2016
 * Time: 22:44
 */
include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
    "DELETE FROM students WHERE id = '$id' ");

if ($q) {
    // Deletion successful, redirect to the appropriate page with a notification message
    header("Location: addstudents.php?message=Student+deleted+successfully");
} else {
    // Error occurred during deletion
    echo 'Error';
}
?>
