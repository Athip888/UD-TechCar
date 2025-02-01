<?php
require('../config/dbconnect.php');

// ตรวจสอบว่าได้รับ driver_id จาก URL หรือไม่
if (isset($_GET['driver_id']) && !empty($_GET['driver_id'])) {
    $driver_id = $_GET['driver_id'];

    // ดึงข้อมูลพนักงานขับรถจากฐานข้อมูล
    $sql = "SELECT * FROM drivers WHERE driver_id = ?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $driver_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $driver = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        // หากไม่มีข้อมูลพนักงานขับรถ ให้เปลี่ยนเส้นทางกลับไปยังหน้า manage_driver.php
        if (!$driver) {
            header("Location: manage_driver.php?error=not_found");
            exit;
        }
    } else {
        header("Location: manage_driver.php?error=invalid_query");
        exit;
    }
} else {
    header("Location: manage_driver.php?error=missing_id");
    exit;
}

// อัปเดตข้อมูลพนักงานขับรถเมื่อส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $work_date = $_POST['work_date'] ?? '';

    $sql = "UPDATE drivers SET name = ?, phone_number = ?, work_date = ? WHERE driver_id = ?";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssi', $name, $phone_number, $work_date, $driver_id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
            header("Location: manage_driver.php?success=updated");
            exit;
        } else {
            $error_message = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
        }
    } else {
        $error_message = "คำสั่ง SQL ไม่ถูกต้อง";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงานขับรถ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mb-4">แก้ไขข้อมูลพนักงานขับรถ</h2>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"> <?= htmlspecialchars($error_message) ?> </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อ-สกุล</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($driver['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">เบอร์โทร</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= htmlspecialchars($driver['phone_number']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="work_date" class="form-label">วันที่เริ่มทำงาน</label>
            <input type="date" class="form-control" id="work_date" name="work_date" value="<?= htmlspecialchars($driver['work_date']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
        <a href="manage_driver.php" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
</body>
</html>
