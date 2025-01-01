<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("คำร้องของคุณถูกส่งเรียบร้อยแล้ว กรุณาติดตามสถานะคำร้องของคุณในระบบ");</script>';
     } //elseif ($_GET['status'] == 2) {
    //     echo '<script>alert("แก้ไขข้อมูลเสร็จสิ้น");</script>';
    // }elseif ($_GET['status'] == 3) {
    //     echo '<script>alert("โปรดอัพโหลดไฟล์ png");</script>';
    // }
    // รีไดเรกต์กลับไปที่ personal.php โดยไม่รวมพารามิเตอร์ 'status'
    echo '<script>window.location.href = "form.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าฟอร์มจองใช้งานรถยนต์</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/bootstrap.min.js"></script>

  <style>
    /* 1. Use a more-intuitive box-sizing model */
    *,
    *::before,
    *::after {
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
    img,
    picture,
    video,
    canvas,
    svg {
      display: block;
      max-width: 100%;
    }

    /* 6. Inherit fonts for form controls */
    input,
    button,
    textarea,
    select {
      font: inherit;
    }

    /* 7. Avoid text overflows */
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      overflow-wrap: break-word;
    }

    /* 8. Improve line wrapping */
    p {
      text-wrap: pretty;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      text-wrap: balance;
    }

    /*
    9. Create a root stacking context
  */
    #root,
    #__next {
      isolation: isolate;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    /* สไตล์ Header */



    section {
      min-height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;

    }

    .container {
      background-color: #ffff;
      max-width: 880px;
      width: 100%;
      padding: 30px;
      margin: 15px;
      min-height: 680px;
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
  <?php
  require('header.php');
  ?>

  <section>
    <form action="form_pro.php" method="POST">
      <div class="container mt-5">
        <div class="row">
          <header>ขออนุญาตใช้รถส่วนกลาง (แบบที่1)</header>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
            <label for="fullname" class="form-label">ชื่อสกุล</label>
            <input type="text" id="fullname" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" disabled>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6  mt-3">
            <label for="position" class="form-label">ตำแหน่ง</label>
            <input type="text" id="position" class="form-control" value="<?php echo $_SESSION['position']; ?>" disabled>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6  mt-3">
            <label for="destination" class="form-label">สถานที่</label>
            <input type="text" name="destination" id="destination" class="form-control" placeholder="ชื่อสถานที่" require>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
            <label for="province" class="form-label">จังหวัด</label>
            <select name="province" id="province" class="form-control" required>
              <option value="" selected disabled>เลือกจังหวัด</option>
              <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
              <option value="กระบี่">กระบี่</option>
              <option value="กาญจนบุรี">กาญจนบุรี</option>
              <option value="กาฬสินธุ์">กาฬสินธุ์</option>
              <option value="กำแพงเพชร">กำแพงเพชร</option>
              <option value="ขอนแก่น">ขอนแก่น</option>
              <option value="จันทบุรี">จันทบุรี</option>
              <option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
              <option value="ชลบุรี">ชลบุรี</option>
              <option value="ชัยนาท">ชัยนาท</option>
              <option value="ชัยภูมิ">ชัยภูมิ</option>
              <option value="ชุมพร">ชุมพร</option>
              <option value="เชียงราย">เชียงราย</option>
              <option value="เชียงใหม่">เชียงใหม่</option>
              <option value="ตรัง">ตรัง</option>
              <option value="ตราด">ตราด</option>
              <option value="ตาก">ตาก</option>
              <option value="นครนายก">นครนายก</option>
              <option value="นครปฐม">นครปฐม</option>
              <option value="นครพนม">นครพนม</option>
              <option value="นครราชสีมา">นครราชสีมา</option>
              <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
              <option value="นครสวรรค์">นครสวรรค์</option>
              <option value="นนทบุรี">นนทบุรี</option>
              <option value="นราธิวาส">นราธิวาส</option>
              <option value="น่าน">น่าน</option>
              <option value="บุรีรัมย์">บุรีรัมย์</option>
              <option value="บึงกาฬ">บึงกาฬ</option>
              <option value="ปทุมธานี">ปทุมธานี</option>
              <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
              <option value="ปราจีนบุรี">ปราจีนบุรี</option>
              <option value="ปัตตานี">ปัตตานี</option>
              <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
              <option value="พะเยา">พะเยา</option>
              <option value="พังงา">พังงา</option>
              <option value="พัทลุง">พัทลุง</option>
              <option value="พิจิตร">พิจิตร</option>
              <option value="พิษณุโลก">พิษณุโลก</option>
              <option value="เพชรบุรี">เพชรบุรี</option>
              <option value="เพชรบูรณ์">เพชรบูรณ์</option>
              <option value="แพร่">แพร่</option>
              <option value="ภูเก็ต">ภูเก็ต</option>
              <option value="มหาสารคาม">มหาสารคาม</option>
              <option value="มุกดาหาร">มุกดาหาร</option>
              <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
              <option value="ยโสธร">ยโสธร</option>
              <option value="ยะลา">ยะลา</option>
              <option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
              <option value="ระนอง">ระนอง</option>
              <option value="ระยอง">ระยอง</option>
              <option value="ราชบุรี">ราชบุรี</option>
              <option value="ลพบุรี">ลพบุรี</option>
              <option value="ลำปาง">ลำปาง</option>
              <option value="ลำพูน">ลำพูน</option>
              <option value="เลย">เลย</option>
              <option value="ศรีสะเกษ">ศรีสะเกษ</option>
              <option value="สกลนคร">สกลนคร</option>
              <option value="สงขลา">สงขลา</option>
              <option value="สตูล">สตูล</option>
              <option value="สมุทรปราการ">สมุทรปราการ</option>
              <option value="สมุทรสงคราม">สมุทรสงคราม</option>
              <option value="สมุทรสาคร">สมุทรสาคร</option>
              <option value="สระแก้ว">สระแก้ว</option>
              <option value="สระบุรี">สระบุรี</option>
              <option value="สิงห์บุรี">สิงห์บุรี</option>
              <option value="สุโขทัย">สุโขทัย</option>
              <option value="สุพรรณบุรี">สุพรรณบุรี</option>
              <option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
              <option value="สุรินทร์">สุรินทร์</option>
              <option value="หนองคาย">หนองคาย</option>
              <option value="หนองบัวลำภู">หนองบัวลำภู</option>
              <option value="อ่างทอง">อ่างทอง</option>
              <option value="อุดรธานี">อุดรธานี</option>
              <option value="อุตรดิตถ์">อุตรดิตถ์</option>
              <option value="อุทัยธานี">อุทัยธานี</option>
              <option value="อุบลราชธานี">อุบลราชธานี</option>
              <option value="อำนาจเจริญ">อำนาจเจริญ</option>
            </select>
          </div>

          <div class="col-12 mt-2">
            <label for="purpose" class="form-label">วัตถุประสงค์ของการเดินทาง</label>
            <input type="text" name="purpose" id="purpose" class="form-control" placeholder="กรุณาระบุวัตถุประสงค์ เช่น เข้าร่วมประชุม" required>
          </div>


          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
            <label for="departure_date" class="form-label">ออกเดินทางวันที่</label>
            <input type="date" name="departure_date" id="departure_date" class="form-control" require>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
            <label for="departure_time" class="form-label">ออกเดินทางเวลา</label>
            <input type="time" name="departure_time" id="departure_time" class="form-control" require>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
            <label for="return_date" class="form-label">กลับจากเดินทางวันที่</label>
            <input type="date" name="return_date" id="return_date" class="form-control" require>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
            <label for="return_time" class="form-label">กลับจากเดินทางเวลา</label>
            <input type="time" name="return_time" id="return_time" class="form-control" require>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
            <label for="passengers" class="form-label">ผู้คน</label>
            <input type="number" name="passengers" id="passengers" class="form-control" placeholder="กี่คน" required>
          </div>

          <!--<div class="col-12 col-sm-12 col-md-6 col-lg-6  mt-3">
            <label for="Budget" class="form-label">งบประมาณ</label>
            <input type="text" id="position" class="form-control" placeholder="งบประมาณ" require>
          </div>-->
          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>

        </div>
    </form>
  </section>


</body>

</html>