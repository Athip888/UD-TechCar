<!DOCTYPE html>
<html lang="en">
<?php
require("headadmin.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลคนขับรถหลายคน</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container py-5">
        <div class="form-container shadow-sm">
            <h3 class="text-center mb-4">เพิ่มข้อมูลคนขับรถหลายคน</h3>
            <form method="POST" action="add_driver_pro.php">
                <div id="drivers-container">
                    <!-- ฟอร์มสำหรับเพิ่มคนขับรถใหม่ -->
                    <div class="driver-form">
                        <h4>คนขับรถ 1</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" name="fullname[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">เบอร์โทร</label>
                                <input type="text" class="form-control" name="phone_number[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">วันที่เริ่มทำงาน</label>
                                <input type="date" class="form-control" name="start_date[]" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ปุ่มเพิ่มคนขับรถใหม่ -->
                <button type="button" class="btn btn-secondary mt-3" id="addDriverButton">เพิ่มคนขับรถใหม่</button>

                <button type="submit" class="btn btn-primary mt-3">เพิ่มข้อมูลคนขับรถทั้งหมด</button>
            </form>
        </div>
    </div>

    <script>
        // ฟังก์ชันเพิ่มฟอร์มคนขับรถใหม่
        document.getElementById("addDriverButton").addEventListener("click", function() {
            const container = document.getElementById("drivers-container");

            const driverCount = container.getElementsByClassName("driver-form").length + 1;

            const newDriverForm = document.createElement("div");
            newDriverForm.classList.add("driver-form");

            newDriverForm.innerHTML = `
                <h4>คนขับรถ ${driverCount}</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" name="fullname[]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">เบอร์โทร</label>
                        <input type="text" class="form-control" name="phone_number[]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">วันที่เริ่มทำงาน</label>
                        <input type="date" class="form-control" name="start_date[]" required>
                    </div>
                </div>
            `;

            container.appendChild(newDriverForm);
        });
    </script>
</body>

</html>
