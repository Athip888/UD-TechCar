<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("คำร้องของคุณถูกยกเลิกเรียบร้อยแล้ว.");</script>';
    } elseif ($_GET['status'] == 2) {
        echo '<script>alert("คำร้องของคุณได้รับการอนุมัติแล้ว หากต้องการยกเลิกคำร้อง กรุณาติดต่อผู้ดูแลระบบ.");</script>';
    } elseif ($_GET['status'] == 3) {
         echo '<script>alert("คำร้องของคุณถูกปฏิเสธแล้ว ไม่สามารถยกเลิกได้");</script>';
     }
    echo '<script>window.location.href = "status.php";</script>'; // รีไดเรกต์กลับไปที่ personal.php โดยไม่รวมพารามิเตอร์ 'status'
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
        WHERE requests.status = 'รออนุมัติ' OR requests.status = 'อนุมัติ' OR requests.status = 'ปฏิเสธ'
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
    <div class="container py-5">
        <div class="form-container shadow-sm p-4 rounded bg-light">
            <h3 class="text-center mb-4">รายการ</h3>
            <form id="searchForm" action="status_search.php" method="GET">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label for="startDate" class="form-label">วันที่เริ่มต้น</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" lang="th">
                    </div>
                    <div class="col-md-4">
                        <label for="endDate" class="form-label">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" lang="th">
                    </div>
                    <div class="col-md-4">
                        <label for="searchQuery" class="form-label">ค้นหา</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="ป้อนคำค้นหา">
                            <button type="button" class="btn btn-primary" id="searchBtn">ค้นหา</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-container shadow-sm p-4 mt-5 rounded bg-light">
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
                            } else {
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11' class='text-center'>ยังไม่มีข้อมูล</td></tr>";
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