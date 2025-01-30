<?php
require('../config/dbconnect.php');

// ตรวจสอบว่ามี request_id ถูกส่งมาหรือไม่
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id']; // รับค่า request_id จาก URL
    $request_id = mysqli_real_escape_string($connect, $request_id); // ป้องกัน SQL Injection

    // คิวรีข้อมูลของ request_id ที่ได้รับมา
    $sql = "SELECT requests.request_id, 
    requests.user_id, 
    users.department, 
    users.position, 
    requests.destination, 
    requests.province, 
    requests.departure_date, 
    requests.departure_time, 
    requests.return_date, 
    requests.return_time, 
    requests.status, 
    requests.driver_id, 
    drivers.name AS driver_name, 
    requests.car_id, 
    cars.plate_number, 
    requests.purpose, 
    requests.request_date FROM requests JOIN users ON requests.user_id = users.user_id 
    LEFT JOIN drivers ON requests.driver_id = drivers.driver_id 
    LEFT JOIN cars ON requests.car_id = cars.car_id WHERE requests.request_id = '$request_id'";

    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // ดึงข้อมูลแถวเดียว
    } else {
        echo "ไม่พบข้อมูล";
        exit(); // ออกจากสคริปต์หากไม่พบข้อมูล
    }
} else {
    echo "ไม่มี request_id";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสถานะการจอง</title>
</head>
<body>
    <h2>แก้ไขสถานะการจอง</h2>
    <p>เลขที่ใบจอง: <?php echo htmlspecialchars($row['request_id']); ?></p>
    <p>ทะเบียนรถ: <?php echo htmlspecialchars($row['car_id']); ?></p>
    <p>วันที่ใช้รถ: <?php echo htmlspecialchars($row['departure_date']) . " (" . htmlspecialchars($row['departure_time'])." ถึงวันที่ ".htmlspecialchars($row['return_date']) . " (" . htmlspecialchars($row['return_time']) . ")"; ?></p>
    <p>แผนกที่ขอใช้: <?php echo htmlspecialchars($row['department']); ?></p>
    <p>จองใช้รถเพื่อ: <?php echo htmlspecialchars($row['purpose']); ?></p>
    <p>สถานะปัจจุบัน: <?php echo htmlspecialchars($row['status']); ?></p>

    <!-- ฟอร์มอัปเดตสถานะ -->
    <form action="update_status.php" method="post">
        <input type="hidden" name="request_id" value="<?php echo htmlspecialchars($row['request_id']); ?>">
        
        <label for="status">เปลี่ยนสถานะ:</label>
        <select name="status" id="status">
            <option value="รออนุมัติ">รออนุมัติ</option>
            <option value="อนุมัติ">อนุมัติ</option>
            <option value="ปฏิเสธ">ปฏิเสธ</option>
        </select>

        <button type="submit">อัปเดต</button>
    </form>
</body>
</html>
