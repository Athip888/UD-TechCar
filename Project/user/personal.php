<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("โปรดอัพโหลดไฟล์ เช่น jpeg,png");</script>';
    } elseif ($_GET['status'] == 2) {
        echo '<script>alert("แก้ไขข้อมูลเสร็จสิ้น");</script>';
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

        .form-container{
            background-color: #ffff;
        }

    </style>

    <div class="container my-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="form-container">
                    <h3 class="text-center mb-4">แก้ไขข้อมูลส่วนตัว</h3>
                    <form action="personal_pro.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">

                            <div class="form-column">



                                <div class="mb-3">
                                    <label for="fullName" class="form-label">ชื่อ-นามสกุล</label>
                                    <input type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['fullname']; ?>" name="fullname">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">แผนก</label>
                                    <input type="tel" class="form-control" id="phone" value="<?php echo $_SESSION['department']; ?>" name="department">
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="pos" class="form-control" id="position" value="<?php echo $_SESSION['position']; ?>" name="position">
                                </div>

                               <!-- <div class="mb-3">
                                    <label for="user-id" class="form-label">รหัส</label>
                                    <input type="user-id" class="form-control" id="user-id" placeholder="">
                                </div>
                                    -->
                            </div>


                            <div class="form-column">
                                <div class="profile-container">
                                    <h3 class="text-center mb-4">โปรไฟล์</h3>
                                    <div class="profile-img-container  ">
                                        <div class="d-flex "><img src="<?php echo $image_path; ?>" alt="Profile Image" id="profileImage"></div>
                                    </div>
                                    <input type="file" class="form-control" id="profileImageInput" name="file" onchange="previewImage()">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-success w-30">บันทึกการแก้ไขข้อมูล</button>
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