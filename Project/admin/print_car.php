<?php
require("headadmin.php");
$sql = "SELECT 
users.fullname,
requests.destination, 
requests.province,
requests.departure_date, 
requests.departure_time, 
requests.return_date, 
requests.return_time, 
requests.status, 
requests.driver_id,
requests.car_id,
requests.purpose, 
requests.request_date, 
requests.admin_id,   
drivers.name AS driver_name, 
admins.signature AS admin_image,
cars.plate_number,
cars.province,
cars.car_type
FROM requests 
JOIN users ON requests.user_id = users.user_id 
LEFT JOIN drivers ON requests.driver_id = drivers.driver_id 
LEFT JOIN cars ON requests.car_id = cars.car_id 
LEFT JOIN users AS admins ON requests.admin_id = admins.user_id 
WHERE requests.status = 'อนุมัติ'";
$result = mysqli_query($connect, $sql);
$user_id = $_SESSION['user_id']; // ตัวแปรนี้จะต้องมีค่าจากการล็อกอินของผู้ใช้

$sql1 = "SELECT * FROM `users` WHERE `user_id` ='$user_id';";
$result1 = mysqli_query($connect, $sql1);
mysqli_num_rows($result1);
$row1 = mysqli_fetch_assoc($result1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .align-right {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
            /* ปรับถ้าจำเป็น */
        }

        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 1cm;
            }

            header,
            footer {
                display: none !important;
            }

            .align-right {
                display: flex;
                justify-content: flex-end;
                margin-top: 10px;
            }
        }
    </style>
    <script>
        function printTable() {
            var printContents = document.getElementById("tableContainer").outerHTML;
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write('<html><head><title>พิมพ์รายการ</title>');
            newWindow.document.write('<link rel="stylesheet" href="../css/bootstrap.css">');
            newWindow.document.write('<style>@media print { @page { margin: 0; } body { margin: 1cm; } header, footer { display: none !important; } }</style>');
            newWindow.document.write('</head><body>');
            newWindow.document.write('<h3 class="text-center">รายการผู้ใช้งาน</h3>');
            newWindow.document.write(printContents);
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.print();
        }
    </script>
</head>

<body>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            max-width: 900px;
        }

        .table-container {
            margin-top: 30px;
        }
    </style>

    <div class="container py-5">
        <div class="form-container shadow-sm">
            <h3 class="text-center mb-4">รายการผู้ใช้งาน</h3>
            <button class="btn btn-primary mb-3" onclick="printTable()">พิมพ์</button>
            <div id="tableContainer" class="table-container shadow-sm" style="position: relative; padding-bottom: 50px;">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>วันออกเดินทาง</th>
                <th>เวลาออกเดินทาง</th>
                <th>ผู้ขอใช้</th>
                <th>สถานที่</th>
                <th>วันกลับ</th>
                <th>เวลากลับ</th>
                <th>พนักงานขับรถ</th>
                <th>รถยนต์</th>
            </tr>
        </thead>
        <tbody id="resultTable">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cardetail = $row["car_type"] . " " . $row["plate_number"] . " " . $row["province"];
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['departure_date'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['departure_time'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['fullname'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['destination'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['return_date'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['return_time'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['driver_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($cardetail, ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>ยังไม่มีข้อมูล</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- เพิ่มข้อความผู้บันทึกและตำแหน่ง -->
    <div style="position: absolute; bottom: 10px; right: 10px; z-index: 10;">
        <?php
        echo "ผู้บันทึก " . $row1['fullname'] . "<br>";
        echo "ตำแหน่ง " . $row1['position'];
        ?>
    </div>
</div>

</div>

        </div>

    </div>
</body>

</html>