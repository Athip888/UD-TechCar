<?php
// request_details.php
require('header.php');

// Get the request ID from the URL
$request_id = mysqli_real_escape_string($connect, $_GET['request_id']);

// Fetch the request details
$sql = "SELECT requests.request_id, 
                requests.user_id,
                users.fullname,
                users.position,
                requests.destination,
                requests.province,
                requests.departure_date,
                requests.departure_time,
                requests.return_date,
                requests.return_time,
                requests.status,
                requests.travel_type,
                requests.purpose,
                requests.passengers
        FROM requests 
        JOIN users ON requests.user_id = users.user_id
        WHERE requests.request_id = '$request_id'";
$result = mysqli_query($connect, $sql);

$request = mysqli_fetch_assoc($result);

// Close the connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
    body {
        margin: 0;
        background-color: #f8f9fa; /* สีพื้นหลัง */
        font-family: Arial, sans-serif;
    }

    header {
        padding: 20px;
        background-color: #007bff;
        color: white;
        text-align: center;
    }

    .container-wrapper {
        display: flex;
        justify-content: center; /* จัดให้อยู่ตรงกลางแนวนอน */
        align-items: center; /* จัดให้อยู่ตรงกลางแนวตั้ง */
        min-height: calc(100vh - 80px); /* ลดความสูงของ header (80px เป็นตัวอย่าง) */
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 600px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.1);
        background-color: #ffff;
        border-radius: 8px;
        text-align: left;
    }

    .btn-secondary {
        margin-top: 20px;
    }
</style>

</head>
<body>
<div class="container-wrapper">
<div class="container">
    <h1>Request Details</h1>
    <p><strong>Destination:</strong> <?php echo htmlspecialchars($request['destination']); ?></p>
    <p><strong>Province:</strong> <?php echo htmlspecialchars($request['province']); ?></p>
    <p><strong>Travel Type:</strong> <?php echo htmlspecialchars($request['travel_type']); ?></p>
    <p><strong>Purpose:</strong> <?php echo htmlspecialchars($request['purpose']); ?></p>
    <p><strong>Departure Date:</strong> <?php echo htmlspecialchars($request['departure_date']); ?></p>
    <p><strong>Departure Time:</strong> <?php echo htmlspecialchars($request['departure_time']); ?></p>
    <p><strong>Return Date:</strong> <?php echo htmlspecialchars($request['return_date']); ?></p>
    <p><strong>Return Time:</strong> <?php echo htmlspecialchars($request['return_time']); ?></p>
    <p><strong>Passengers:</strong> <?php echo htmlspecialchars($request['passengers']); ?></p>
    <p><strong>User ID:</strong> <?php echo htmlspecialchars($request['user_id']); ?></p>
    <a href="javascript:history.back()" class="btn btn-secondary">กลับ</a>
    <a href="javascript:history.back()" class="btn btn-secondary">พิมพ์</a>
</div>
</div>
</body>
</html>
