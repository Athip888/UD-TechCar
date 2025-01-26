
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
                <tr class="clickable-row" onclick="alert('Row clicked!')">
                    <td><div style="width: 100%; height: 80px; background-color: #f8f9fa;"></div></td> <!-- Adjusted height -->
                    <td>
                        <p style="margin: 0; font-size: 13px;">เลขที่เอกสาร: จยพ.6712002</p>
                        <p style="margin: 0; font-size: 13px;">ทะเบียนรถ: 100</p>
                        <p style="margin: 0; font-size: 13px;">วันที่ใช้รถ: 08 ธ.ค. 67 (08:00) ถึง 08 ธ.ค. 67 (17:00)</p>
                        <p style="margin: 0; font-size: 13px;">แผนกที่ขอใช้: TRANSPORT</p>
                        <p style="margin: 0; font-size: 13px;">จองใช้รถเพื่อ: 6548484</p>
                    </td>
                    <td>
                        <span class="status-label">เปิดอ่านแล้ว</span>
                        <p class="text-muted mt-2" style="font-size: 12px;">08/12/2567 เวลา 14:47:59</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="text-end">
                <p style="font-size: 14px;">ค่าเฉลี่ยทั้งหมด 1 รายการ</p>
            </div>
        </div>
    </div>
</div>

<script>
    
    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', () => {
            alert('คุณได้คลิกที่แถวนี้!');
        });
    });
</script>
</body>
</html>