<?php
require("headadmin.php");

// ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม (ข้อมูลคนขับรถหลายคน)
    $fullnames = $_POST['fullname'];
    $phone_numbers = $_POST['phone_number'];
    $start_dates = $_POST['start_date'];

    // ตรวจสอบให้แน่ใจว่าข้อมูลทั้งหมดมีขนาดเท่ากัน
    $num_fullnames = count($fullnames);

    for ($i = 0; $i < $num_fullnames; $i++) {
        // ป้องกัน SQL Injection
        $fullname = mysqli_real_escape_string($connect, $fullnames[$i]);
        $phone_number = mysqli_real_escape_string($connect, $phone_numbers[$i]);
        $start_date = mysqli_real_escape_string($connect, $start_dates[$i]);

        // SQL Query สำหรับการเพิ่มข้อมูลคนขับรถ
        $sql = "INSERT INTO drivers (name, phone_number, work_date) 
                VALUES ('$fullname', '$phone_number', '$start_date')";

        // เพิ่มข้อมูลคนขับรถลงฐานข้อมูล
        if (!mysqli_query($connect, $sql)) {
            echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มข้อมูลคนขับรถที่ " . ($i + 1) . "'); window.location.href='add_driver.php';</script>";
            exit();
        }
    }

    // ถ้าทำการเพิ่มข้อมูลสำเร็จ
    echo "<script>alert('เพิ่มข้อมูลคนขับรถทั้งหมดสำเร็จ'); window.location.href='manage_driver.php';</script>";
    mysqli_close($connect);
exit();
}
?>
