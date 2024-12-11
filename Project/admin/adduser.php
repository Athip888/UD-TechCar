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
    
    <script src='alertadduser.js'></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    
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
    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #e6f2ff; /* สีฟ้าอ่อน */
    font-family: Arial, sans-serif;
}

/* Form container styling */
.form-container {
    background-color: #f7f7f7; /* สีเทาอ่อน */
    padding: 25px;
    width: 320px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    font-size: 24px;
    color: #333333;
    margin-bottom: 20px;
}

label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"], input[type="password"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #ffffff;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50; /* สีเขียวอ่อน */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049; /* สีเขียวเข้มขึ้น */
}

button.backred {
    width: 100%;
    padding: 10px;
    background-color: #f44336 !important; /* สีแดง */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}


    </style>

    <script>

    </script>
</body>

</html>