<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงานขับรถ</title>
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
        }
        .input-box {
            display: flex;
            justify-content: space-between;
        }
        .input-box input {
            flex-grow: 1;
        }
        .btn-lg,
        .btn-lg-custom {
            font-size: 1rem; /* ปรับขนาดตัวอักษร */
        }
    </style>
</head>

<body>

<?php
require("headadmin.php");

// SQL สำหรับดึงข้อมูลพนักงานขับรถ
$sql = "SELECT * FROM drivers";
$result = mysqli_query($connect, $sql);
?>

<div class="container my-4">
    <h2 class="mb-4">ข้อมูลพนักงานขับรถ</h2>

    <div class="d-flex justify-content-between mb-3">
        <div class="input-box w-50">
            <input type="text" class="form-control" placeholder="ค้นหา...">
            <button class="btn btn-primary btn-lg-custom ">ค้นหา</button> <!-- ปรับขนาดตัวอักษรในปุ่มค้นหา -->
        </div>
        <button class="btn btn-success" onclick="window.location.href='add_driver.php';">
            <i class="fas fa-plus"></i> เพิ่มพนักงานขับรถ
        </button>
    </div>
    
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>รหัส</th>
                <th>ชื่อ-สกุล</th>
                <th>เบอร์โทร</th>
                <th>วันที่เริ่มทำงาน</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // แสดงข้อมูลพนักงานขับรถในตาราง
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['driver_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['work_date']) . "</td>";
                    echo "<td>
                            <a href='edit_driver.php?driver_id=" . urlencode($row['driver_id']) . "' class='btn btn-warning btn-sm'>แก้ไข</a>
                    <a href='delete_driver.php?driver_id=" . urlencode($row['driver_id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"คุณต้องการลบ " . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . " ใช่หรือไม่?\");'>ลบ</a>
                  </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>ไม่มีข้อมูล</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
