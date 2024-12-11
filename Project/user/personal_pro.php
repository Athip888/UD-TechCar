<?php
/*if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    // รับข้อมูลไฟล์
    $name = "MacJack";
    $file = $_FILES['file'];
    $file_name = $name . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    //print_r($file_name); ปริ้นชื่อไฟล์

    $fileType = $file['type'];
    if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif'])) {
        // ถ้าไม่ใช่ไฟล์ภาพ ส่งกลับไปที่หน้า index
        header("Location: index.php?status=2");  // status=2 แสดงว่าไฟล์ไม่ใช่ภาพ
        exit();
    }

    // รับที่อยู่ไฟล์ชั่วคราว
    $tempPath = $file['tmp_name'];

    // ตั้งที่อยู่ปลายทางที่ไฟล์จะถูกบันทึก
    $go_to_folder = 'img/' . $file_name;
    // $directory = 'img/' . $name;

    $type_img = [".jpg",".jpeg",".png",".gif"];
    for ($i=0; $i <count($type_img) ; $i++) { 
        $delete_oldpic ='img/'. $name.$type_img[$i];
        if (file_exists($delete_oldpic)) {
            unlink($delete_oldpic);  // ลบไฟล์เก่า
        }
    }
    //ย้ายไฟล์ไปยังโฟลเดอร์ที่ต้องการ
    if (move_uploaded_file($tempPath, $go_to_folder)) {
            header("Location: index.php?status=3");
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
            exit();
        }
    } else {
        header("Location: index.php?status=1");
        exit();
}
