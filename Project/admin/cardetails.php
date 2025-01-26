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


    <div class="container mt-5 ">
        <h3 class="mb-4">ข้อมูลรถ / รายละเอียดรถ (เพิ่ม)</h3>
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="licensePlate" class="form-label">ทะเบียนรถ</label>
                    <input type="text" id="licensePlate" class="form-control" placeholder="ระบุทะเบียนรถ">
                </div>
                <div class="col-md-6">
                    <label for="province" class="form-label">จังหวัด</label>
                    <input type="text" id="province" class="form-control" placeholder="ป้อนหรือคลิกเลือกรายการ">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="country" class="form-label">ประเทศ</label>
                    <select id="country" class="form-select">
                        <option selected>***เลือกประเทศ***</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">สถานะ</label>
                    <select id="status" class="form-select">
                        <option value="ปกติ">ปกติ</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="carType" class="form-label">ประเภทน้ำมัน</label>
                    <select id="carType" class="form-select">
                        <option selected>***เลือกประเภทน้ำมัน***</option>
                        <option value="Benzine">Benzine</option>
                        <option value="Diesel">Diesel</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="brand" class="form-label">ยี่ห้อรถ</label>
                    <select id="brand" class="form-select">
                        <option selected>***เลือกยี่ห้อรถ***</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="model" class="form-label">รุ่น</label>
                    <input type="text" id="model" class="form-control" placeholder="ระบุรุ่น">
                </div>
                <div class="col-md-6">
                    <label for="color" class="form-label">สี</label>
                    <input type="text" id="color" class="form-control" placeholder="ระบุสี">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="seats" class="form-label">จำนวนที่นั่ง</label>
                    <input type="number" id="seats" class="form-control" placeholder="0">
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">ราคา</label>
                    <input type="number" id="price" class="form-control" placeholder="บาท">
                </div>
                <div class="col-md-4">
                    <label for="engineNo" class="form-label">หมายเลขเครื่อง</label>
                    <input type="text" id="engineNo" class="form-control" placeholder="ระบุหมายเลขเครื่อง">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="purchaseDate" class="form-label">วันที่ซื้อ</label>
                    <input type="date" id="purchaseDate" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="insuranceCompany" class="form-label">บริษัทประกันภัย</label>
                    <input type="text" id="insuranceCompany" class="form-control" placeholder="ป้อนหรือคลิกเลือกรายการ">
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2">เพิ่มข้อมูล</button>
                <button type="reset" class="btn btn-danger">ลบข้อมูล</button>
            </div>
        </form>
    </div>

   
</body>
</html>
