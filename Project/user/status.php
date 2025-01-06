<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("คำร้องของคุณถูกยกเลิกเรียบร้อยแล้ว.");</script>';
    } elseif ($_GET['status'] == 2) {
        echo '<script>alert("คำร้องของคุณได้รับการอนุมัติแล้ว หากต้องการยกเลิกคำร้อง กรุณาติดต่อผู้ดูแลระบบ.");</script>';
    } //elseif ($_GET['status'] == 3) {
    //     echo '<script>alert("โปรดอัพโหลดไฟล์ png");</script>';
    // }
    // รีไดเรกต์กลับไปที่ personal.php โดยไม่รวมพารามิเตอร์ 'status'
    echo '<script>window.location.href = "status.php";</script>';
}
require('header.php');
$user_id = $_SESSION['user_id'];
// คำสั่ง SQL ที่รวมตาราง requests กับ users เพื่อดึง fullname
$sql = "SELECT requests.request_id, 
                requests.user_id,
                users.fullname,
                users.position,
                requests.destination,
                requests.province,
                requests.departure_date,
                requests.departure_time,
                requests.return_date,
                requests.return_time,
                requests.status
        FROM requests 
        JOIN users ON requests.user_id = users.user_id
        WHERE requests.status = 'รออนุมัติ' OR requests.status = 'อนุมัติ'
        ORDER BY requests.request_id DESC;";

$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>ผลลัพธ์การค้นหา</title>
</head>

<body>
    <div class="container mt-5">
        <div class="table-container shadow-sm">
            <h4 class="mb-4">ผลลัพธ์การค้นหา</h4>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>รหัสคำขอ</th>
                        <th>ชื่อผู้ขอ</th>
                        <th>ตำแหน่ง</th>
                        <th>ปลายทาง</th>
                        <th>จังหวัด</th>
                        <th>วันที่ออกเดินทาง</th>
                        <th>เวลาที่ออกเดินทาง</th>
                        <th>วันที่กลับ</th>
                        <th>เวลาที่กลับ</th>
                        <th>สถานะ</th>
                        <th>ยกเลิกคำร้อง</th>
                    </tr>
                </thead>
                <tbody id="resultTable">
                    <?php
                    // ตรวจสอบว่ามีข้อมูลหรือไม่
                    if (mysqli_num_rows($result) > 0) {
                        // วนลูปแสดงข้อมูล
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['request_id'] . "</td>";
                            echo "<td>" . $row['fullname'] . "</td>";
                            echo "<td>" . $row['position'] . "</td>";
                            echo "<td>" . $row['destination'] . "</td>";
                            echo "<td>" . $row['province'] . "</td>";
                            echo "<td>" . $row['departure_date'] . "</td>";
                            echo "<td>" . $row['departure_time'] . "</td>";
                            echo "<td>" . $row['return_date'] . "</td>";
                            echo "<td>" . $row['return_time'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            if ($user_id == $row['user_id']) {
                                echo "<td><a href='#' class='btn btn-danger' onclick='return confirmCancel(\"" . $row['request_id'] . "\")'>ยกเลิก</a></td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>ยังไม่มีข้อมูล</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connect);
?>
<script src="status_script.js"></script>