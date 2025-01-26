<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>

<?php
require("headadmin.php");
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
           
          
        }
    </style>

<div class="container py-5">
        <div class="form-container shadow-sm">
            <h3 class="text-center mb-4">รายการ</h3>
            <form id="searchForm">
                <div class="row g-3 align-items-center">
                    
                    <div class="col-md-4">
                    <label for="startDate" class="form-label">ประเภทผู้ใช้</label>
                    <select class="form-select me-2" id="startDay" name="startDay">
                         <option value="" selected>*** ทุกประเภทผู้ใช้ ***</option>
                           
                            <option value="ประเภทผู้ใช้">ประเภทผู้ใช้</option>
                            <option value="ประเภทผู้ดูแลระบบ">ประเภทผู้ดูแลระบบ</option>
                          
                            
                            
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
                </div>
               
                <div class="table-container shadow-sm">
                    
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อ-สกุล</th>
                                <th>แผนก</th>
                                <th>ชื่อเข้าใช้ระบบ</th>
                                <th>ประเภท</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="resultTable">
                            <tr>
                                <td colspan="1" class="text-center"></td>
                                <td colspan="1" class="text-center"></td>
                                <td colspan="1" class="text-center"></td>
                                <td colspan="1" class="text-center"></td>
                                <td colspan="1" class="text-center"></td>
                                <td colspan="1" class="text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        </form>
    </div>

</body>
</html>