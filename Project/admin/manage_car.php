<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการยานพาหนะ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container input {
            border-radius: 0.25rem 0 0 0.25rem;
        }

        .search-container button {
            border-radius: 0 0.25rem 0.25rem 0;
        }
    </style>
</head>

<body>
    <?php
    require("headadmin.php");
    $user_id = $_SESSION['user_id'];
    // ตรวจสอบว่าได้ส่งคำค้นหามาหรือไม่
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    // ปรับ SQL ให้ใช้คำค้นหาที่ได้จากฟอร์ม
    $sql = "SELECT * FROM cars WHERE plate_number LIKE '%$search%' OR brand LIKE '%$search%' OR model LIKE '%$search%' OR car_type LIKE '%$search%'";
    $result = mysqli_query($connect, $sql);
    ?>

    <div class="container py-5 mt-5" style="background-color: white;">
        <h1 class="text-center mb-4">ระบบจัดการยานพาหนะ</h1>
        <div class="row mb-3">
            <div class="col-md-9 mb-2">
                <!-- ฟอร์มค้นหาที่จะส่งคำค้นหา -->
                <form action="manage_car.php" method="GET" class="search-container">
                    <input type="text" name="search" class="form-control" placeholder="ค้นหายานพาหนะ..." value="<?php echo $search; ?>">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
            </div>
            <div class="col-md-3 text-md-end">
                <button class="btn btn-success" onclick="window.location.href='add_car.php';">
                     <img src="../image/plus-circle.svg" alt="" class="" style="filter: invert(1);">
                    <i class="fas fa-plus"></i> เพิ่มยานพาหนะ
                </button>
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>ยี่ห้อ</th>
                    <th>รุ่น</th>
                    <th>ประเภทรถ</th>
                    <th>ทะเบียนรถ</th>
                    <th>ที่นั่ง</th>
                    <th>สีรถ</th>
                    <th>สถานะของรถ</th>
                    <th>การจัดการข้อมูล</th>
                </tr>
            </thead>
            <tbody id="vehicleTable">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['car_id'] . "</td>";
                        echo "<td>" . $row['brand'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['car_type'] . "</td>";
                        echo "<td>" . $row['plate_number'] . "</td>";
                        echo "<td>" . $row['seats'] . "</td>";
                        echo "<td>" . $row['color'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>
                            <a href='edit_car.php?car_id={$row['car_id']}' class='btn btn-info'>แก้ไข</a>
                            <a href='delete_car.php?car_id=" . $row['car_id'] . "' class='btn btn-danger btn-sm' 
                            onclick='return confirm(\"คุณต้องการลบ " . htmlspecialchars($row['car_type'])." ทะเบียนรถ ".htmlspecialchars($row['plate_number'], ENT_QUOTES, 'UTF-8') . " ใช่หรือไม่?\");'>ลบ</a> 
                        </td>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>ยังไม่มีข้อมูล</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
