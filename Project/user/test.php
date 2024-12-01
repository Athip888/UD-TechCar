<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Bootstrap 5</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>

    <style>
    .container {
      background: #eee;
      margin-top: 50px;
    }
    table {
      margin-top: 30px;
    }
  </style>
</head>
<body>

 <!-- <div class="container">
    <h2>ฟอร์มบันทึกข้อมูล</h2>
    <form id="">
      <div class="mb-3">
        <label for="name" class="form-label">ชื่อ</label>
        <input type="text" class="form-control" id="name" placeholder="กรุณากรอกชื่อ" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">อีเมล์</label>
        <input type="email" class="form-control" id="email" placeholder="กรุณากรอกอีเมล์" required>
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">อายุ</label>
        <input type="number" class="form-control" id="age" placeholder="กรุณากรอกอายุ" required>
      </div>
      <button type="button" class="btn btn-primary" id="saveBtn">บันทึกข้อมูล</button>
    </form> -->

    <h3 class="mt-4">ข้อมูลที่บันทึก</h3>
    <table class="table table-striped" id="dataTable">
      <thead>
        <tr>
          <th>ชื่อ</th>
          <th>ตำแหน่ง</th>
          <th>ขออนุญาติใช้</th>
          <th>เพื่อ</th>
          <th>ออกเดินทางวันที่</th>
          <th>ออกเดินทางเวลา</th>
          <th>กลับจากเดินทางวันที่</th>
          <th>กลับจากเดินทางเวลา</th>
          <th>คน</th>
        </tr>
      </thead>
      <tbody>
        <!-- ข้อมูลที่จะแสดงที่นี่ -->
      </tbody>
    </table>
  </div>

  
  <script>
    // ฟังก์ชั่นบันทึกข้อมูล
    document.getElementById('saveBtn').addEventListener('click', function() {
      // ดึงค่าจากฟอร์ม
      var fullname = document.getElementById('fullname').value;
      var position = document.getElementById('position').value;
      var destination = document.getElementById('destination').value;
      var purpose = document.getElementById('purpose').value;
      var departure_date = document.getElementById('departure_date').value;
      var departure_time = document.getElementById('departure_time').value;
      var return_date = document.getElementById('return_date').value;
      var return_time = document.getElementById('return_time').value;
      var passenger_count = document.getElementById('passenger_count').value;

      // ตรวจสอบข้อมูลที่กรอก
      if (fullname && position && destination && purpose && departure_date && departure_time 
        && return_date && return_time && passenger_count)  {
        // สร้างแถวใหม่ในตาราง
        var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        var newRow = table.insertRow();

        // สร้างเซลล์และใส่ข้อมูล
        newRow.insertCell(0).textContent = fullname;
        newRow.insertCell(1).textContent = position;
        newRow.insertCell(2).textContent = destination;
        newRow.insertCell(3).textContent = purpose;
        newRow.insertCell(4).textContent = departure_date;
        newRow.insertCell(5).textContent = departure_time;
        newRow.insertCell(6).textContent = return_date;
        newRow.insertCell(7).textContent = return_time;
        newRow.insertCell(8).textContent = passenger_count;

        // เคลียร์ฟอร์มหลังบันทึก
        document.getElementById('dataForm');
      } else {
        alert('กรุณากรอกข้อมูลให้ครบถ้วน!');
      }
    });
  </script>
</body>
</html>