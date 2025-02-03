<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
</head>
<style>
    .container {
        margin-top: 30px;
    }

    .form-container {
        background-color: #ffff; 
        padding: 30px;
        border-radius: 10px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    
    .form-container h2 {
        display: flex;
        justify-content: center;
    }

   
</style>

<body>
<?php
    require('header.php');
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="form-container">
                    <h2>เปลี่ยนรหัสผ่าน</h2>
                    <form action="">

                        <div class="mb-3 mt-3">
                            <label for="old password">รหัสผ่านเก่า:</label>
                            <input type="password" class="form-control" id="old password" placeholder="Enter Old Password" name="old password">
                        </div>

                        <div class="mb-3">
                            <label for="New password">รหัสผ่านใหม่:</label>
                            <input type="password" class="form-control" id="New password" placeholder="Enter New password" name="New password">
                        </div>

                        <div class="mb-3">
                            <label for="New password">ยืนยันรหัสผ่าน:</label>
                            <input type="password" class="form-control" id="New password" placeholder="Enter New password" name="New password">
                        </div>

                        
                        <div style="display: flex; justify-content: center; align-items: center;">
                     <button type="submit" class="btn btn-success d-flex align-items-center">
                         <img src="../image/floppy-fill.svg" alt="" class="me-2"> ยืนยัน
                        </button>
                    </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>