<?php
// request_details.php
require('header.php');

// Get the request ID from the URL
$request_id = $_GET['request_id'];

// Fetch the request details
$query = "SELECT * FROM requests WHERE request_id = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, 'i', $request_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$request = mysqli_fetch_assoc($result);

// Close the connection
mysqli_close($connect);

if (!$request) {
    echo "<p>Request not found.</p>";
    exit;
}
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
        /* การตั้งค่า container */
        .container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            text-align: left; /* ทำให้เนื้อหาภายในเป็นตัวอักษรจัดซ้าย */
        }

        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
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
</body>
</html>
