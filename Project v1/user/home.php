<?php
 session_start();
 require("../config/dbconnect.php");
//  if(!isset($_SESSION['user_id']) or !isset($_SESSION['role'])) {
//     die(header('Location: login.html'));
//  }else {
//     echo ($_SESSION['user_id']);
//     echo ($_SESSION['role']);
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองรถวิทยาลัยเทคนิค</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="logo"><h1>จองรถวิทยาลัยเทคนิค</h1>
        <span class="username"><?php 
        //echo $_SESSION['user_id'];
        ?></span>
    </div>
       
    </header>

    <div class="side-menu" id="sideMenu">
        <a href="#">หน้าหลัก</a>
        <a href="#">ประจำวัน</a>
        <a href="#">รายงาน</a>
        <a href="../php/logout.php">ออกจากระบบ</a>
       
    </div>
    
</body>
</html>