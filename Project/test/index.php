<?php
if (isset($_GET['status']) && $_GET['status'] == 1) {
    echo '<script>alert("อัพโหลดไฟล์ของคุณก่อน!");</script>';
}elseif (isset($_GET['status']) && $_GET['status'] == 2) {
    echo '<script>alert("โปรดอัพโหลดไฟล์ เช่น jpeg,png");</script>';
}elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo '<script>alert("แก้ไขข้อมูลเสร็จสิ้น");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="upload1.php" method="post" enctype="multipart/form-data">
    <label for="file">Select file to upload:</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Upload</button>
</form>
</body>
</html>