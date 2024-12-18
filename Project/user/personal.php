<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("โปรดอัพโหลดโปรไฟล์เป็นไฟล์ เช่น jpg,jpeg,png");</script>';
    } elseif ($_GET['status'] == 2) {
        echo '<script>alert("แก้ไขข้อมูลเสร็จสิ้น");</script>';
    }elseif ($_GET['status'] == 3) {
        echo '<script>alert("โปรดอัพโหลดไฟล์ png");</script>';
    }

    // รีไดเรกต์กลับไปที่ personal.php โดยไม่รวมพารามิเตอร์ 'status'
    echo '<script>window.location.href = "personal.php";</script>';
}
?>

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
    require('../user/header.php');
    ?>

    <style>
        .profile-img-container,
        .signature-img-container {
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin: 0 auto;
        }

        .profile-img-container img,
        .signature-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-column {
            margin-bottom: 30px;
        }

        .form-section {
            width: 30%;
        }

        .form-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
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
    </style>

    <div class="container my-5">
        <div class="form-container">
            <h3 class="text-center mb-4">แก้ไขข้อมูลส่วนตัว</h3>
            <form action="personal_pro.php" method="post" enctype="multipart/form-data">
                <div class="d-flex justify-content-between align-items-start">
                    <!-- ส่วนกรอกข้อมูล (ซ้าย) -->
                    <div class="form-section me-3">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['fullname']; ?>" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">แผนก</label>
                            <input type="text" class="form-control" id="department" value="<?php echo $_SESSION['department']; ?>" name="department">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">ตำแหน่ง</label>
                            <input type="text" class="form-control" id="position" value="<?php echo $_SESSION['position']; ?>" name="position">
                        </div>
                    </div>

                    <!-- ส่วนโปรไฟล์ (กลาง) -->
                    <div class="form-section text-center me-3">
                        <h4 class="mb-3">โปรไฟล์</h4>
                        <div class="profile-img-container mb-3">
                            <img src="<?php echo $image_path . '?v=' . time(); ?>" alt="Profile Image" id="profileImage">
                        </div>
                        <input type="file" class="form-control" id="profileImageInput" name="file" onchange="previewImage('profileImage', 'profileImageInput')">
                    </div>

                    <!-- ส่วนลายเซ็น (ขวา) -->
                    <div class="form-section text-center">
                        <h4 class="mb-3">ลายเซ็น</h4>
                        <div class="signature-img-container mb-3">
                            <img src="<?php echo $signature_path . '?v=' . time(); ?>" alt="Signature Image" id="signatureImage">
                        </div>
                        <input type="file" class="form-control" id="signatureImageInput" name="file1" onchange="previewImage('signatureImage', 'signatureImageInput')">
                    </div>
                </div>

                <!-- ปุ่มบันทึก -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">บันทึกการแก้ไขข้อมูล</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function previewImage(imgId, inputId) {
            const file = document.getElementById(inputId).files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById(imgId).src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>