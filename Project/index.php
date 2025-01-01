<?php
require('config/dbconnect.php');

// กำหนด $date_id สำหรับใช้ในคำสั่ง SQL
$date_id = "UDTC" . date("Ymd");

// คำสั่ง SQL
$sql_check_dates = "SELECT request_id FROM requests WHERE request_id LIKE '$date_id%' ORDER BY request_id DESC LIMIT 1";
$query_check_dates = mysqli_query($connect, $sql_check_dates);

// ตรวจสอบว่ามีผลลัพธ์หรือไม่
if ($query_check_dates && mysqli_num_rows($query_check_dates) > 0) {
    // ดึงข้อมูลจากผลลัพธ์
    $row = mysqli_fetch_assoc($query_check_dates);
    $last_id = $row['request_id'];
    $num =substr($last_id,-3);
    $num_id = (int)$num+1;
    $num_pad =str_pad($num_id, 3, "0", STR_PAD_LEFT);

    // แสดงข้อมูล
    echo "รหัสล่าสุดที่พบ: $last_id";
    echo "รหัสล่าสุดที่พบ: $date_id$num_pad";
} else {
    // กรณีไม่มีผลลัพธ์
    echo "ไม่พบรหัสที่ตรงกับ $date_id ในฐานข้อมูล";
}
?>
