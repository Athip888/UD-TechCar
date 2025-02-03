<?php
require("headadmin.php");

// รับค่าการค้นหาจาก AJAX หรือจาก URL
$search_query = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';
$start_day = isset($_GET['startDay']) ? $_GET['startDay'] : '';

// SQL Query พร้อมเงื่อนไขค้นหา
$sql = "SELECT * FROM `users` WHERE 1";

if (!empty($start_day)) {
    $sql .= " AND role = '" . mysqli_real_escape_string($connect, $start_day) . "'";
}

if (!empty($search_query)) {
    $sql .= " AND (fullname LIKE '%" . mysqli_real_escape_string($connect, $search_query) . "%' 
                OR user_id LIKE '%" . mysqli_real_escape_string($connect, $search_query) . "%')";
}

$result = mysqli_query($connect, $sql);
// สมมติว่าเราเก็บ user_id ของผู้ใช้งานที่ล็อกอินไว้ใน session
$user_id = $_SESSION['user_id']; // ตัวแปรนี้จะต้องมีค่าจากการล็อกอินของผู้ใช้
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
            <form id="searchForm">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label for="startDay" class="form-label">ประเภทผู้ใช้</label>
                        <select class="form-select me-2" id="startDay" name="startDay">
                            <option value="" selected>*** ทุกประเภทผู้ใช้ ***</option>
                            <option value="user">ผู้ใช้</option>
                            <option value="admin">ผู้ดูแลระบบ</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="searchQuery" class="form-label">ค้นหา</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchQuery" name="searchQuery"
                                placeholder="ป้อนคำค้นหา">
                            <button type="button" class="btn btn-primary" id="searchBtn">ค้นหา</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="addUser" class="form-label">เพิ่มผู้ใช้งาน</label>
                        <div class="input-group">
                        <a href="add_user.php" class="btn btn-success d-flex align-items-center">
                             <img src="../image/plus-circle.svg" alt="" class="me-1" style="filter: invert(1);"> เพิ่มผู้ใช้งาน
                        </a>
                        </div>

                    </div>

                </div>
            </form>
            <div class="table-container shadow-sm">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ชื่อเข้าใช้ระบบ</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>แผนก</th>
                            <th>ประเภท</th>
                            <th>จัดการข้อมูลผู้ใช้งาน</th>
                        </tr>
                    </thead>
                    <tbody id="resultTable">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($row['fullname'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($row['position'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($row['department'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($row['role'], ENT_QUOTES, 'UTF-8') . "</td>";

                                if ($row['user_id'] != $user_id) {
                                    echo "<td>
                    <a href='edit_user.php?user_id=" . urlencode($row['user_id']) . "' class='btn btn-warning btn-sm'>แก้ไข</a>
                    <a href='delete_user.php?user_id=" . urlencode($row['user_id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"คุณต้องการลบ " . htmlspecialchars($row['user_id'], ENT_QUOTES, 'UTF-8') . " ใช่หรือไม่?\");'>ลบ</a>
                  </td>";
                                } else {
                                    // ถ้า user_id ตรงกันก็ไม่แสดงปุ่มลบ
                                    echo "<td><a href='edit_user.php?user_id=" . urlencode($row['user_id']) . "' class='btn btn-warning btn-sm'>แก้ไข</a></td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>ยังไม่มีข้อมูล</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#searchBtn').click(function() {
                var searchQuery = $('#searchQuery').val();
                var startDay = $('#startDay').val();

                // ดึงผลลัพธ์ผ่าน AJAX
                $.ajax({
                    url: 'manage_users.php',
                    method: 'GET',
                    data: {
                        searchQuery: searchQuery,
                        startDay: startDay
                    },
                    success: function(response) {
                        $('#resultTable').html($(response).find('#resultTable').html());
                    }
                });
            });
        });
    </script>
</body>

</html>