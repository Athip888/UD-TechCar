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
    require("header.php");
    require("../function/BuddhistYear.php");
    if (isset($_GET['request_id'])) {
        $request_id = $_GET['request_id']; // รับค่า request_id จาก URL
        $request_id = mysqli_real_escape_string($connect, $request_id); // ป้องกัน SQL Injection

        // คิวรีข้อมูลของ request_id ที่ได้รับมา
        $sql = "SELECT 
    users.user_id,
    users.signature,
    users.fullname,
    users.department, 
    users.position,
    requests.request_id, 
    requests.user_id,
    requests.passengers, 
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
    admins.fullname AS admin_name,
    admins.signature AS admin_image,
    cars.plate_number,
    cars.province,
    cars.car_type
FROM requests 
JOIN users ON requests.user_id = users.user_id 
LEFT JOIN drivers ON requests.driver_id = drivers.driver_id 
LEFT JOIN cars ON requests.car_id = cars.car_id 
LEFT JOIN users AS admins ON requests.admin_id = admins.user_id 
WHERE requests.request_id = '$request_id'";

        $note = "SELECT * FROM `notes`
WHERE `request_id` = '$request_id'
ORDER BY `created_at` DESC
LIMIT 1";

        $resultnote = mysqli_query($connect, $note);
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); // ดึงข้อมูลแถวเดียว
            $check_start = $row["departure_date"] . " " . $row["departure_time"];
            $check_end = $row["return_date"] . " " . $row["return_time"];
            $cardetail = $row["car_type"] . " " . $row["plate_number"] . " " . $row["province"];
        } else {
            echo "ไม่พบ";
            exit(); // ออกจากสคริปต์หากไม่พบข้อมูล
        }
    } else {
        echo "ไม่มี request_id";
        exit();
    }
    $formatted_datetime = ''; // กำหนดค่าตัวแปร
    if (mysqli_num_rows($resultnote) > 0) {
        $row1 = mysqli_fetch_assoc($resultnote); // ดึงข้อมูลแถวเดียว  
        $formatted_datetime = str_replace(" ", " เวลา ", $row1["created_at"]);
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
                            <td><?php echo $row["admin_name"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">พนักงานขับรถ</th>
                            <td><?php echo $row["driver_name"]; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">รถยนต์</th>
                            <td><?php echo $cardetail; ?></td>
                        </tr>
                        <!--
                    <tr>
                        <th scope="row">โทรศัพท์ติดต่อ</th>
                        <td>081-154-5246</td>
                    </tr>
                    -->
                        <tr>
                            <th scope="row">เพิ่มเติม</th>
                            <td><?php echo isset($row1["note_text"]) ? $row1["note_text"] : ""; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php if ($row["status"] != "ปฏิเสธ") { ?>
                    <form action="../print_form.php" method="POST">
                        <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
                        <input type="hidden" name="fullname" value="<?php echo $row['fullname']; ?>">
                        <input type="hidden" name="user_signature" value="<?php echo $row['signature']; ?>">
                        <input type="hidden" name="admin_signature" value="<?php echo $row['admin_image']; ?>">
                        <input type="hidden" name="department" value="<?php echo $row['department']; ?>">
                        <input type="hidden" name="position" value="<?php echo $row['position']; ?>">
                        <input type="hidden" name="destination" value="<?php echo $row['destination']; ?>">
                        <input type="hidden" name="province" value="<?php echo $row['province']; ?>">
                        <input type="hidden" name="purpose" value="<?php echo $row['purpose']; ?>">
                        <input type="hidden" name="departure_date" value="<?php echo $row['departure_date']; ?>">
                        <input type="hidden" name="departure_time" value="<?php echo $row['departure_time']; ?>">
                        <input type="hidden" name="return_date" value="<?php echo $row['return_date']; ?>">
                        <input type="hidden" name="return_time" value="<?php echo $row['return_time']; ?>">
                        <input type="hidden" name="passengers" value="<?php echo $row['passengers']; ?>">
                        <input type="hidden" name="admin_name" value="<?php echo $row['admin_name']; ?>">
                        <input type="hidden" name="driver_name" value="<?php echo $row['driver_name']; ?>">
                        <input type="hidden" name="cardetail" value="<?php echo $cardetail; ?>">
                        <input type="hidden" name="note_text" value="<?php echo isset($row1['note_text']) ? $row1['note_text'] : ''; ?>">
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-secondary">พิมพ์</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
            <?php if ($row["status"] == "อนุมัติ") { ?>
                <div class="card-footer text-end bg-light">
                    <span class="badge bg-success text-white">อนุมัติแล้ว</span>
                    <span><?php echo $formatted_datetime; ?></span>
                </div>
            <?php } elseif ($row["status"] == "ปฏิเสธ") { ?>
                <div class="card-footer text-end bg-light">
                    <span class="badge bg-danger text-white">ปฏิเสธ</span>
                    <span><?php echo $formatted_datetime; ?></span>
                </div>
            <?php } ?>

        </div>
    </div>

</body>

</html>