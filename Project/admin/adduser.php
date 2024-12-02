<?php
// session_start();
// if (isset($_SESSION['alertuser']) && $_SESSION['alertuser'] == 1) {
//     //echo "<script>alert('เพิ่มผู้ใช้สำเร็จ!');</script>";
//     //unset($_SESSION['alertuser']); // ลบค่าเมื่อแสดงข้อความเสร็จ
//     echo "<script src='alertadduser.js'></script>";
//     echo "<script>showCustomAlert();</script>";
// }elseif (isset($_SESSION['alertuser']) && $_SESSION['alertuser'] == 0) {
//     echo "<script>alert('มีบัญชีผู้ใช้แล้ว!');</script>";
//     unset($_SESSION['alertuser']); // ลบค่าเมื่อแสดงข้อความเสร็จ
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลผู้ใช้</title>
    <link rel="stylesheet" href="adduser.css">
    <script src='alertadduser.js'></script>
    
</head>

<body>
    <div class="form-container">
        <form action="adduser_pro.php" method="post">
            <label for="user_id">รหัสพนักงาน:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="fullname">ชื่อ นามสกุล:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>

            <label for="position">ตำแหน่ง:</label>
            <input type="text" id="position" name="position" required>

            <label for="department">แผนก:</label>
            <input type="text" id="department" name="department" required>

            <label for="role">บทบาท:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user" selected>User</option>
            </select>

            <button type="submit">บันทึก</button>
        </form>
    </div>
</body>

</html>