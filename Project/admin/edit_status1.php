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
$sql = "SELECT 
            requests.request_id, 
            requests.user_id,
            users.fullname AS user_name,
            users.position,
            requests.destination,
            requests.province,
            requests.departure_date,
            requests.departure_time,
            requests.return_date,
            requests.return_time,
            requests.status,
            requests.driver_id,
            drivers.fullname AS driver_name,
            requests.car_id,
            cars.car_name
        FROM requests 
        JOIN users ON requests.user_id = users.user_id
        LEFT JOIN drivers ON requests.driver_id = drivers.driver_id
        LEFT JOIN cars ON requests.car_id = cars.car_id
        WHERE (requests.status IN ('รออนุมัติ', 'อนุมัติ', 'ปฏิเสธ'));";
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
                        <td>จยพ.6712002</td>
                    </tr>
                    <tr>
                        <th scope="row">วันที่เวลา</th>
                        <td>08 ธ.ค. 67 เวลา 14:47</td>
                    </tr>
                    <tr>
                        <th scope="row">สถานที่ไป</th>
                        <td>559894 ตำบล 8744874 อำเภอ sfsdfsdf จังหวัด กาฬสินธุ์</td>
                    </tr>
                    <tr>
                        <th scope="row">แผนก</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">ตำแหน่ง</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">จำนวนผู้โดยสาร</th>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th scope="row">รถยนต์</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">พนักงานขับรถ</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">ผู้จองใช้</th>
                        <td>นางสาวสิรัญ ฝนทอง</td>
                    </tr>
                    <!--
                    <tr>
                        <th scope="row">โทรศัพท์ติดต่อ</th>
                        <td>081-154-5246</td>
                    </tr>
                    <tr>
                        <th scope="row">เพิ่มเติม</th>
                        <td>-</td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
        <div class="card-footer text-end bg-light">
            <span class="badge bg-info text-dark">เปิดอ่านแล้ว</span>
            <span>08/12/2567 เวลา 14:47:59</span>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="bg-white">
        <div class="card-header">
            <h3>ผลการอนุมัติ</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="approvalStatus" class="form-label">การอนุมัติ</label>
                    <select class="form-select" id="approvalStatus">
                        <option value="รออนุมัติ">รออนุมัติ</option>
                        <option value="อนุมัติ">อนุมัติ</option>
                        <option value="ปฏิเสธ">ปฏิเสธ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="approvalDate" class="form-label">วันเวลาอนุมัติ</label>
                    <input type="text" class="form-control" id="approvalDate" value="08/12/2567 เวลา 14:47:59" readonly>
                </div>
                <div class="mb-3">
                    <label for="driver" class="form-label">พนักงานขับรถ</label>
                    <select class="form-select" id="driver">
                        <option value="">ป้อนหรือคลิกเลือกจากรายการ</option>
                        <option value="driver1">พนักงานขับรถ 1</option>
                        <option value="driver2">พนักงานขับรถ 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="car" class="form-label">รถยนต์</label>
                    <select class="form-select" id="driver">
                        <option value="">ป้อนหรือคลิกเลือกจากรายการ</option>
                        <option value="car1">รถ 1</option>
                        <option value="car2">รถ 2</option>
                    </select>
                </div>
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
