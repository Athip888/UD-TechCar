<?php
require("headadmin.php");

// ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม (ข้อมูลผู้ใช้หลายคน)
    $user_ids = $_POST['user_id'];
    $fullnames = $_POST['fullname'];
    $positions = $_POST['position'];
    $departments = $_POST['department'];
    $roles = $_POST['role'];
    $passwords = $_POST['password'];

    // ตรวจสอบให้แน่ใจว่าข้อมูลทั้งหมดมีขนาดเท่ากัน
    $num_users = count($user_ids);

    for ($i = 0; $i < $num_users; $i++) {
        // ป้องกัน SQL Injection
        $user_id = mysqli_real_escape_string($connect, $user_ids[$i]);
        $fullname = mysqli_real_escape_string($connect, $fullnames[$i]);
        $position = mysqli_real_escape_string($connect, $positions[$i]);
        $department = mysqli_real_escape_string($connect, $departments[$i]);
        $role = mysqli_real_escape_string($connect, $roles[$i]);
        $password = mysqli_real_escape_string($connect, $passwords[$i]);

        // เข้ารหัสรหัสผ่าน
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL Query สำหรับการเพิ่มข้อมูลผู้ใช้
        $sql = "INSERT INTO users (user_id, fullname, position, department, role, password) 
                VALUES ('$user_id', '$fullname', '$position', '$department', '$role', '$hashed_password')";

        // เพิ่มข้อมูลผู้ใช้ลงฐานข้อมูล
        if (!mysqli_query($connect, $sql)) {
            echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มผู้ใช้งานที่ " . ($i + 1) . "'); window.location.href='add_user.php';</script>";
            exit();
        }
    }

    // ถ้าทำการเพิ่มข้อมูลสำเร็จ
    echo "<script>alert('เพิ่มผู้ใช้งานทั้งหมดสำเร็จ'); window.location.href='manage_users.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มผู้ใช้งานหลายคน</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
       body{
        background-color: #f5f5f5;
       }
    .form-container {
        background-color: #ffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
</style>

</head>

<body>
    <div class="container py-5">
        <div class="form-container shadow-sm bg-white">
            <h3 class="text-center mb-4">เพิ่มผู้ใช้งานหลายคน</h3>
            <form method="POST" action="add_user.php">
                <div id="users-container">
                    <!-- ฟอร์มสำหรับเพิ่มผู้ใช้ใหม่ -->
                    <div class="user-form">
                        <h4>ผู้ใช้ 1</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="user_id" class="form-label">ชื่อเข้าใช้ระบบ</label>
                                <input type="text" class="form-control" name="user_id[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" name="fullname[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="form-label">ตำแหน่ง</label>
                                <input type="text" class="form-control" name="position[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">แผนก</label>
                                <input type="text" class="form-control" name="department[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">ประเภทผู้ใช้</label>
                                <select class="form-select" name="role[]" required>
                                    <option value="user">ผู้ใช้</option>
                                    <option value="admin">ผู้ดูแลระบบ</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password[]" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ปุ่มเพิ่มผู้ใช้งานใหม่ -->
                <button type="button" class="btn btn-secondary mt-3" id="addUserButton">เพิ่มผู้ใช้งานใหม่</button>

                <button type="submit" class="btn btn-primary mt-3">เพิ่มผู้ใช้งานทั้งหมด</button>
            </form>
        </div>
    </div>

    <script>
        // ฟังก์ชันเพิ่มฟอร์มผู้ใช้งานใหม่
        document.getElementById("addUserButton").addEventListener("click", function() {
            const container = document.getElementById("users-container");

            const userCount = container.getElementsByClassName("user-form").length + 1;

            const newUserForm = document.createElement("div");
            newUserForm.classList.add("user-form");

            newUserForm.innerHTML = `
                <h4>ผู้ใช้ ${userCount}</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="user_id" class="form-label">ชื่อเข้าใช้ระบบ</label>
                        <input type="text" class="form-control" name="user_id[]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" name="fullname[]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="position" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" name="position[]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="department" class="form-label">แผนก</label>
                        <input type="text" class="form-control" name="department[]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">ประเภทผู้ใช้</label>
                        <select class="form-select" name="role[]" required>
                            <option value="user">ผู้ใช้</option>
                            <option value="admin">ผู้ดูแลระบบ</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password[]" required>
                    </div>
                </div>
            `;

            container.appendChild(newUserForm);
        });
    </script>
</body>

</html>
