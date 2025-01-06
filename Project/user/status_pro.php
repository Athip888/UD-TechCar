<?php
// เชื่อมต่อกับฐานข้อมูล
require("../config/dbconnect.php");

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    $sql_status = "SELECT status FROM `requests` WHERE `request_id`='$request_id'";
    $result = mysqli_query($connect, $sql_status);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
        if ($status == 'อนุมัติ') {
            header("Location: status.php?status=2");
            mysqli_close($connect);
            exit();
        }
    }
    // SQL สำหรับการอัปเดตสถานะ
    $sql = "UPDATE requests SET status = 'ปฏิเสธ' WHERE request_id = '$request_id'";

    // ทำการอัปเดต
    if (mysqli_query($connect, $sql)) {
        header("Location: status.php?status=1");
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($connect);
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connect);
exit();
