<?php
require('../config/dbconnect.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Sanitize the user ID to prevent SQL injection
    $user_id = mysqli_real_escape_string($connect, $user_id);

    // Delete the user from the database
    $sql = "DELETE FROM `users` WHERE `user_id` = '$user_id'";

    if (mysqli_query($connect, $sql)) {
        // Redirect to the user management page with a success message
        header("Location: manage_users.php");
    } else {
        // Redirect to the user management page with an error message
        header("Location: manage_users.php");
    }

    // Close the database connection after executing the query
    mysqli_close($connect);
} else {
    // If the user ID is not set, redirect back to the user management page
    header("Location: manage_users.php");
}

exit;
?>
