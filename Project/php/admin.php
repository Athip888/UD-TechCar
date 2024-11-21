<?php
 session_start();
 require("../config/dbconnect.php");
 if(!isset($_SESSION['user_id']) or !isset($_SESSION['role'])) {
    die(header('Location: ../login.html'));
 }else{
    echo ($_SESSION['user_id']);
    echo ($_SESSION['role']);
 }
?>
<a href="logout.php">logout</a>