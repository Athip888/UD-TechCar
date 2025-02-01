<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .image-container {
            text-align: left;
        }

        .image-container img {
            max-width: 640px;
            height: auto;
            background-color: #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php
    require("headadmin.php");
    require("../function/BuddhistYear.php");
    $adminid = $_SESSION["user_id"];
    if (isset($_GET['request_id'])) {
        $request_id = $_GET['request_id']; // รับค่า request_id จาก URL
        $request_id = mysqli_real_escape_string($connect, $request_id); // ป้องกัน SQL Injection

        // คิวรีข้อมูลของ request_id ที่ได้รับมา
        $sql = "SELECT 
    requests.request_id, 
    requests.user_id,
    requests.passengers, 
    users.fullname,
    users.department, 
    users.position,
    requests.destination, 
    requests.province,
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
    requests.request_date, 
    requests.admin_id, 
    admins.fullname AS admin_name, 
    admins.role AS admin_role 
FROM requests 
JOIN users ON requests.user_id = users.user_id 
LEFT JOIN drivers ON requests.driver_id = drivers.driver_id 
LEFT JOIN cars ON requests.car_id = cars.car_id 
LEFT JOIN users AS admins ON requests.admin_id = admins.user_id 
WHERE requests.request_id = '$request_id'";


        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); // ดึงข้อมูลแถวเดียว
            $check_start = $row["departure_date"] . " " . $row["departure_time"];
            $check_end = $row["return_date"] . " " . $row["return_time"];
        } else {
            echo "ไม่พบข้อมูล";
            exit(); // ออกจากสคริปต์หากไม่พบข้อมูล
        }
    } else {
        echo "ไม่มี request_id";
        exit();
    }
    ?>

    <div class="container my-5">
        <div class="bg-white">
            <div class="card-header bg-light">
                <h2 class="mb-0">รายละเอียดการจอง</h2>
            </div>
            <div class="card-body">
                <table class="table  ">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 30%;">เลขที่ใบจอง</th>
                            <td><?php echo $row["request_id"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">ผู้จองรถ</th>
                            <td><?php echo $row["fullname"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">แผนก</th>
                            <td><?php echo $row["department"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">ตำแหน่ง</th>
                            <td><?php echo $row["position"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">สถานที่</th>
                            <td><?php echo $row["destination"] . " จังหวัด" . $row["province"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">วัตถุประสงค์</th>
                            <td><?php echo $row["purpose"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">วันที่ออกเดินทางตั้งแต่</th>
                            <td><?php echo "วันที่" . convertDateToBuddhist($row["departure_date"]) . " เวลา" . $row["departure_time"] . " ถึงวันที่" . convertDateToBuddhist($row["return_date"]) . " เวลา" . $row["return_time"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">จำนวนผู้ออกเดินทาง</th>
                            <td><?php echo $row["passengers"] . "คน"; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">ผู้ควบคุมรถ</th>
                            <td><?php echo $check_start; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">พนักงานขับรถ</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th scope="row">รถยนต์</th>
                            <td>-</td>
                        </tr>
                        <!--
                    <tr>
                        <th scope="row">โทรศัพท์ติดต่อ</th>
                        <td>081-154-5246</td>
                    </tr>
                    -->
                        <tr>
                            <th scope="row">เพิ่มเติม</th>
                            <td>-</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end bg-light">
                <span class="badge bg-info text-dark">เปิดอ่านแล้ว</span>
                <span>08/12/2567 เวลา 14:47:59</span>
            </div>
        </div>
    </div>
    <?php
    $sql2 = "
    SELECT c.car_id, c.plate_number, c.brand, c.model
    FROM cars c
    WHERE c.status = 'ใช้ได้ปกติ'
    AND c.car_id NOT IN (
        SELECT r.car_id
        FROM requests r
        WHERE r.status = 'อนุมัติ'
        AND (
            ('$check_start' BETWEEN CONCAT(r.departure_date, ' ', r.departure_time) AND CONCAT(r.return_date, ' ', r.return_time))
            OR ('$check_end' BETWEEN CONCAT(r.departure_date, ' ', r.departure_time) AND CONCAT(r.return_date, ' ', r.return_time))
            OR (CONCAT(r.departure_date, ' ', r.departure_time) BETWEEN '$check_start' AND '$check_end')
        )
    )";
    $sql3 = "
    SELECT driver_id, name
    FROM drivers
    WHERE driver_id NOT IN (
        SELECT driver_id
        FROM requests
        WHERE status = 'อนุมัติ'
        AND (
            '$check_start' BETWEEN CONCAT(departure_date, ' ', departure_time) AND CONCAT(return_date, ' ', return_time)
            OR '$check_end' BETWEEN CONCAT(departure_date, ' ', departure_time) AND CONCAT(return_date, ' ', return_time)
        )
    );
";
    $result2 = mysqli_query($connect, $sql2);
    $result3 = mysqli_query($connect, $sql3);
    ?>

    <div class="container my-5">
        <div class="bg-white">
            <div class="card-header">
                <h3>ผลการอนุมัติ</h3>
            </div>
            <div class="card-body">
                <form action="edit_status_pro.php" method="post">
                    <div class="mb-3">
                        <label for="approvalStatus" class="form-label">การอนุมัติ</label>
                        <select class="form-select" id="approvalStatus">
                            <option value="รออนุมัติ" <?php if ($row["status"] == 'รออนุมัติ') echo 'selected'; ?>>รออนุมัติ</option>
                            <option value="อนุมัติ" <?php if ($row["status"] == 'อนุมัติ') echo 'selected'; ?>>อนุมัติ</option>
                            <option value="ปฏิเสธ" <?php if ($row["status"] == 'ปฏิเสธ') echo 'selected'; ?>>ปฏิเสธ</option>
                        </select>
                    </div>
                    <?php
                    echo '<div class="mb-3">';
                    echo '<label for="car" class="form-label">รถยนต์</label>';
                    echo '<select class="form-select" id="car">';
                    echo '<option value="">ป้อนหรือคลิกเลือกจากรายการ</option>';

                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
                            echo '<option value="' . $row2['car_id'] . '">' . $row2['plate_number'] . ' - ' . $row2['brand'] . ' ' . $row2['model'] . '</option>';
                        }
                    } else {
                        echo '<option value="">ไม่มีรถที่ว่างในช่วงเวลานี้</option>';
                    }
                    echo '</select>';
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo '<label for="driver" class="form-label">พนักงานขับรถ</label>';
                    echo '<select class="form-select" id="driver" name="driver_id">';
                    echo '<option value="">ป้อนหรือคลิกเลือกจากรายการ</option>';

                    // เพิ่มตัวเลือกใน select
                    if ($result3->num_rows > 0) {
                        while ($row3 = $result->fetch_assoc()) {
                            echo '<option value="' . $row3['driver_id'] . '">' . $row3['name'] . '</option>';
                        }
                    } else {
                        echo '<option value="">ไม่พบพนักงานขับรถที่ว่าง</option>';
                    }
                    echo '</select>';
                    echo ' </div>';
                    ?>
                    <div class="mb-3">
                        <label for="notes" class="form-label">หมายเหตุ</label>
                        <textarea class="form-control" id="notes" rows="3"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">บันทึกผลการอนุมัติ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>