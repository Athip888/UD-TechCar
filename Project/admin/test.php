<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
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
    }

    .stat-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .stat-box .icon {
        font-size: 2rem;
        opacity: 0.8;
        margin-right: 15px;
    }

    .stat-box .icon img {
        width: 40px;
        height: 40px;
        object-fit: cover;
    }

    .stat-box .details {
        text-align: right;
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
</style>
</head>
<body>
    <?php 
    require('headadmin.php');
     ?>

    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="stat-box" style="background: linear-gradient(135deg, #007bff, #0056b3);">
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

        
        <div class="mt-4 chart-container">
            <h6 class="mb-3">สถิติ</h6>
            <canvas id="trafficChart"></canvas>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script>
        const ctx = document.getElementById('trafficChart').getContext('2d');
        const trafficChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label: 'Users',
                        data: [0, 0, 0, 0, 0, 0, 0],
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
