<?php
require('../config/dbconnect.php');

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    // Sanitize the user ID to prevent SQL injection
    $car_id = mysqli_real_escape_string($connect, $car_id);

    // Delete the user from the database
    $sql = "DELETE FROM `cars` WHERE `car_id` = '$car_id'";

    if (mysqli_query($connect, $sql)) {
        // Redirect to the user management page with a success message
        header("Location: manage_car.php");
    } else {
        // Redirect to the user management page with an error message
        header("Location: manage_var.php");
    }

    // Close the database connection after executing the query
    mysqli_close($connect);
} else {
    // If the user ID is not set, redirect back to the user management page
    header("Location: manage_car.php");
}

exit;
?>
