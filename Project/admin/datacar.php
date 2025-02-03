<?php
require('../config/dbconnect.php');
// ดึงข้อมูลรถทั้งหมด
$sql = "
    SELECT c.car_id, c.plate_number, c.brand, c.model, c.seats, c.car_pic,
           (SELECT COUNT(*) 
            FROM requests r
            WHERE r.car_id = c.car_id
            AND r.status = 'อนุมัติ'
            AND (
                (NOW() BETWEEN CONCAT(r.departure_date, ' ', r.departure_time) 
                           AND CONCAT(r.return_date, ' ', r.return_time))
                OR (CONCAT(r.departure_date, ' ', r.departure_time) BETWEEN NOW() AND NOW())
                OR (CONCAT(r.return_date, ' ', r.return_time) BETWEEN NOW() AND NOW())
            )
           ) AS request_count,
           (SELECT COUNT(*) 
            FROM requests r
            WHERE r.car_id = c.car_id
            AND r.status = 'อนุมัติ'
            AND DATE(r.departure_date) = CURDATE()
           ) AS daily_usage,
           (SELECT COUNT(*) 
            FROM requests r
            WHERE r.car_id = c.car_id
            AND r.status = 'อนุมัติ'
            AND MONTH(r.departure_date) = MONTH(CURDATE())
            AND YEAR(r.departure_date) = YEAR(CURDATE())
           ) AS monthly_usage,
           (SELECT COUNT(*) 
            FROM requests r
            WHERE r.car_id = c.car_id
            AND r.status = 'อนุมัติ'
            AND YEAR(r.departure_date) = YEAR(CURDATE())
           ) AS yearly_usage
    FROM cars c
    WHERE c.status = 'ใช้ได้ปกติ';
";


$result = $connect->query($sql);
$cars = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สถานะของรถ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .card {
            width: 260px;
            text-align: center;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 10px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .status-btn {
            width: 100%;
            font-weight: bold;
            padding: 8px;
        }

        .btn-green {
            background-color: #28a745;
            color: white;
        }

        .btn-red {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2>สถานะของรถตอนนี้</h2>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <?php if (!empty($cars)): ?>
                <?php foreach ($cars as $car): ?>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="card border-0">
                            <img src="../car_image/<?= htmlspecialchars($car['car_pic']) ?>" alt="Car Image">
                            <div class="card-body">
                                <div class="status-btn btn <?= ($car['request_count'] > 0) ? 'btn-red' : 'btn-green' ?>">
                                    <?= ($car['request_count'] > 0) ? 'ไม่ว่าง' : 'ว่าง' ?>
                                </div>
                                <div class="divider"></div>
                                <p><?= htmlspecialchars($car['plate_number']) . ' ' . htmlspecialchars($car['brand']) . ' ' . htmlspecialchars($car['model']) ?></p>
                                <div class="divider"></div>
                                <p>วันนี้ใช้ - <?= $car['daily_usage'] ?> ครั้ง</p>
                                <div class="divider"></div>
                                <p>เดือนนี้ใช้ - <?= $car['monthly_usage'] ?> ครั้ง</p>
                                <div class="divider"></div>
                                <p>ปีนี้ใช้ - <?= $car['yearly_usage'] ?> ครั้ง</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">ไม่มีรถให้แสดง</p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>