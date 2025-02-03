<?php
require('../config/dbconnect.php');
if (isset($_GET['driver_id'])) {
    $driver_id = $_GET['driver_id'];
    // Sanitize the user ID to prevent SQL injection
    $driver_id = mysqli_real_escape_string($connect, $driver_id);
    
    // Delete the user from the database
    $sql = "DELETE FROM `drivers` WHERE `driver_id` = '$driver_id'";

    if (mysqli_query($connect, $sql)) {
        // Redirect to the user management page with a success message
        header("Location: manage_driver.php");
    } else {
        // Redirect to the user management page with an error message
        header("Location: manage_driver.php");
    }
} else {
    // If the user ID is not set, redirect back to the user management page
    header("Location: manage_driver.php");
}
// Close the database connection after executing the query
mysqli_close($connect);
exit;
