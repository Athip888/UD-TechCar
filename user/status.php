
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <title>ผลลัพธ์การค้นหา</title>
    <style>
  .sidebar {
  width: 250px;
  position: fixed;
  left: -250px;
  top: 0;
  height: 100%;
  transition: left 0.3s ease;
  background-color: #f8f9fa; /* สีพื้นหลังของเมนู */
  z-index: 2; /* ให้เมนูอยู่ด้านบน */
}

.sidebar.open {
  left: 0;
}

.main-content {
  margin-left: 0;
  transition: margin-left 0.3s ease;
}

.main-content.shift {
  margin-left: 250px; /* ขยับเนื้อหาไปทางขวาเมื่อเมนูเปิด */
}

#searchQuery {
  position: relative;
  z-index: 1; /* ช่องค้นหาเริ่มต้นอยู่ด้านบน */
}

.sidebar.open + .main-content #searchQuery {
  z-index: -1; /* ช่องค้นหาถูกทับเมื่อเมนูเปิด */
}

.form-container,
    .table-container {
        width: 100%; /* ขยายความกว้างให้ครอบคลุมพื้นที่ */
        max-width: 1300px; /* กำหนดขนาดสูงสุด */
        margin: 0 auto; /* จัดให้อยู่กึ่งกลาง */
        padding: 2rem; /* เพิ่ม padding ให้ดูมีพื้นที่ */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* เพิ่มเงาให้องค์ประกอบโดดเด่น */
        border-radius: 8px; /* เพิ่มมุมโค้ง */
    }
  



</style>
</head>

<body>

<?php

 require('header.php');

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
$search_query = isset($_GET['status_search']) ? $_GET['status_search'] : '';
$user_id = $_SESSION['user_id'];
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
        WHERE (requests.status = 'รออนุมัติ' OR requests.status = 'อนุมัติ' OR requests.status = 'ปฏิเสธ')
        AND (requests.request_id LIKE '%$search_query%' 
        OR users.fullname LIKE '%$search_query%'
        OR users.position LIKE '%$search_query%'
        OR requests.destination LIKE '%$search_query%' 
        OR requests.province LIKE '%$search_query%')
        ORDER BY requests.request_id DESC;";
$result = mysqli_query($connect, $sql);
?>
   
    <div class="container py-5">
        <div class="form-container shadow-sm p-4 rounded bg-white">
            <h3 class="text-center mb-4">รายการ</h3>
            <form id="searchForm" action="status.php" method="GET">
                <div class="row g-3 align-items-center">
                    <div class="col-12"> <!-- Use full-width column -->
                        <label for="searchQuery" class="form-label">ค้นหา</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchQuery" name="status_search" placeholder="ป้อนคำค้นหา">
                            <button type="submit" class="btn btn-primary" id="searchBtn">ค้นหา</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-container shadow-sm p-4 mt-5 rounded bg-white ">
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
        <th>รายละเอียด,พิมพ์และยกเลิกคำร้อง</th>
    </tr>
</thead>
<tbody id="resultTable">
    <?php
    if (mysqli_num_rows($result) > 0) {
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

            echo "<td>";
            echo "<div class='d-flex gap-2'>";
            echo "<a href='request_details.php?request_id={$row['request_id']}' class='btn btn-info btn-sm'>ดูรายละเอียด</a>";

            if ($user_id == $row['user_id']) {
                echo "<a href='#' class='btn btn-danger btn-sm' onclick='return confirmCancel(\"" . $row['request_id'] . "\")'>ยกเลิก</a>";
            }

            echo "</div>"; // ปิด div ของ d-flex
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='12' class='text-center'>ยังไม่มีข้อมูล</td></tr>";
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