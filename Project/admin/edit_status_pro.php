<?php
session_start();
require('../config/dbconnect.php'); // หรือที่อยู่ของไฟล์เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่า form ถูกส่งมาแล้ว
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $approvalStatus = $_POST['status'];  // สถานะการอนุมัติ
    $carId = isset($_POST['car_id']) ? $_POST['car_id'] : null;  // id ของรถยนต์ (ถ้ามี)
    $driverId = isset($_POST['driver_id']) ? $_POST['driver_id'] : null;  // id ของพนักงานขับรถ (ถ้ามี)
    $notes = isset($_POST['notes']) ? $_POST['notes'] : null;  // หมายเหตุ (ถ้ามี)
    $adminid = $_SESSION["user_id"];
    $request_id = $_POST['request_id'];

    // ถ้ามีค่า notes ให้เพิ่มลงในฐานข้อมูลก่อน
    if ($notes) {
        $sql1 = "INSERT INTO `notes`(`request_id`, `note_text`) VALUES ('$request_id', '$notes')";
        if (!mysqli_query($connect, $sql1)) {
            echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกหมายเหตุ: " . mysqli_error($connect) . "'); window.location.href = 'manage_status.php';</script>";
            exit();
        }
    }

    // ถ้ามีการส่งค่า status มาเท่านั้น
    if (!empty($approvalStatus)) {
        // ถ้ามีค่าที่จำเป็นสำหรับการอัปเดตสถานะ
        if (!empty($carId) && !empty($driverId)) {
            // อัปเดตข้อมูลการอนุมัติ
            $sql = "UPDATE requests SET 
                        status = '$approvalStatus', 
                        car_id = '$carId', 
                        driver_id = '$driverId', 
                        admin_id = '$adminid'  
                    WHERE request_id = '$request_id'";
        } else {
            // ถ้ามีแค่ status ก็อัปเดตเฉพาะสถานะ
            $sql = "UPDATE requests SET 
                        status = '$approvalStatus', 
                        admin_id = '$adminid'  
                    WHERE request_id = '$request_id'";
        }

        // ดำเนินการคำสั่ง SQL
        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('บันทึกผลการอนุมัติเรียบร้อยแล้ว'); window.location.href = 'manage_status.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตสถานะ: " . mysqli_error($connect) . "'); window.location.href = 'manage_status.php';</script>";
        }
    } else {
        echo "<script>alert('สถานะไม่สามารถว่างได้'); window.location.href = 'manage_status.php';</script>";
    }
}

mysqli_close($connect);
exit();
