<?php
session_start();

//เชื่อมต่อฐานข้อมูล
require('../config/dbconnect.php');

// รับข้อมูลจากฟอร์ม
$user_id = $_POST['user_id'];
$fullname = $_POST['fullname'];
$password = $_POST['password'];
$position = $_POST['position'];
$department = $_POST['department'];
$role = $_POST['role'];

// ป้องกัน SQL Injection
$user_id = mysqli_real_escape_string($connect, $user_id);
$fullname = mysqli_real_escape_string($connect, $fullname);
$password = mysqli_real_escape_string($connect, $password);
$position = mysqli_real_escape_string($connect, $position);
$department = mysqli_real_escape_string($connect, $department);
$role = mysqli_real_escape_string($connect, $role);

/* ตรวจสอบว่ามี user_id นี้ในระบบหรือยัง 
คำสั่งsql ค้นหาuser_idตามตัวแปรuser_id
mysqli_query จะเรียกใช้คำสั่งsql
ใช้mysqli_num_rows จะได้เลขตามแถวที่ได้จากคำสั่งsql
ถ้าน้อยยกว่า0 ก็คือไม่มีข้อมูลในจะเพิ่มข้อมูลเข้าไปในระบบ
ถ้ามากกว่ากว่า0 แสดงว่ามีข้อมูลแล้ว จะเด้งไปหน้าเพิ่มuser*/
$check_user_id = "SELECT user_id FROM users WHERE user_id='$user_id'";
$query_check_user_id = mysqli_query($connect, $check_user_id);
if (mysqli_num_rows($query_check_user_id) > 0) {
    //$_SESSION['alertuser'] = 0;
    header('Location: adduser.php?');
    exit();
} else {
    // รับค่าผ่านฟอร์ม แล้วใช้ฟังก์ชัน password_hash()เพื่อแปลงรหัสผ่านไปเป็นค่าอื่นด้วยอัลกอริธึม BCRYPT 
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // เพิ่มข้อมูลผู้ใช้ใหม่
    $sql = "INSERT INTO users (user_id, fullname, password, position, department, role) 
            VALUES ('$user_id', '$fullname', '$hashed_password', '$position', '$department', '$role')";

    // mysqli_queryจะส่งคำสั่งsqlไปฐานข้อมูลผ่านตัวแปรconnect ถ้าคำสั่งsqlสำเร็จจะส่งค่าtrue
    if (mysqli_query($connect, $sql)) {
        //$_SESSION['alertuser'] = 1;
        header('Location: adduser.php?');
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($connect);
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connect);
