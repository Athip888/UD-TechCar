<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ปฏิทินการใช้รถ</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/bootstrap.min.js"></script>
  <style>
    .calendar {
      border: 1px solid #ddd;
      table-layout: fixed; 
      width: 100%; 
    }

    
    .calendar td {
      text-align: center;
      vertical-align: middle;
      height: 80px;
      border: 1px solid #ddd;
    }
    
    .calendar th {
      text-align: center;
      vertical-align: middle;
      height: 20px;
      border: 1px solid #ddd;
    }
   

    .highlight {
      background-color: #fff3cd;
    }

    .notes {
      color: #007bff;
      font-size: 0.9rem; 
    }
  </style>
</head>

<body>

    <?php
require("headadmin.php");
?>

  <div class="container mt-5 ">
    <h4>ปฏิทินการใช้รถ</h4>
    <div class="god bg-white">
      <div class="card-header d-flex justify-content-between align-items-center bg-white"> 
        <div>ปฏิทินการใช้รถ</div>
        <div>
          <button class="btn btn-outline-primary btn-sm">เฉพาะรถที่ต้องการ</button>
          <button class="btn btn-outline-primary btn-sm">แสดงรถทุกคัน</button>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <button class="btn btn-secondary btn-sm" id="prevMonth">«</button>
          <h5 id="currentMonth">มกราคม 2568</h5>
          <button class="btn btn-secondary btn-sm" id="nextMonth">»</button>
        </div>
        <table class="calendar">
          <thead>
            <tr>
              <th>อา.</th>
              <th>จ.</th>
              <th>อ.</th>
              <th>พ.</th>
              <th>พฤ.</th>
              <th>ศ.</th>
              <th>ส.</th>
            </tr>
          </thead>
          <tbody id="calendarBody">
           
          </tbody>
        </table>
        <p class="text-center mt-3" id="noReservations">*** ไม่มีรายการจองใช้รถประจำเดือนนี้ ***</p>
      </div>
    </div>
  </div>
 
  <script>

    
    const monthNames = [
      "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
      "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];
    const currentMonthEl = document.getElementById("currentMonth");
    const calendarBody = document.getElementById("calendarBody");

    let currentDate = new Date(2025, 0, 1);

    function updateCalendar() {
      const year = currentDate.getFullYear();
      const month = currentDate.getMonth();

 
      currentMonthEl.textContent = `${monthNames[month]} ${year + 543}`;

     
      calendarBody.innerHTML = "";

     
      const firstDay = new Date(year, month, 1).getDay();
      const daysInMonth = new Date(year, month + 1, 0).getDate();

      let dayCount = 1;

      for (let i = 0; i < 6; i++) {
        const row = document.createElement("tr");

        for (let j = 0; j < 7; j++) {
          const cell = document.createElement("td");

          if (i === 0 && j < firstDay) {
            // ช่องว่างก่อนวันที่ 1
            cell.textContent = "";
          } else if (dayCount > daysInMonth) {
            // ช่องว่างหลังวันสุดท้ายของเดือน
            cell.textContent = "";
          } else {
            cell.textContent = dayCount;
            // เพิ่มบันทึกวันที่พิเศษ
            if (month === 0 && dayCount === 1) {
         cell.innerHTML += `<br><a href="#" class="notes">วันปีใหม่</a>`;
          } else if (month === 0 && dayCount === 16) {
           cell.innerHTML += `<br><a href="#" class="notes">วันครู</a>`;
          }

            dayCount++;
          }

          row.appendChild(cell);
        }

        calendarBody.appendChild(row);

        // หยุดหากวันครบเดือน
        if (dayCount > daysInMonth) break;
      }
    }
    
    document.addEventListener("click", (e) => {
    if (e.target.classList.contains("notes")) {
    e.preventDefault();
    alert(`คุณคลิกที่ ${e.target.textContent}`);
  }
});

    document.getElementById("prevMonth").addEventListener("click", () => {
      currentDate.setMonth(currentDate.getMonth() - 1);
      updateCalendar();
    });

    document.getElementById("nextMonth").addEventListener("click", () => {
      currentDate.setMonth(currentDate.getMonth() + 1);
      updateCalendar();
    });

    // เรียกใช้ฟังก์ชันเพื่อแสดงปฏิทินเริ่มต้น
    updateCalendar();
  </script>
</body>

</html>
