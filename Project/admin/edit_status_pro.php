<?php
session_start();
require('../config/dbconnect.php'); // หรือที่อยู่ของไฟล์เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่า form ถูกส่งมาแล้ว
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $approvalStatus = $_POST['status'];  // สถานะการอนุมัติ
    $carId = $_POST['car_id'];  // id ของรถยนต์
    $driverId = $_POST['driver_id'];  // id ของพนักงานขับรถ
    $notes = $_POST['notes'];  // หมายเหตุ (ถ้ามี)
    $adminid = $_SESSION["user_id"];
    $request_id = $_POST['request_id'];

    // ถ้ามีค่า notes ให้เพิ่มลงในฐานข้อมูลก่อน
        $sql1 = "INSERT INTO `notes`(`request_id`, `note_text`) VALUES ('$request_id', '$notes')";
        if (!mysqli_query($connect, $sql1)) {
            echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกหมายเหตุ: " . mysqli_error($connect) . "'); window.location.href = 'manage_status.php';</script>";
            exit();
        }

    // ตรวจสอบว่ามีค่าที่จำเป็นสำหรับการอัปเดตสถานะหรือไม่
    if (!empty($approvalStatus) && !empty($carId) && !empty($driverId)) {
        // เตรียมคำสั่ง SQL เพื่ออัปเดตข้อมูลการอนุมัติ
        $sql = "UPDATE requests SET 
                     status = '$approvalStatus', 
                     car_id = '$carId', 
                     driver_id = '$driverId', 
                     admin_id = '$adminid'  
                 WHERE request_id = '$request_id'";

        // ดำเนินการคำสั่ง SQL
        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('บันทึกผลการอนุมัติเรียบร้อยแล้ว'); window.location.href = 'manage_status.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ: " . mysqli_error($connect) . "'); window.location.href = 'manage_status.php';</script>";
        }
    } else {
        echo "<script>window.location.href = 'manage_status.php';</script>";
    }
}

mysqli_close($connect);
exit();
