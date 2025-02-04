<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>งานรออนุมัติ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .table-custom td {
            vertical-align: middle;
            padding: 6px;
            font-size: 14px;
        }

        .custom-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .status-label {
            color: white;
            background-color: #0d6efd;
            border-radius: 4px;
            padding: 3px 6px;
            font-size: 12px;
        }

        .clickable-row {
            cursor: pointer;
        }

        .clickable-row:hover {
            background-color: #f1f1f1;
        }

        .modal-backdrop.show {
            z-index: 1040;
        }

        .modal {
            z-index: 1050;
        }
    </style>
</head>

<body>
    <?php
    require("headadmin.php");
    require("../function/BuddhistYear.php");

    // รับค่าค้นหาจากฟอร์ม
    $search = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';
    $status_filter = isset($_GET['status']) ? mysqli_real_escape_string($connect, $_GET['status']) : 'ทั้งหมด';
    $from_date = isset($_GET['from_date']) ? mysqli_real_escape_string($connect, $_GET['from_date']) : '';
    $to_date = isset($_GET['to_date']) ? mysqli_real_escape_string($connect, $_GET['to_date']) : '';

    // สร้างคำสั่ง SQL ตามเงื่อนไข
    $sql = "SELECT requests.*,
         users.fullname, 
         cars.car_pic
        FROM requests 
        LEFT JOIN users ON requests.user_id = users.user_id 
        LEFT JOIN cars ON requests.car_id = cars.car_id
        WHERE 1";

    if (!empty($search)) {
        $sql .= " AND (requests.request_id LIKE '%$search%' 
              OR requests.province LIKE '%$search%'  
              OR requests.purpose LIKE '%$search%'
              OR requests.destination LIKE '%$search%'
              OR users.fullname LIKE '%$search%'
              OR users.position LIKE '%$search%'
              OR users.department LIKE '%$search%')";
    }
    if ($status_filter != 'ทั้งหมด') {
        $sql .= " AND requests.status = '$status_filter'";
    }
    if (!empty($from_date)) {
        $sql .= " AND requests.departure_date >= '$from_date'";
    }
    if (!empty($to_date)) {
        $sql .= " AND requests.departure_date <= '$to_date'";
    }
    $sql .= " ORDER BY requests.request_id DESC";


    $result = mysqli_query($connect, $sql);
    ?>

    <div class="container mt-5">
        <div class=" custom-card bg-white">
            <div class="card-body">
                <h5 class="card-title">งานรออนุมัติ</h5>
                <form method="GET" action="">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="status" class="form-label">สถานะ</label>
                            <select class="form-select" id="status" name="status">
                                <option value="ทั้งหมด" <?php if ($status_filter == 'ทั้งหมด') echo 'selected'; ?>>ทั้งหมด</option>
                                <option value="รออนุมัติ" <?php if ($status_filter == 'รออนุมัติ') echo 'selected'; ?>>รออนุมัติ</option>
                                <option value="อนุมัติ" <?php if ($status_filter == 'อนุมัติ') echo 'selected'; ?>>อนุมัติ</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="from-date" class="form-label">จากวันที่</label>
                            <input type="date" class="form-control" id="from-date" name="from_date" value="<?php echo htmlspecialchars($from_date); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="to-date" class="form-label">ถึงวันที่</label>
                            <input type="date" class="form-control" id="to-date" name="to_date" value="<?php echo htmlspecialchars($to_date); ?>">
                        </div>

                        <div class="col-md-3">
                            <label for="search" class="form-label">ค้นหา</label>
                            <div class="d-flex">
                                <input type="search" class="form-control" id="search" name="search" value="<?php echo htmlspecialchars($search); ?>">
                                <button class="btn btn-primary" type="submit">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-custom">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 15%;">รูป</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col" style="width: 15%;">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {  // ตรวจสอบว่ามีข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) {
                                // แก้ไข SQL ให้ถูกต้อง
                                $note_sql = "SELECT * FROM `notes`
                                WHERE `request_id` = '" . $row["request_id"] . "'
                                ORDER BY `created_at` DESC
                                LIMIT 1";

                                $resultnote = mysqli_query($connect, $note_sql);
                                $row1 = mysqli_fetch_assoc($resultnote); // ดึงข้อมูลแถวเดียว

                                if ($row1) {
                                    $formatted_datetime = str_replace(" ", " เวลา ", $row1["created_at"]);
                                } else {
                                    $formatted_datetime = "ยังอนุมัติ"; // กำหนดค่าหากไม่มีข้อมูล
                                }


                                echo "<tr class='clickable-row' onclick=\"window.location.href='edit_status.php?request_id=" . htmlspecialchars($row["request_id"]) . "';\" style='cursor: pointer;'>";

                                // คอลัมน์รูปภาพ
                                echo "<td>";
                                if (!empty($row['car_pic'])) {
                                    echo "<img src='../car_image/" . htmlspecialchars($row['car_pic']) . "' alt='รูปภาพรถ' style='width: 100%; height: 80px; object-fit: cover; border-radius: 4px;'>";
                                } else {
                                    echo "<div style='width: 100%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;'>ไม่มีภาพ(ยังไม่ได้อนุมัติ)</div>";
                                }
                                echo "</td>";

                                // คอลัมน์ข้อมูล
                                echo "<td>";
                                echo "<p style='margin: 0; font-size: 13px;'>เลขที่เอกสาร: " . htmlspecialchars($row["request_id"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>ชื่อผู้ขอ: " . htmlspecialchars($row["fullname"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>วันที่ใช้รถ: " . htmlspecialchars($row["departure_date"]) . " (" . htmlspecialchars($row["departure_time"]) . ") ถึง " . htmlspecialchars($row["return_date"]) . " (" . htmlspecialchars($row["return_time"]) . ")</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>จองใช้รถเพื่อ: " . htmlspecialchars($row["purpose"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>สถานะ: " . htmlspecialchars($row["status"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>วันที่ขอ: " . htmlspecialchars($row["request_date"]) . "</p>";


                                // คอลัมน์สถานะ
                                echo "<td>";
                                if ($row["status"] == "อนุมัติ") {
                                    echo "<span class='status-label' style='background-color: #28a745;'>อนุมัติ</span>";
                                } elseif ($row["status"] == "ปฏิเสธ") {
                                    echo "<span class='status-label' style='background-color: #dc3545;'>ปฏิเสธ</span>";
                                } else {
                                    echo "<span class='status-label' style='background-color: #ffc107;'>รออนุมัติ</span>";
                                }
                                echo "<p class='text-muted mt-2' style='font-size: 12px;'>" . htmlspecialchars($formatted_datetime) . "</p>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-center'>ไม่มีข้อมูล</td></tr>";
                        }

                        // ปิดการเชื่อมต่อฐานข้อมูล
                        mysqli_close($connect);
                        ?>

                    </tbody>

                </table>
                <div class="text-end">
                    <p style="font-size: 14px;">ค่าเฉลี่ยทั้งหมด <?php echo mysqli_num_rows($result); ?> รายการ</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>