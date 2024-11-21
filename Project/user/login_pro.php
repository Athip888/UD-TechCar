<?php
session_start();
require('../config/dbconnect.php');

// รับข้อมูลจากฟอร์ม
$user_id = $_POST['user_id'];
$password = $_POST['password'];

// ป้องกัน SQL Injection และ XSS
$user_id = htmlspecialchars(mysqli_real_escape_string($connect, $user_id));
$password = htmlspecialchars(mysqli_real_escape_string($connect, $password));

/* ตรวจสอบidว่ามีในระบบไหม
ส่งคำสั่งไปฐานข้อมูลแล้วเก็บค่าใน$query_check_user_id*/
$check_user_id = "SELECT * FROM users WHERE user_id='$user_id'";
$query_check_user_id = mysqli_query($connect, $check_user_id);
/* ใช้คำสั่งดูแถวใน$query_check_user_id */
if (mysqli_num_rows($query_check_user_id) == 1) {
    //ดึงผลลัพธ์ที่ได้มาเก็บในuser userจะกลายเป็นarray
    $user = mysqli_fetch_assoc($query_check_user_id);
    $hashed_password = $user['password']; 
    //เช็ครหัสผ่าน
    if (password_verify($password,$hashed_password)) {
        if ($user['role'] == 'admin') {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['prefix'] = $user['prefix'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['position'] = $user['position'];
            $_SESSION['department'] = $user['department'];
            die(header('Location: ../php/admin.php'));
        }else {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['prefix'] = $user['prefix'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['position'] = $user['position'];
            $_SESSION['department'] = $user['department'];
            die(header('Location: home.php'));
        }
    }else {
        die(header('Location: index.html'));//รหัสไม่ถูกจะกลับไปหน้าlogin
    }
}else {
    die(header('Location: index.html'));
}

?>