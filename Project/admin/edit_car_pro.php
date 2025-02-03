<?php
session_start();
require('../config/dbconnect.php');

$car_id = $_GET['car_id'];

//******************************รูปภาพ****************************************************/
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    // รับข้อมูลไฟล์
    $name = "car_" . $car_id; // ใช้ car_id เพื่อสร้างชื่อไฟล์เฉพาะ
    $file = $_FILES['file'];
    $file_name = $name . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    // ตรวจสอบประเภทไฟล์
    $fileType = $file['type'];
    if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif'])) {
        // ถ้าไม่ใช่ไฟล์ภาพ ส่งกลับไปที่หน้า personal
        header("Location: manage_car.php?status=1"); // status=1 แสดงว่าไฟล์ไม่ใช่ภาพ
        exit();
    }

    // รับที่อยู่ไฟล์ชั่วคราว
    $tempPath = $file['tmp_name'];

    // ตั้งที่อยู่ปลายทางที่ไฟล์จะถูกบันทึก
    $go_to_folder = '../car_image/' . $file_name;

    // ตรวจสอบแล้วลบไฟล์เก่า
    $type_img = [".jpg", ".jpeg", ".png", ".gif"];
    foreach ($type_img as $ext) {
        $delete_oldpic = '../car_image/' . $name . $ext;
        if (file_exists($delete_oldpic)) {
            unlink($delete_oldpic); // ลบไฟล์เก่า
        }
    }

    // ย้ายไฟล์ไปยังโฟลเดอร์ที่ต้องการ
    if (move_uploaded_file($tempPath, $go_to_folder)) {
        // อัปเดตฐานข้อมูล
        $sql = "UPDATE cars 
                SET car_pic = '$file_name'
                WHERE car_id = '$car_id'";
        if (mysqli_query($connect, $sql)) {
            // Redirect with success status
            header("Location: manage_car.php?status=2"); // status=2 แสดงว่าอัปเดตสำเร็จ
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการอัปเดตฐานข้อมูล: " . mysqli_error($connect);
        }
    } else {
        echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
    }
}

mysqli_close($connect); // ปิดการเชื่อมต่อฐานข้อมูล
exit();
?>
