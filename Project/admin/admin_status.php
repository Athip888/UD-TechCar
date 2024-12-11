<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าสถานะ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<?php
require("../user/header.php");
?>



 

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

        .form-label {
            font-weight: bold;
        }

        .table-container {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
    </style>

    <div class="container py-5">
        <div class="form-container shadow-sm">
            <h3 class="text-center mb-4">งานรออนุมัติ</h3>
            <form id="searchForm">
                <div class="row g-3 align-items-center">
                    
                    <div class="col-md-3">
                        <label for="startDate" class="form-label">สถานะ</label>
                    <select class="form-select me-2" id="startDay" name="startDay">
                         <option value="" selected>=== สถานะ ===</option>
                            <option value="อยู่ระหว่างทำรายการ">อยู่ระหว่างทำรายการ</option>
                            <option value="รออนุมัติ">รออนุมัติ</option>
                            <option value="อนุมัติ">อนุมัติ</option>
                            <option value="ไม่อนุมัติ">ไม่อนุมัติ</option>
                            <option value="ยกเลิก">ยกเลิก</option>
                            <option value="ส่งคืนรถแล้ว">ส่งคืนรถแล้ว</option>
        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="startDate" class="form-label">จากวันที่ใช้รถ</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" lang="th" >
                    </div>
                  
                    <div class="col-md-3">
                        <label for="endDate" class="form-label">ถึงวันที่</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" lang="th">
                    </div>

                    
                    <div class="col-md-3">
                        <label for="searchQuery" class="form-label">ค้นหา</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchQuery" name="searchQuery"
                                placeholder="ป้อนคำค้นหา">
                            <button type="button" class="btn btn-primary" id="searchBtn">ค้นหา</button>
                        </div>
                    </div>
                </div>
               
                <div class="table-container shadow-sm">
                    <h4 class="mb-4">ผลลัพธ์การค้นหา</h4>
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>รายการ</th>
                                
                            </tr>
                        </thead>
                        <tbody id="resultTable">
                            <tr>
                                <td colspan="4" class="text-center">ยังไม่มีข้อมูล</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        </form>
    </div>


    


</body>
</html>