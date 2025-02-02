
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
       .calendar {
    margin: 20px auto;
    background-color: #ffff; 
    border-radius: 10px; 
    padding: 20px; 
    max-width: 1200px;
    font-size: 1.2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 0px 4px rgba(0, 0, 0, 0.3);
}

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .calendar-grid {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .day-header {
            background-color: #f4f4f4;
            width: 14.28%;
            text-align: center;
            font-weight: bold;
        }

        .calendar-days {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            width: 100%;
        }

     .day,
        .empty-day {
            border: 1px solid #ddd; /* เส้นกรอบบางสีเทา */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100px; 
            width: calc(100% / 7);
            font-weight: bold;
            box-sizing: border-box;
        }   

    .day:hover {
        cursor: pointer;
        background-color: #f0f0f0;
        border-color: #aaa; /* เปลี่ยนสีเส้นกรอบเมื่อวางเมาส์ */
     }


        .empty-day {
            background-color: #f9f9f9;
            
        }

    </style>
</head>

<body>

<?php
require('headadmin.php');
?>

    <?php
    // Include the database connection
    // Fetch approved requests
    $query = "SELECT request_id, destination, province, travel_type, purpose, departure_date, departure_time, return_date, return_time, passengers, request_date, status, user_id FROM requests WHERE status = 'อนุมัติ'";
    $result = mysqli_query($connect, $query);

    $requests = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $requests[] = $row;
    }

    // Close the connection
    mysqli_close($connect);
    ?>

    <div class="container mt-5">
        <div class="calendar">
            <div class="calendar-header">
                <button class="btn btn-primary" id="prevMonth">&lt; Previous</button>
                <h3 id="monthYear"></h3>
                <button class="btn btn-primary" id="nextMonth">Next &gt;</button>
            </div>
            <div class="calendar-grid">
                <div class="day-header">อาทิตย์</div>
                <div class="day-header">จันทร์</div>
                <div class="day-header">อังคาร</div>
                <div class="day-header">พุธ</div>
                <div class="day-header">พฤหัสบดี</div>
                <div class="day-header">ศุกร์</div>
                <div class="day-header">เสาร์</div>
            </div>
            <div class="calendar-days" id="calendarDays"></div>
        </div>
    </div>

    <script>
        const requests = <?php echo json_encode($requests); ?>;
        const calendarDays = document.getElementById('calendarDays');
        const monthYear = document.getElementById('monthYear');
        const prevMonth = document.getElementById('prevMonth');
        const nextMonth = document.getElementById('nextMonth');

        let currentDate = new Date();

       
        function getDatesInRange(startDate, endDate) {
            const dates = [];
            let currentDate = new Date(startDate);
            const lastDate = new Date(endDate);

            while (currentDate <= lastDate) {
                dates.push(currentDate.toISOString().split('T')[0]);
                currentDate.setDate(currentDate.getDate() + 1);
            }

            return dates;
        }

        function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

const requestColors = {};

function renderCalendar() {
    const year = currentDate.getFullYear(); // ปี ค.ศ.
    const thaiYear = year + 543; // คำนวณปี พ.ศ.
    const month = currentDate.getMonth();

    monthYear.textContent = `${currentDate.toLocaleString('th-TH', { month: 'long' })} ${thaiYear}`; // แสดงเดือนและปีไทย

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    calendarDays.innerHTML = '';

    // วนลูปเพิ่มช่องว่างก่อนวันที่ 1 ของเดือน
    for (let i = 0; i < firstDay; i++) {
        calendarDays.innerHTML += '<div class="empty-day"></div>';
    }

    // วนลูปแสดงวันของเดือน
    for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const dayElement = document.createElement('div');
        dayElement.className = 'day';
        dayElement.innerHTML = `<strong>${day}</strong>`;

        // เช็คว่ามีคำขอในวันนั้นหรือไม่
        const dayRequests = requests.filter(request => {
            const datesInRange = getDatesInRange(request.departure_date, request.return_date);
            return datesInRange.includes(dateStr);
        });

        dayRequests.forEach(request => {
            if (!requestColors[request.request_id]) {
                requestColors[request.request_id] = getRandomColor();
            }

            const requestColor = requestColors[request.request_id];

            const requestInfo = document.createElement('a');
            requestInfo.href = `edit_status.php?request_id=${request.request_id}`;
            requestInfo.textContent = "จองแล้ว";
            requestInfo.style.fontSize = '0.8rem';
            requestInfo.style.textDecoration = 'none';
            requestInfo.style.color = 'black';
            requestInfo.style.border = '1px solid black';
            requestInfo.style.padding = '5px';
            requestInfo.style.marginTop = '4px';
            requestInfo.style.display = 'block';
            requestInfo.style.backgroundColor = requestColor;

            dayElement.appendChild(requestInfo);
        });

        calendarDays.appendChild(dayElement);
    }

    // ปรับให้สัปดาห์สมบูรณ์ (7 วันต่อสัปดาห์)
    const totalCells = firstDay + daysInMonth;
    const totalRows = Math.ceil(totalCells / 7);

    for (let i = totalCells; i < totalRows * 7; i++) {
        calendarDays.innerHTML += '<div class="empty-day"></div>';
    }
}




        prevMonth.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextMonth.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
    </script>

</body>

</html>