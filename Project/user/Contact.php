<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        .container {
            margin-top: 30px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .line-icon {
            font-size: 50px;
            color: #00c300;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .line-icon:hover {
            color: #009a00;
            transform: scale(1.2);
        }

        .contact-section {
            text-align: center;
            margin-top: 20px;
        }

        .contact-section img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php require('header.php'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="form-container">
                    <h2>ติดต่อเรา</h2>
                    <div class="contact-section">
                        <a href="https://line.me/ti/p/~0928027836" target="_blank">
                            <img src="../image/LINE_logo.svg.png" alt="LINE Logo">
                            <i class="bi bi-chat-dots line-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
