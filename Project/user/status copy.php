<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้ารายการจองรถยนต์</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>

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
</head>
<?php
    require('../user/header.php');
    ?>
<body>
    <div class="container py-5">
        <div class="form-container shadow-sm">
            <h3 class="text-center mb-4">รายการ</h3>
            <form id="searchForm">
                <div class="row g-3 align-items-center">
                    
                    <div class="col-md-4">
                        <label for="startDate" class="form-label">วันที่เริ่มต้น</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" lang="th">
                    </div>
        
                  
                    <div class="col-md-4">
                        <label for="endDate" class="form-label">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" lang="th" >
                    </div>

                    
                    <div class="col-md-4">
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
                                <th>#</th>
                                <th>วันที่เริ่มต้น</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>คำค้นหา</th>
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