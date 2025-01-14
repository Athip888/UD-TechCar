<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaymac</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .calendar {
            margin: 20px auto;
            max-width: 1000px;
            font-size: 1.2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
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
        .day, .empty-day {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
            width: 14.28%;  /* 7 columns: 100% / 7 = 14.28% */
           
            font-weight: bold;
            box-sizing: border-box;
        }
        .empty-day {
            background-color: #f9f9f9;
        }
        .day:hover {
            cursor: pointer;
            background-color: #f0f0f0;
        }

        

    </style>
</head>
<body>
<?php
    require('header.php');
    ?>
<div class="container">
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
    const calendarDays = document.getElementById('calendarDays');
    const monthYear = document.getElementById('monthYear');
    const prevMonth = document.getElementById('prevMonth');
    const nextMonth = document.getElementById('nextMonth');

    let currentDate = new Date();

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        monthYear.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarDays.innerHTML = '';

        // Empty days for the start of the month
        for (let i = 0; i < firstDay; i++) {
            calendarDays.innerHTML += '<div class="empty-day"></div>';
        }

        // Days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.textContent = day;
            calendarDays.appendChild(dayElement);
        }

        // Ensure the calendar wraps correctly (i.e., each week has 7 days)
        const totalCells = firstDay + daysInMonth;
        const totalRows = Math.ceil(totalCells / 7);

        // Add any remaining empty days after the last day of the month to complete the week
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
