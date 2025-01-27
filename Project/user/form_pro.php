<?php
session_start();
require('../config/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // รับค่าจากฟอร์ม
    $user_id = $_SESSION['user_id'];
    $destination = $_POST['destination'];
    $province = $_POST['province'];
    $purpose = $_POST['purpose'];
    $departure_date = $_POST['departure_date'];
    $departure_time = $_POST['departure_time'];
    $return_date = $_POST['return_date'];
    $return_time = $_POST['return_time'];
    $passengers = $_POST['passengers'];

    $date_id = "UDTC" . date("Ymd");
    $sql_check_date = "SELECT * FROM `requests` WHERE request_id  LIKE '$date_id%'";
    $query_check_date = mysqli_query($connect, $sql_check_date);

if (mysqli_num_rows($query_check_date) > 0) {
    $sql_check_dates = "SELECT request_id FROM requests WHERE request_id LIKE '$date_id%' ORDER BY request_id DESC LIMIT 1";
    $query_check_dates = mysqli_query($connect, $sql_check_dates);
    if ($query_check_dates && mysqli_num_rows($query_check_dates) > 0) {
        // ดึงข้อมูลจากผลลัพธ์
        $row = mysqli_fetch_assoc($query_check_dates);
        $last_id = $row['request_id'];
        $num =substr($last_id,-3);
        $num_id = (int)$num+1;
        $num_pad =str_pad($num_id, 3, "0", STR_PAD_LEFT);
        $request_id = $date_id . $num_pad;
        echo "<p><strong>รหัสขอใช้รถ:</strong> $request_id</p>";
    }
} else {
    // ถ้ายังไม่มี request_id สำหรับวันนี้
    $request_id = $date_id . str_pad(1, 3, '0', STR_PAD_LEFT);
}


    // // ตรวจสอบค่าที่ได้รับ
    // echo "<h3>ข้อมูลที่ได้รับ:</h3>";
    // echo "<p><strong>รหัสขอใช้รถ:</strong> $request_id</p>";
    // echo "<p><strong>สถานที่:</strong> $destination</p>";
    // echo "<p><strong>จังหวัด:</strong> $province</p>";
    // echo "<p><strong>วัตถุประสงค์:</strong> $purpose</p>";
    // echo "<p><strong>วันที่ออกเดินทาง:</strong> $departure_date</p>";
    // echo "<p><strong>เวลาที่ออกเดินทาง:</strong> $departure_time</p>";
    // echo "<p><strong>วันที่กลับ:</strong> $return_date</p>";
    // echo "<p><strong>เวลาที่กลับ:</strong> $return_time</p>";
    // echo "<p><strong>จำนวนผู้โดยสาร:</strong> $passengers</p>";

    // ตรวจสอบว่ามีการเลือกจังหวัดเป็น "อุดรธานี" หรือไม่
    if ($province == "อุดรธานี") {
        $travel_type = "ในจังหวัด";
    } else {
        $travel_type = "ต่างจังหวัด";
    }

    // เตรียมคำสั่ง SQL สำหรับการบันทึกข้อมูล
    $sql_insert = "INSERT INTO requests (request_id, destination, province, purpose, departure_date, departure_time, return_date, return_time, passengers, travel_type,  request_date,user_id) 
                   VALUES ('$request_id', '$destination', '$province', '$purpose', '$departure_date', '$departure_time', '$return_date', '$return_time', '$passengers', '$travel_type', NOW(), '$user_id')";

    // ตรวจสอบว่าบันทึกสำเร็จหรือไม่
    if (mysqli_query($connect, $sql_insert)) {
        header("Location: form.php?status=1");

    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($connect);
    }
} else {
    header("Location: form.php");
    exit();
}
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connect);
exit();

?>
