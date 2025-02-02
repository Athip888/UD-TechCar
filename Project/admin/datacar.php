<?php
require("headadmin.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Card UI</title>
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
            object-position: center;
        }
        .status-btn {
            width: 100%;
            font-weight: bold;
            padding: 8px;
            border-radius: 0;
        }
        .btn-green {
            background-color: #28a745;
            color: white;
        }
        .btn-red {
            background-color: #dc3545;
            color: white;
        }
        .divider {
            border-top: 1px solid #dee2e6;
            margin: 8px 0;
        }
        .card-body p {
            margin: 5px 0;
            font-size: 14px;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
           
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border-0">
                    <img src="../image/61Rx9tHudUL.jpg" alt="Car Image">
                    <div class="card-body">
                        <div class="status-btn btn btn-green">ว่าง</div>
                        <div class="divider"></div>
                        <p>เลข 3625 วุฒรถนี่</p>
                        <div class="divider"></div>
                        <p>วันนี้ใช้ - ครั้ง</p>
                        <div class="divider"></div>
                        <p>เดือนนี้ใช้ - 30 ครั้ง</p>
                        <div class="divider"></div>
                        <p>ปีนี้ใช้ - 309 ครั้ง</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border-0">
                    <img src="https://via.placeholder.com/260x150" alt="Car Image">
                    <div class="card-body">
                        <div class="status-btn btn btn-red">ไม่ว่าง</div>
                        <div class="divider"></div>
                        <p>เลข 3625 วุฒรถนี่</p>
                        <div class="divider"></div>
                        <p>วันนี้ใช้ - ครั้ง</p>
                        <div class="divider"></div>
                        <p>เดือนนี้ใช้ - 30 ครั้ง</p>
                        <div class="divider"></div>
                        <p>ปีนี้ใช้ - 309 ครั้ง</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border-0">
                    <img src="https://via.placeholder.com/260x150" alt="Car Image">
                    <div class="card-body">
                        <div class="status-btn btn btn-green">ว่าง</div>
                        <div class="divider"></div>
                        <p>เลข 3625 วุฒรถนี่</p>
                        <div class="divider"></div>
                        <p>วันนี้ใช้ - ครั้ง</p>
                        <div class="divider"></div>
                        <p>เดือนนี้ใช้ - 30 ครั้ง</p>
                        <div class="divider"></div>
                        <p>ปีนี้ใช้ - 309 ครั้ง</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
           
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border-0">
                    <img src="https://via.placeholder.com/260x150" alt="Car Image">
                    <div class="card-body">
                        <div class="status-btn btn btn-red">ไม่ว่าง</div>
                        <div class="divider"></div>
                        <p>เลข 3625 วุฒรถนี่</p>
                        <div class="divider"></div>
                        <p>วันนี้ใช้ - ครั้ง</p>
                        <div class="divider"></div>
                        <p>เดือนนี้ใช้ - 30 ครั้ง</p>
                        <div class="divider"></div>
                        <p>ปีนี้ใช้ - 309 ครั้ง</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border-0">
                    <img src="https://via.placeholder.com/260x150" alt="Car Image">
                    <div class="card-body">
                        <div class="status-btn btn btn-green">ว่าง</div>
                        <div class="divider"></div>
                        <p>เลข 3625 วุฒรถนี่</p>
                        <div class="divider"></div>
                        <p>วันนี้ใช้ - ครั้ง</p>
                        <div class="divider"></div>
                        <p>เดือนนี้ใช้ - 30 ครั้ง</p>
                        <div class="divider"></div>
                        <p>ปีนี้ใช้ - 309 ครั้ง</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border-0">
                    <img src="https://via.placeholder.com/260x150" alt="Car Image">
                    <div class="card-body">
                        <div class="status-btn btn btn-red">ไม่ว่าง</div>
                        <div class="divider"></div>
                        <p>เลข 3625 วุฒรถนี่</p>
                        <div class="divider"></div>
                        <p>วันนี้ใช้ - ครั้ง</p>
                        <div class="divider"></div>
                        <p>เดือนนี้ใช้ - 30 ครั้ง</p>
                        <div class="divider"></div>
                        <p>ปีนี้ใช้ - 309 ครั้ง</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
