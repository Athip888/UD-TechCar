<?php
require("headadmin.php");
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("โปรดอัพโหลดโปรไฟล์เป็นไฟล์ เช่น jpg,jpeg,png");</script>';
    } elseif ($_GET['status'] == 2) {
        echo '<script>alert("แก้ไขข้อมูลเสร็จสิ้น");</script>';
    }elseif ($_GET['status'] == 3) {
        echo '<script>alert("โปรดอัพโหลดไฟล์ png");</script>';
    }

    // รีไดเรกต์กลับไปที่ personal.php โดยไม่รวมพารามิเตอร์ 'status'
    echo '<script>window.location.href = "manage_car.php";</script>';
}
// ตรวจสอบว่า car_id ถูกส่งมาหรือไม่
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    // ดึงข้อมูลยานพาหนะจากฐานข้อมูล
    $sql = "SELECT * FROM cars WHERE car_id = '$car_id'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $image_car_path = "../car_image/" . $row['car_pic'];
    } else {
        echo "<script>alert('ไม่พบข้อมูลยานพาหนะ'); window.location.href='manage_car.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location.href='manage_car.php';</script>";
    exit();
}

// เมื่อฟอร์มถูกส่งมา
// เมื่อฟอร์มถูกส่งมา
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากฟอร์ม
    $licensePlate = $_POST['licensePlate'];
    $province = $_POST['province'];
    $brand = $_POST['brand'];
    $seats = $_POST['seats'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $car_type = $_POST['car_type'];
    $status = $_POST['status'];  // รับค่าจากฟอร์มสำหรับสถานะ

    // ตรวจสอบข้อมูลที่กรอก
    if (empty($licensePlate) || empty($province) || empty($brand) || empty($seats) || empty($model) || empty($color) || empty($status)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
    } else {
        // SQL สำหรับอัปเดตข้อมูล
        $sql = "UPDATE cars SET plate_number = '$licensePlate', province = '$province', brand = '$brand', seats = '$seats', model = '$model', color = '$color', car_type = '$car_type', status = '$status' WHERE car_id = '$car_id'";

        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('อัปเดตข้อมูลยานพาหนะสำเร็จ'); window.location.href='manage_car.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลยานพาหนะ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>

    <div class="container py-5 mt-5" style="background-color: white;">
        <h1 class="text-center mb-4">แก้ไขข้อมูลยานพาหนะ</h1>
        <form action="edit_car.php?car_id=<?php echo $car_id; ?>" method="POST">
            <div class="mb-3">
                <label for="licensePlate" class="form-label">ทะเบียนรถ</label>
                <input type="text" class="form-control" id="licensePlate" name="licensePlate" value="<?php echo $row['plate_number']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="province" class="form-label">จังหวัด</label>
                <input type="text" class="form-control" id="province" name="province" value="<?php echo $row['province']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">ยี่ห้อ</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $row['brand']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="seats" class="form-label">ที่นั่ง</label>
                <input type="number" class="form-control" id="seats" name="seats" value="<?php echo $row['seats']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">รุ่น</label>
                <input type="text" class="form-control" id="model" name="model" value="<?php echo $row['model']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">สี</label>
                <input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="car_type" class="form-label">ประเภทรถ</label>
                <input type="text" class="form-control" id="car_type" name="car_type" value="<?php echo $row['car_type']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">สถานะของรถ</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="ใช้ได้ปกติ" <?php echo ($row['status'] == 'ใช้ได้ปกติ') ? 'selected' : ''; ?>>ใช้ได้ปกติ</option>
                    <option value="บำรุงรักษา" <?php echo ($row['status'] == 'บำรุงรักษา') ? 'selected' : ''; ?>>บำรุงรักษา</option>
                    <option value="ยกเลิกการใช้งาน" <?php echo ($row['status'] == 'ยกเลิกการใช้งาน') ? 'selected' : ''; ?>>ยกเลิกการใช้งาน</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">อัปเดตข้อมูล</button>
                <a href="manage_car.php" class="btn btn-secondary">กลับ</a>
            </div>
        </form>
        <h1 class="text-center mb-4" style="margin-top: 30px;">อัพโหลดรูปภาพยานพาหนะ</h1>
        <form action="edit_car_pro.php?car_id=<?php echo $car_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-section text-center me-3">
                <h4 class="mb-3">รูปภาพยานพาหนะ</h4>
                <div class="car-img-container mb-3">
                    <img src="<?php echo $image_car_path; ?>" alt="Car Image" id="carImage" style="max-width: 300px;">
                </div>
                <input type="file" class="form-control" id="carImageInput" name="file" onchange="previewImage('carImage', 'carImageInput')">
            </div>
            <div class="text-center" style="margin-top: 20px;">
                <button type="submit" class="btn btn-success" >อัปเดตข้อมูล</button>
                <a href="manage_car.php" class="btn btn-secondary">กลับ</a>
            </div>
        </form>
        <script>
            function previewImage(imgId, inputId) {
                const file = document.getElementById(inputId).files[0];
                const reader = new FileReader();
                reader.onloadend = function() {
                    document.getElementById(imgId).src = reader.result;
                }
                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>


</body>

</html>

<?php
// ปิดการเชื่อมต่อ
mysqli_close($connect);
?>