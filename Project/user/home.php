<?php
session_start();
require("../config/dbconnect.php");
if (!isset($_SESSION['user_id']) or !isset($_SESSION['role'])) {
  die(header('Location: index.html'));
} else {
  $fullname = $_SESSION['fullname'];
  $position = $_SESSION['position'];
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
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/bootstrap.min.js"></script>
  
<style>
  /* 1. Use a more-intuitive box-sizing model */
*, *::before, *::after {
    box-sizing: border-box;
  }
  
  /* 2. Remove default margin */
  * {
    margin: 0;
  }
  
  body {
    /* 3. Add accessible line-height */
    line-height: 1.5;
    /* 4. Improve text rendering */
    -webkit-font-smoothing: antialiased;
  }
  
  /* 5. Improve media defaults */
  img, picture, video, canvas, svg {
    display: block;
    max-width: 100%;
  }
  
  /* 6. Inherit fonts for form controls */
  input, button, textarea, select {
    font: inherit;
  }
  
  /* 7. Avoid text overflows */
  p, h1, h2, h3, h4, h5, h6 {
    overflow-wrap: break-word;
  }
  
  /* 8. Improve line wrapping */
  p {
    text-wrap: pretty;
  }
  h1, h2, h3, h4, h5, h6 {
    text-wrap: balance;
  }
  
  /*
    9. Create a root stacking context
  */
  #root, #__next {
    isolation: isolate;
  }

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
    left: -300px;  /* ซ่อน Sidebar */
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
    color: #4190f7; /* สีฟ้าเริ่มต้น */
    text-decoration: none;
    display: flex;
    align-items: center; /* ให้อักษรอยู่ตรงกลาง */
    padding: 5px; /* เพิ่มพื้นที่ด้านใน */
    transition: all 0.3s ease; /* การเปลี่ยนแปลงที่นุ่มนวล */
  }
  
  /* เมื่อมีการ hover ลิงค์ */
  .sidebar ul li a:hover {
    background-color: #086af8; /* เปลี่ยนสีพื้นหลังเป็นฟ้าเข้ม */
    color: #ffffff; /* เปลี่ยนสีตัวอักษรเป็นขาว */
    width: 85%;
    height: 200%;
    border-radius: 5px; /* ทำให้มุมโค้ง */
    padding-left: 20px; /* เพิ่มพื้นที่ทางซ้ายเมื่อ hover */
  }
  

  /* เนื้อหาหลัก */
  .main-content {
    margin-left: 0;
    padding: 20px;
    transition: margin-left 0.3s;
  }

  .sidebar.open {
    left: 0; /* เปิด Sidebar */
  }

  .main-content.shift {
    margin-left: 250px; /* เลื่อนเนื้อหาหลักไปทางขวาเมื่อ Sidebar เปิด */
    
  }


  section {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;

  }
  .container{
    background-color: #ffff;
    max-width: 880px;
    width: 100%;
    padding: 30px;
    margin: 15px;
    min-height: 680px ;
    border-radius: 6px;
    box-shadow: 4px 4px 14px rgba(0, 0, 0, 0.13);
  }
  .container header {
    font-size: 26px;
    font-weight: 600;
    text-align: center;
  }

 


</style>
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
    <h3>Menu</h3>
    <button class="close-btn" onclick="closeSidebar()">×</button><br><br>

    <ul>
      <p>แบบบันทึกข้อมูล</p>
      <li><a href="#"><img src="/image/calendar-date-fill.svg" alt="">ปฎิทินการใช้รถ</a></li>
      <li><a href="#"><img src="/image/car-front-fill.svg" alt="">ขออนุญาตใช้รถส่วนกลาง</a></li>
      <li><a href="#"><img src="/image/check-circle-fill.svg" alt="">ติดตามสถานะ</a></li>
      <li><a href="#"><img src="/image/telephone-fill.svg" alt="">ติดต่อเรา</a></li>
    </ul>
  </aside>

  <section>
    <div class="container mt-5">
      <div class="row">
        <header>ขออนุญาตใช้รถส่วนกลาง (แบบที่1)</header>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
              <label for="" class="form-label">ชื่อสกุล</label>
              <input type="text" name="" id="" class="form-control" value="<?php echo $fullname; ?>" >
          </div>

              <div class="col-12 col-sm-12 col-md-6 col-lg-6  mt-3">
                  <label for="" class="form-label">ตำแหน่ง</label>
                  <input type="text" name="" id="" class="form-control" value="<?php echo $position; ?>">
              </div>

              <div class="col-12  mt-2">
                  <label for="" class="form-label">ขออนุญาติใช้ (ไปที่ไหน)</label>
                  <input type="text" name="" id="" class="form-control" placeholder="ขออนุญาติใช้">
              </div>

              <div class="col-12 mt-2">
                  <label for="" class="form-label">เพื่อ</label>
                  <input type="text" name="" id="" class="form-control" placeholder="เพื่อ">
              </div>

              <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                  <label for="" class="form-label">ออกเดินทางวันที่</label>
                  <input type="date" name="" id="" class="form-control" placeholder="ชื่อสกุล">
              </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                      <label for="" class="form-label">ออดเดินทางเวลา</label>
                      <input type="time" name="" id="" class="form-control" placeholder="ตำแหน่ง">
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                    <label for="" class="form-label">ออกเดินทางวันที่</label>
                    <input type="date" name="" id="" class="form-control" placeholder="ชื่อสกุล">
                </div>
  
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                        <label for="" class="form-label">ออดเดินทางเวลา</label>
                        <input type="time" name="" id="" class="form-control" placeholder="ตำแหน่ง">
                    </div>

                  <div class="col-12 mt-2">
                      <label for="" class="form-label">มีคนนั่ง[คน]</label>
                      <input type="text" name="" id="" class="form-control" placeholder="มีคนนั่ง">
                  </div>
                 <div class="d-flex justify-content-center mt-4"><button type="button" class="btn btn-success ">บันทึก</button></div>
      </div>
  </div>
    
  </section>


</body>

</html>