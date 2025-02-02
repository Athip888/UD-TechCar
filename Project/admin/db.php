<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js" defer></script>

    <style>
       .stat-box {
    border-radius: 12px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    padding: 15px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    flex-direction: row-reverse; /* Move the icon to the right */
}

.stat-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.stat-box .icon {
    font-size: 2rem;
    opacity: 0.8;
    margin-left: 15px; /* Adjust the margin to create space on the left */
}

.stat-box .icon img {
    width: 40px;
    height: 40px;
    object-fit: cover;
}

.stat-box .details {
    text-align: left; /* Align text to the left */
}

.stat-box .details h3 {
    font-size: 1.5rem;
    margin: 0;
}

.stat-box .details span {
    font-size: 0.9rem;
    opacity: 0.8;
}

        .chart-container {
            border-radius: 12px;
            padding: 15px;
            background: white;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            font-size: 0.9rem;
        }
        #bookingChart {
        width: 100%; /* กำหนดความกว้างให้เต็ม container */
        max-width: 450px; /* กำหนดขนาดสูงสุด */
        height: 300px; /* กำหนดความสูง */
        margin: 0 auto; /* จัดกึ่งกลาง */
    }

    </style>
</head>
<body>
    <?php 
    require('headadmin.php'); 
    ?>

    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="stat-box">
                    <div class="icon">
                        <img src="../image/people-fill.svg" alt="User Icon">
                    </div>
                    <div class="details">
                        <h3>0</h3>
                        <span>ผู้ใช้งาน</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box" style="background: linear-gradient(135deg, #17a2b8, #0d6efd);">
                    <div class="icon">
                        <img src="../image/cart-check-fill.svg" alt="Booking Icon">
                    </div>
                    <div class="details">
                        <h3>0</h3>
                        <span>จำนวนการจอง</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box" style="background: linear-gradient(135deg, #ffc107, #ff8c00);">
                    <div class="icon">
                        <img src="../image/bus-front-fill.svg" alt="Car Icon">
                    </div>
                    <div class="details">
                        <h3>0</h3>
                        <span>รถยนต์พร้อมใช้งาน</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box" style="background: linear-gradient(135deg, #dc3545, #b30000);">
                    <div class="icon">
                        <img src="../image/bus-front.svg" alt="Car Not Ready Icon">
                    </div>
                    <div class="details">
                        <h3>0</h3>
                        <span>รถยนต์ไม่พร้อมใช้งาน</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart-container mt-4">
            <h2>สถานะการจองวันนี้</h2>
            <canvas id="bookingChart"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // ข้อมูลที่ได้จาก PHP
            const bookingData = {
                approved: <?php echo 3; ?>,
                denied: <?php echo 2; ?>,
                pending: <?php echo 5; ?>,
                online: <?php echo 5; ?>
            };

            // การตั้งค่ากราฟ
            const ctx = document.getElementById('bookingChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['อนุมัติ', 'ปฏิเสธ', 'รออนุมัติ', 'ออนไลน์'],
                    datasets: [{
                        label: 'สถานะการจอง',
                        data: [bookingData.approved, bookingData.denied, bookingData.pending, bookingData.online,],
                        backgroundColor: [
                            '#0000FF', // อนุมัติ (สีเขียว)
                            '#F44336', // ปฏิเสธ (สีแดง)
                            '#FFC107',  // รออนุมัติ (สีเหลือง)
                            '#8e44ad'// ออนไลน์ (ม่วง)
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
