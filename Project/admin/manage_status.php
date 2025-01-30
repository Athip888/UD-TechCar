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
    $sql = "SELECT * FROM requests ORDER BY request_id DESC";
    $result = mysqli_query($connect, $sql);
    ?>
    <div class="container mt-5">
        <div class=" custom-card bg-white">
            <div class="card-body">
                <h5 class="card-title">งานรออนุมัติ</h5>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="status" class="form-label">สถานะ</label>
                        <select class="form-select" id="status">
                            <option selected>รออนุมัติ/อ่านแล้ว</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="from-date" class="form-label">จากวันที่</label>
                        <input type="date" class="form-control" id="from-date">
                    </div>
                    <div class="col-md-3">
                        <label for="to-date" class="form-label">ถึงวันที่</label>
                        <input type="date" class="form-control" id="to-date">
                    </div>

                    <div class="col-md-3">
                        <label for="search" class="form-label">ค้นหา</label>
                        <div class="d-flex">
                            <input type="search" class="form-control" id="search">
                            <button class="btn btn-primary">ค้นหา</button>
                        </div>
                    </div>
                </div>
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
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='clickable-row' onclick=\"window.location.href='edit_status.php?request_id=" . htmlspecialchars($row["request_id"]) . "';\" style='cursor: pointer;'>";

                                // คอลัมน์รูปภาพ
                                echo "<td>";
                                echo "<div style='width: 100%; height: 80px; background-color: #f8f9fa;'></div>";
                                echo "</td>";

                                // คอลัมน์ข้อมูล
                                echo "<td>";
                                echo "<p style='margin: 0; font-size: 13px;'>เลขที่เอกสาร: " . htmlspecialchars($row["request_id"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>ทะเบียนรถ: " . htmlspecialchars($row["car_id"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>วันที่ใช้รถ: " . htmlspecialchars($row["departure_date"]) . " (" . htmlspecialchars($row["departure_time"]) . ") ถึง " . htmlspecialchars($row["return_date"]) . " (" . htmlspecialchars($row["return_time"]) . ")</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>แผนกที่ขอใช้: " . htmlspecialchars($row["user_id"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>จองใช้รถเพื่อ: " . htmlspecialchars($row["purpose"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>สถานะ: " . htmlspecialchars($row["status"]) . "</p>";
                                echo "<p style='margin: 0; font-size: 13px;'>วันที่ขอ: " . htmlspecialchars($row["request_date"]) . "</p>";
                                echo "</td>";

                                // คอลัมน์สถานะ
                                echo "<td>";
                                echo "<span class='status-label'>เปิดอ่านแล้ว</span>";
                                echo "<p class='text-muted mt-2' style='font-size: 12px;'>08/12/2567 เวลา 14:47:59</p>";
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