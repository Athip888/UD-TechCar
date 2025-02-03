<?php
require('../config/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $licensePlate = $_POST['licensePlate'];
    $province = $_POST['province'];
    $brand = $_POST['brand'];
    $seats = $_POST['seats'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $car_type = $_POST['car_type'];

    // ตรวจสอบว่ามีข้อมูลในทุกฟิลด์
    if (empty($licensePlate) || empty($province) || empty($brand) || empty($seats) || empty($model) || empty($color)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน!'); window.history.back();</script>";
        exit();
    }

    // วนลูปเพิ่มข้อมูลทุกคัน
    for ($i = 0; $i < count($licensePlate); $i++) {
        // ดึงข้อมูลแต่ละรายการ
        $plate = mysqli_real_escape_string($connect, $licensePlate[$i]);
        $prov = mysqli_real_escape_string($connect, $province[$i]);
        $bran = mysqli_real_escape_string($connect, $brand[$i]);
        $seat = (int)$seats[$i]; // แปลงเป็นจำนวนเต็ม
        $mod = mysqli_real_escape_string($connect, $model[$i]);
        $col = mysqli_real_escape_string($connect, $color[$i]);
        $type = mysqli_real_escape_string($connect, $car_type[$i]);

        // สร้าง SQL Statement
        $sql = "INSERT INTO cars (plate_number, province, brand, seats, model, color, status, car_type)
                VALUES ('$plate', '$prov', '$bran', $seat, '$mod', '$col', 'ใช้ได้ปกติ', '$type')";

        // ตรวจสอบว่าเพิ่มข้อมูลสำเร็จหรือไม่
        if (!mysqli_query($connect, $sql)) {
            echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มข้อมูลรถที่ " . ($i + 1) . "'); window.history.back();</script>";
            exit();
        }
    }

    // เปลี่ยนหน้าไปยังหน้าจัดการรถ
    echo "<script>alert('เพิ่มข้อมูลรถสำเร็จ!'); window.location.href='manage_car.php';</script>";
    
}

// ปิดการเชื่อมต่อ
mysqli_close($connect);
exit();
?>
