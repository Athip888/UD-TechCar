<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "udtechcar";
$connect = mysqli_connect($servername, $username, $password, $db);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "";
?>