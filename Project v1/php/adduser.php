<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลผู้ใช้</title>
    <link rel="stylesheet" href="adduser.css">
</head>
<body>
    <div class="form-container">
        <form action="adduser_pro.php" method="post">
            <label for="user_id">รหัสพนักงาน:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="prefix">คำนำหน้า:</label>
            <select id="prefix" name="prefix" required>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
            </select>

            <label for="firstname">ชื่อ:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">นามสกุล:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>

            <label for="position">ตำแหน่ง:</label>
            <input type="text" id="position" name="position" required>

            <label for="department">แผนก:</label>
            <input type="text" id="department" name="department" required>

            <label for="role">บทบาท:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="driver">Driver</option>
            </select>

            <button type="submit">บันทึก</button>
        </form>

        <!-- ปุ่มกลับไปหน้าแรก -->
        <a href="../index.html"> 
            <button type="button" class='backred'>กลับไปหน้าแรก</button>
        </a>
    </div>
</body>
</html>
