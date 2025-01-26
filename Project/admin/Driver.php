<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงานขับรถ</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    
    <style>
        body {
            background-color: #f8f9fa; 
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body>

<?php
require("headadmin.php");
?>

    <div class="container my-4">
        <h2 class="mb-4">ข้อมูลพนักงานขับรถ</h2>
     
        <div class="d-flex justify-content-between mb-3">
           
            <div class="input-group w-50">
                <input type="text" class="form-control" placeholder="ค้นหา...">
                <button class="btn btn-primary">ค้นหา</button>
            </div>
            <button class="btn btn-success">+ เพิ่มข้อมูล</button>
        </div>
        
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ-สกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>เลขบัตรประชาชน</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>00001</td>
                    <td>นายวิชรพงษ์ ใหญ่มาก</td>
                    <td>โจ</td>
                    <td></td>
                    <td>
                        <button class="btn btn-warning btn-sm">แก้ไข</button>
                        <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
                <tr>
                    <td>00002</td>
                    <td>นายปริมาณพงษ์ เชิดกลาง</td>
                    <td>หนึ่ง</td>
                    <td></td>
                    <td>
                        <button class="btn btn-warning btn-sm">แก้ไข</button>
                        <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
                <tr>
                    <td>00003</td>
                    <td>นายพงษ์ศักดิ์ ของสกุล</td>
                    <td>วัฒ</td>
                    <td></td>
                    <td>
                        <button class="btn btn-warning btn-sm">แก้ไข</button>
                        <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
             
            </tbody>
        </table>
       
        <nav>
            <ul class="pagination justify-content-end">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">>></a></li>
            </ul>
        </nav>
    </div>

   
   
</body>

</html>
