<?php
session_start();
require("../config/dbconnect.php");
if (!isset($_SESSION['user_id']) or !isset($_SESSION['role'])) {
  die(header('Location: index.html'));
} else {
  $prefix = $_SESSION['prefix'];
  $fname = $_SESSION['firstname'];
  $lname = $_SESSION['lastname'];
  $fullname = $prefix . $fname . " " . $lname;
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar Toggle with Close Button</title>
  <link rel="stylesheet" href="home.css">
  <script src="home.js"></script>

</head>

<body>

  <!-- Header -->
  <header class="header">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <?php echo "<h1>$fullname</h1>"; ?>
  </header>

  <!-- Sidebar -->
  <aside class="sidebar">
    <!-- ปุ่มปิด Sidebar -->
    <button class="close-btn" onclick="closeSidebar()">×</button><br><br>

    <ul>
      <p>แบบบันทึกข้อมูล</p>
      <li><a href="#"><img src="/image/calendar-date-fill.svg" alt="">ปฎิทินการใช้รถ</a></li>
      <li><a href="#"><img src="/image/car-front-fill.svg" alt="">ขออนุญาตใช้รถส่วนกลาง</a></li>
      <li><a href="#"><img src="/image/check-circle-fill.svg" alt="">ติดตามสถานะ</a></li>
      <li><a href="#"><img src="/image/telephone-fill.svg" alt="">ติดต่อเรา</a></li>
    </ul>
  </aside>

  <!-- Main content -->
  <main class="main-content">
    <section class="God">
      <!-- เนื้อหาภายในกล่อง -->
      <h2>นี่คือลักษณะของกล่อง</h2>
      <p>เนื้อหาภายในกล่อง</p>
    </section>
  </main>


</body>

</html>