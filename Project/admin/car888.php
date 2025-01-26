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
            border-radius: 0.25rem 0 0 0.25rem; /* Rounded left side */
        }
        .search-container button {
            border-radius: 0 0.25rem 0.25rem 0; /* Rounded right side */
        }
    </style>
</head>
<body>
<?php
require("headadmin.php");
?>
    <div class="container py-5 mt-5" style="background-color: white;">
        <h1 class="text-center mb-4">ระบบจัดการยานพาหนะ</h1>
        <div class="row mb-3">
            <div class="col-md-9 mb-2">
                <div class="search-container">
                    <input type="text" id="search" class="form-control" placeholder="ค้นหายานพาหนะ...">
                    <button class="btn btn-primary" onclick="searchVehicle()">ค้นหา</button>
                </div>
            </div>
            <div class="col-md-3 text-md-end">
                <button class="btn btn-success" onclick="openAddForm()">
                    <i class="fas fa-plus"></i> เพิ่มยานพาหนะ
                </button>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>ยานพาหนะ</th>
                    <th>ยี่ห้อ</th>
                    <th>ประเภทน้ำมัน</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody id="vehicleTable">
            
            </tbody>
        </table>
    </div>

    <script>
        const vehicles = [
            { id: 1, name: 'ออดี้', brand: 'TR', fuel: 'เบนซิน' },
            { id: 2, name: 'โตโยต้า', brand: 'โคโรลล่า', fuel: 'ดีเซล' },
            { id: 3, name: 'อีซูซุ', brand: 'ดีแม็กซ์', fuel: '95' },
        ];

        function populateTable() {
            const table = document.getElementById('vehicleTable');
            table.innerHTML = '';
            vehicles.forEach(vehicle => {
                const row = `<tr>
                    <td>${vehicle.id}</td>
                    <td>${vehicle.name}</td>
                    <td>${vehicle.brand}</td>
                    <td>${vehicle.fuel}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning" onclick="editVehicle(${vehicle.id})">
                            <i class="fas fa-edit"></i> แก้ไข
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteVehicle(${vehicle.id})">
                            <i class="fas fa-trash"></i> ลบ
                        </button>
                    </td>
                </tr>`;
                table.innerHTML += row;
            });
        }

        function searchVehicle() {
            const query = document.getElementById('search').value.toLowerCase();
            const filteredVehicles = vehicles.filter(vehicle => 
                vehicle.name.toLowerCase().includes(query) || 
                vehicle.brand.toLowerCase().includes(query) || 
                vehicle.fuel.toLowerCase().includes(query));

            const table = document.getElementById('vehicleTable');
            table.innerHTML = '';
            filteredVehicles.forEach(vehicle => {
                const row = `<tr>
                    <td>${vehicle.id}</td>
                    <td>${vehicle.name}</td>
                    <td>${vehicle.brand}</td>
                    <td>${vehicle.fuel}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning" onclick="editVehicle(${vehicle.id})">
                            <i class="fas fa-edit"></i> แก้ไข
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteVehicle(${vehicle.id})">
                            <i class="fas fa-trash"></i> ลบ
                        </button>
                    </td>
                </tr>`;
                table.innerHTML += row;
            });
        }

        function editVehicle(id) {
            alert('แก้ไขยานพาหนะที่มีไอดี: ' + id);
        }

        function deleteVehicle(id) {
            alert('ลบยานพาหนะที่มีไอดี: ' + id);
        }

        function openAddForm() {
            alert('เปิดฟอร์มเพิ่มยานพาหนะใหม่');
        }

        populateTable();
    </script>
   
</body>
</html>
