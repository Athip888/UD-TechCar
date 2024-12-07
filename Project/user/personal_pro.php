<?php
session_start();
require('../config/dbconnect.php');

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Get POST data
$fullname = $_POST['fullname'];
$position = $_POST['position'];
$department = $_POST['department'];

// Sanitize inputs
$fullname = mysqli_real_escape_string($connect, $fullname);
$position = mysqli_real_escape_string($connect, $position);
$department = mysqli_real_escape_string($connect, $department);

// Update user information in the database
$sql = "UPDATE users 
        SET fullname = '$fullname', position = '$position', department = '$department'
        WHERE user_id = '$user_id'";

if (mysqli_query($connect, $sql)) {
    // Redirect with success status
    header('Location: personal.php?status=2');
    $_SESSION['fullname'] = $fullname;
    $_SESSION['position'] = $position;
    $_SESSION['department'] = $department;
} else {
    // Display an error message if the query fails
    echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล: " . mysqli_error($connect);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    // รับข้อมูลไฟล์
    $name = $_SESSION['user_id'];
    $file = $_FILES['file'];
    $file_name = $name . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    //print_r($file_name); ปริ้นชื่อไฟล์

    //ตรวจสอบประเภทไฟล์
    $fileType = $file['type'];
    if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif'])) {
        // ถ้าไม่ใช่ไฟล์ภาพ ส่งกลับไปที่หน้า personal
        header("Location: personal.php?status=2");  // status=2 แสดงว่าไฟล์ไม่ใช่ภาพ
    }

    // รับที่อยู่ไฟล์ชั่วคราว
    $tempPath = $file['tmp_name'];

    // ตั้งที่อยู่ปลายทางที่ไฟล์จะถูกบันทึก
    $go_to_folder = '../user_image/' . $file_name;

    //ตรวจสอบแล้วลบไฟล์
    $type_img = [".jpg", ".jpeg", ".png", ".gif"];
    for ($i = 0; $i < count($type_img); $i++) {
        $delete_oldpic = '../user_image/' . $name . $type_img[$i];
        if (file_exists($delete_oldpic)) {
            unlink($delete_oldpic);  // ลบไฟล์เก่า
        }
    }

    $sql = "UPDATE users 
        SET profile_picture = '$file_name'
        WHERE user_id = '$user_id'";
    if (mysqli_query($connect, $sql)) {
        // Redirect with success status
        header('Location: personal.php?status=2');
        $_SESSION['profile_picture'] = $file_name;
    } 

    //ย้ายไฟล์ไปยังโฟลเดอร์ที่ต้องการ
    if (move_uploaded_file($tempPath, $go_to_folder)) {
        header("Location: personal.php?status=2");
    } else {
        echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
    }

}
exit();
mysqli_close($connect); // ปิดการเชื่อมต่อฐานข้อมูล