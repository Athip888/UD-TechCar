<?php
/*if (isset($_GET['status']) && $_GET['status'] == 1) {
    echo '<script>alert("อัพโหลดไฟล์ของคุณก่อน!");</script>';
} elseif (isset($_GET['status']) && $_GET['status'] == 2) {
    echo '<script>alert("โปรดอัพโหลดไฟล์ เช่น jpeg,png");</script>';
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo '<script>alert("แก้ไขข้อมูลเสร็จสิ้น");</script>';
}
    */
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

        .custom-background {
            background-color: #ffff; 
            border-radius: 10px; 
            padding: 20px;
            max-width: 350px; 
            margin: auto;
            text-align: center;
        }
        .custom-background img {
            max-width: 100%; 
            border-radius: 10px; 
        }

    </style>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="form-container">
                    <h3 class="text-center mb-4">แก้ไขข้อมูลส่วนตัว</h3>
                    <form action="personal_pro" method="post">
                        <div class="form-row">

                            <div class="form-column">



                                <div class="mb-3">
                                    <label for="fullName" class="form-label">ชื่อ-นามสกุล</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">แผนก</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="pos" class="form-control" id="position" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="old_password" class="form-label">รหัสผ่านเก่า</label>
                                    <input type="password" class="form-control" id="old_password" placeholder="">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">รหัสผ่านใหม่</label>
                                    <input type="password" class="form-control" id="new_password" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="Confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                                    <input type="password" class="form-control" id="Confirm_password" placeholder="">
                                </div>
                            </div>


                            <div class="form-column">
                                <div class="profile-container">
                                    <h3 class="text-center mb-4">โปรไฟล์</h3>
                                    <div class="profile-img-container  ">
                                        <div class="d-flex "><img src="<?php echo $image_path; ?>" alt="Profile Image" id="profileImage"></div>
                                    </div>
                                    <input type="file" class="form-control" id="profileImageInput" onchange="previewImage()">
                                </div>

                                <div class="container mb-4 mt-3">
                            <div class="custom-background">
                        
                         <img src="../image/300x200.png" alt="Placeholder Image" id="profile img">
                         
                            </div>
                            
                            <input type="file" class="form-control mb-3 mt-3 " id="imageUpload" accept="image/*" onchange="proImage()"> 
                            </div>
                            </div>
                        </div>
                        <div class="mb-3" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn  btn-success w-30">บันทึกข้อมูล</button>
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

        function proImage() {
            const file = document.getElementById("imageUpload").files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById("profile img").src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>