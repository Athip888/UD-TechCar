<?php
session_start();
require('../config/dbconnect.php');

$profile_picture = $_SESSION['profile_picture'];
$image_path = "../user_image/" . $profile_picture;

//$signature_picture = $_SESSION['signature'];
//$signature_path = "../user_signature/" . $signature_picture;
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
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    /* สไตล์ Header */
    .header {
      height: 65px;
      background-color: #4190f7;
      color: rgb(255, 255, 255);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.4);
    }



    .toggle-btn {
      background-color: #4190f7;
      color: white;
      border: none;
      font-size: 30px;
      cursor: pointer;
      padding: 10px 20px;
      border-radius: 5px;
      transition: all 0.3s ease;

    }

    .toggle-btn:hover {
      background-color: #086af8;
      transform: scale(0.9);
    }

    .toggle-btn:active {
      transform: scale(0.95);
      background-color: #ebebeb;
    }


    /* สไตล์ Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: -300px;
      /* ซ่อน Sidebar */
      width: 280px;
      height: 100%;
      background-color: #ffff;
      transition: 0.3s;
      padding-top: 20px;
      padding-left: 20px;
    }

    /* ปุ่มปิด Sidebar (X) */
    .close-btn {
      background-color: transparent;
      color: rgb(0, 0, 0);
      border: none;
      font-size: 36px;
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    .sidebar ul p {
      font-size: 18px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;

    }

    .sidebar ul li {
      padding: 3px;
    }

    .sidebar ul li img {
      padding-right: 5px;

    }

    /* กำหนดสไตล์ของลิงค์ใน Sidebar */
    .sidebar ul li a {
      color: #4190f7;
      /* สีฟ้าเริ่มต้น */
      text-decoration: none;
      display: flex;
      align-items: center;
      /* ให้อักษรอยู่ตรงกลาง */
      padding: 5px;
      /* เพิ่มพื้นที่ด้านใน */
      transition: all 0.3s ease;
      /* การเปลี่ยนแปลงที่นุ่มนวล */
    }

    /* เมื่อมีการ hover ลิงค์ */
    .sidebar ul li a:hover {
      background-color: #086af8;
      /* เปลี่ยนสีพื้นหลังเป็นฟ้าเข้ม */
      color: #ffffff;
      /* เปลี่ยนสีตัวอักษรเป็นขาว */
      width: 85%;
      height: 200%;
      border-radius: 5px;
      /* ทำให้มุมโค้ง */
      padding-left: 20px;
      /* เพิ่มพื้นที่ทางซ้ายเมื่อ hover */
    }


    /* เนื้อหาหลัก */
    .main-content {
      margin-left: 0;
      padding: 20px;
      transition: margin-left 0.3s;
    }

    .sidebar.open {
      left: 0;
      /* เปิด Sidebar */
    }

    .main-content.shift {
      margin-left: 250px;
      /* เลื่อนเนื้อหาหลักไปทางขวาเมื่อ Sidebar เปิด */

    }

    .profile-pic {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .user-info {
      display: flex;
      align-items: center;
    }

    .username {
      font-size: 16px;
      font-weight: bold;
    }
  </style>
  <header class="header">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="profile-login d-flex align-items-center">

      <div class="user-info">
        <img src="<?php echo $image_path; ?>" alt="Profile Picture" class="profile-pic">
        <span class="username" id="username"><?php echo $_SESSION['fullname'] ?></span>
      </div>
    </div>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar">
    <!-- ปุ่มปิด Sidebar -->
    <h3>Menu</h3>
    <button class="close-btn" onclick="closeSidebar()">×</button><br><br>

    <ul>
      <p>แบบบันทึกข้อมูล</p>
      <li><a href="../user/calendar.php"><img src="../image/calendar-date-fill.svg" alt="">ปฎิทินการใช้รถ</a></li>
      <li><a href="admin_status.php"><img src="../image/car-front-fill.svg" alt="">งานนออนุมัติ</a></li>
      <li><a href="admin_userfmt.php"><img src="../image/check-circle-fill.svg" alt="">จัดการสถานะ</a></li>
      <li><a href="adduser.php"><img src="../image/key-fill.svg" alt="">เพิ่มผู้ใช้งาน</a></li>
      <li><a href="Driver.php"><img src="../image/key-fill.svg" alt="">เพิ่มข้อมูลรถยนต์</a></li>
      <li><a href="Driver.php"><img src="../image/key-fill.svg" alt="">คนขับ</a></li>
      <li><a href="admin_persunal.php"><img src="../image/gear-fill.svg" alt="">แก้ไขข้อมูลส่วนตัว</a></li>
      <li><a href="Contact.php"><img src="../image/telephone-fill.svg" alt="">ติดต่อเรา</a></li>
      <li><a href="../logout.php"><img src="../image/door-open-fill.svg" alt="">ออกจากระบบ</a></li>
    </ul>
  </aside>
  <script>
    function toggleSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const mainContent = document.querySelector('.main-content');

      sidebar.classList.toggle('open');
      mainContent.classList.toggle('shift');
    }

    function closeSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const mainContent = document.querySelector('.main-content');

      sidebar.classList.remove('open');
      mainContent.classList.remove('shift');
    }
  </script>
</body>

</html>