<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Details Form</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>

    <?php
    require("headadmin.php");
    ?>

</head>

<body>
    <style>
        .container {
            background-color: #ffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h3 {
            margin-top: 20px;
        }
    </style>

    <div class="container mt-5">
        <h3 class="mb-4">ข้อมูลรถ / รายละเอียดรถ (เพิ่ม)</h3>
        <form action="add_car_pro.php" method="post" id="carForm">
            <div id="carFields">
                <!-- ช่องกรอกข้อมูลรถที่ 1 -->
                <div class="car-entry mb-4">
                    <h4>ข้อมูลรถ 1</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="licensePlate" class="form-label">ทะเบียนรถ</label>
                            <input type="text" class="form-control" name="licensePlate[]" placeholder="ระบุทะเบียนรถ">
                        </div>
                        <div class="col-md-6">
                            <label for="province" class="form-label">จังหวัด</label>
                            <select name="province[]" class="form-control" required>
                                <option value="" selected disabled>เลือกจังหวัด</option>
                                <!-- เพิ่มรายการจังหวัดทั้งหมด -->
                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                <option value="กระบี่">กระบี่</option>
                                <!-- เพิ่มจังหวัดอื่นๆ ตามที่คุณต้องการ -->
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="brand" class="form-label">ยี่ห้อรถ</label>
                            <input type="text" class="form-control" name="brand[]" placeholder="ระบุยี่ห้อรถ">
                        </div>
                        <div class="col-md-6">
                            <label for="seats" class="form-label">จำนวนที่นั่ง</label>
                            <input type="number" class="form-control" name="seats[]" placeholder="0">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="model" class="form-label">รุ่น</label>
                            <input type="text" class="form-control" name="model[]" placeholder="ระบุรุ่น">
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="form-label">สี</label>
                            <input type="text" class="form-control" name="color[]" placeholder="ระบุสีรถ">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="color" class="form-label">ประเภทรถ</label>
                            <input type="text" class="form-control" name="car_type[]" placeholder="ระบุประเภทรถ">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="manage_car.php" class="btn btn-secondary me-2">กลับ</a>
                <button type="button" id="addCarBtn" class="btn btn-primary me-2">เพิ่มรถอีกคัน</button>
                <button type="submit" class="btn btn-success me-2">เพิ่มข้อมูล</button>
                <button type="reset" class="btn btn-danger">ลบข้อมูล</button>
            </div>
        </form>
    </div>

    <script>
        // เพิ่มฟอร์มรถใหม่
        document.getElementById('addCarBtn').addEventListener('click', function() {
            var carFields = document.getElementById('carFields');
            var carCount = carFields.getElementsByClassName('car-entry').length + 1;

            // สร้างฟอร์มใหม่
            var newCarEntry = document.createElement('div');
            newCarEntry.classList.add('car-entry', 'mb-4');
            newCarEntry.innerHTML = `
            <h4>ข้อมูลรถ ${carCount}</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="licensePlate" class="form-label">ทะเบียนรถ</label>
                    <input type="text" class="form-control" name="licensePlate[]" placeholder="ระบุทะเบียนรถ">
                </div>
                <div class="col-md-6">
                    <label for="province" class="form-label">จังหวัด</label>
                    <select name="province[]" class="form-control" required>
                        <option value="" selected disabled>เลือกจังหวัด</option>
                        <!-- เพิ่มรายการจังหวัดทั้งหมด -->
                        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                        <option value="กระบี่">กระบี่</option>
                        <!-- เพิ่มจังหวัดอื่นๆ ตามที่คุณต้องการ -->
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="brand" class="form-label">ยี่ห้อรถ</label>
                    <input type="text" class="form-control" name="brand[]" placeholder="ระบุยี่ห้อรถ">
                </div>
                <div class="col-md-6">
                    <label for="seats" class="form-label">จำนวนที่นั่ง</label>
                    <input type="number" class="form-control" name="seats[]" placeholder="0">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="model" class="form-label">รุ่น</label>
                    <input type="text" class="form-control" name="model[]" placeholder="ระบุรุ่น">
                </div>
                <div class="col-md-6">
                    <label for="color" class="form-label">สี</label>
                    <input type="text" class="form-control" name="color[]" placeholder="ระบุสี">
                </div>
            </div>
            <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="color" class="form-label">ประเภทรถ</label>
                            <input type="text" class="form-control" name="car_type[]" placeholder="ระบุประเภทรถ">
                        </div>
                    </div>
        `;

            // เพิ่มฟอร์มใหม่เข้าไป
            carFields.appendChild(newCarEntry);
        });
    </script>

</body>

</html>