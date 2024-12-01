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
    require('../user/wallpapur.php');
?>

<style>
    body {
        background-color: #f5f5f5;
    }
    .profile-img-container {
        width: 150px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 15px;
        margin-left: auto;   
        margin-right: auto;  
    }

    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;  
    }

    .form-container {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffff; 
    }

    .profile-container {
        text-align: center;
    }

    .profile-container h4 {
        margin-top: 10px;
    }

    .form-row {
        display: flex;
        justify-content: space-between;
    }

    .form-column {
        width: 48%; 
    }
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="form-container">
                <h3 class="text-center mb-4">แก้ไขข้อมูลส่วนตัว</h3>
                <form>
                    <div class="form-row">
                        <div class="form-column">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" id="fullName" placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">ตำแหน่ง</label>
                                <input type="pos" class="form-control" id="position" placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="fruits" class="form-label">แผนก:</label>
                                <select class="selectpicker form-select" data-live-search="true" id="fruits-select" name="fruits-select">
                                    <option value="#">แผนกเทคโนโลยีสาารสนเทศ</option>
                                    <option value="#">แผนกช่างไฟฟ้า</option>
                                    <option value="#">#</option>
                                    <option value="#">#</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-column">
                            <div class="profile-container">
                                <h3 class="text-center mb-4">โปรไฟล์</h3>
                                <div class="profile-img-container">
                                    <div class="d-flex"><img src="https://via.placeholder.com/150" alt="Profile Image" id="profileImage"></div>
                                </div>
                                <input type="file" class="form-control" id="profileImageInput" onchange="previewImage()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" style="display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-primary w-30 mt-3">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        function previewImage() {
            const file = document.getElementById("profileImageInput").files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById("profileImage").src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>