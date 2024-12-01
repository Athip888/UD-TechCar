<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
        }

        thead th {
           
            top: 0;
            background-color: #f5f5f5;
            z-index: 10;
        }

        
        .table-container {
            max-height: 400px; 
            overflow-y: auto;
        }

       
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
        }

      
        .container {
            max-width: 100%;
        }
    </style>
</head>
<body>

<?php
    require('../user/wallpapur.php');
?>

<div class="container my-5">
    <div class="bg-white p-4 rounded shadow-sm">
        <header>สอบถามรายการจอง</header>
        <form action="#" method="GET" class="d-flex flex-wrap gap-3 align-items-center mt-3">
            <div class="col-12 col-sm-4 col-md-3">
                <label>วันที่ออก</label>
                <input type="date" class="form-control" name="start_date" placeholder="เลือกวันที่เริ่มต้น">
            </div>
            <div class="col-12 col-sm-4 col-md-3">
                <label>วันที่ออก</label>
                <input type="date" class="form-control" name="end_date" placeholder="เลือกวันที่สิ้นสุด">
            </div>
            <div class="col-12 col-sm-4 col-md-3">
                <label>วันที่ออก</label>
                <div class="input-group">
                    <input type="search" class="form-control" name="search_query" placeholder="ค้นหาข้อมูล...">
                    <button class="btn btn-primary" type="button" id="button-addon2">ค้นหา</button>
                </div>
            </div>
        </form>

     
        <div class="table-container mt-4">
            <table>
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>อายุ</th>
                        <th>ที่อยู่</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>30</td>
                        <td>Bangkok</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>25</td>
                        <td>Chiang Mai</td>
                    </tr>
                    <tr>
                        <td>Albert Miller</td>
                        <td>40</td>
                        <td>Phuket</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

