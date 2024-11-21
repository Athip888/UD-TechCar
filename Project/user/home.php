

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
  <?php
    require('gayphinit.php');
    ?>

  <section>
    <div class="container mt-5">
      <div class="row">
        <header>ขออนุญาตใช้รถส่วนกลาง (แบบที่1)</header>

          <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
              <label for="" class="form-label">ชื่อสกุล</label>
              <input type="text" name="" id="" class="form-control" placeholder="ชื่อสกุล">
          </div>

              <div class="col-12 col-sm-12 col-md-6 col-lg-6  mt-3">
                  <label for="" class="form-label">ตำแหน่ง</label>
                  <input type="text" name="" id="" class="form-control" placeholder="ตำแหน่ง">
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