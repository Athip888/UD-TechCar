<?php
require("headadmin.php");

// รับค่า user_id จาก URL
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

// ตรวจสอบว่ามี user_id หรือไม่
if (empty($user_id)) {
    echo "<script>alert('ไม่พบข้อมูลผู้ใช้!'); window.location.href='manage_users.php';</script>";
    exit;
}

// ค้นหาข้อมูลผู้ใช้จากฐานข้อมูล
$sql = "SELECT * FROM users WHERE user_id = '" . mysqli_real_escape_string($connect, $user_id) . "'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('ไม่พบข้อมูลผู้ใช้!'); window.location.href='manage_users.php';</script>";
    exit;
}

// อัปเดตข้อมูลผู้ใช้
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
    $position = mysqli_real_escape_string($connect, $_POST['position']);
    $department = mysqli_real_escape_string($connect, $_POST['department']);
    $role = mysqli_real_escape_string($connect, $_POST['role']);

    // ตรวจสอบว่ามีการเปลี่ยนรหัสผ่านหรือไม่
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $update_sql = "UPDATE users SET fullname = '$fullname', position = '$position', department = '$department', role = '$role', password = '$password' WHERE user_id = '" . mysqli_real_escape_string($connect, $user_id) . "'";
    } else {
        $update_sql = "UPDATE users SET fullname = '$fullname', position = '$position', department = '$department', role = '$role' WHERE user_id = '" . mysqli_real_escape_string($connect, $user_id) . "'";
    }

    if (mysqli_query($connect, $update_sql)) {
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ!'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลผู้ใช้</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container py-5">
    <div class="form-container shadow-sm p-4">
        <h3 class="text-center mb-4">แก้ไขข้อมูลผู้ใช้</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="userId" class="form-label">รหัสผู้ใช้</label>
                <input type="text" class="form-control" id="userId" name="userId" value="<?php echo htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8'); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">ตำแหน่ง</label>
                <input type="text" class="form-control" id="position" name="position" value="<?php echo htmlspecialchars($user['position'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">แผนก</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo htmlspecialchars($user['department'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">ประเภท</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="user" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>ผู้ใช้</option>
                    <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>ผู้ดูแลระบบ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่านใหม่ (ถ้าต้องการเปลี่ยน)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="ปล่อยว่างหากไม่ต้องการเปลี่ยนรหัสผ่าน">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                <a href="manage_users.php" class="btn btn-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connect);
?>
