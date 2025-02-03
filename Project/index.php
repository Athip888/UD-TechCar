<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>
    
</head>

<body>



    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            background: #ececec;
            padding: 0 20px 0 20px;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .side-image {
            background-image: url("image/—Pngtree—ui ux illustration for landing_1568203.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px 0 0 10px;
            position: relative;
        }


        .row {
            width: 900px;
            height: 550px;
            border-radius: 10px;
            background: #fff;
            padding: 0px;
            box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
        }

        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .text p {
            color: #fff;
            font-size: 20px;
        }

        i {
            font-weight: 400;
            font-size: 15px;
        }

        .right {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .input-box {
            width: 330px;
            box-sizing: border-box;
        }

        .img-god {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .input-box header {
            font-weight: 700;
            text-align: center;
            margin-bottom: 45px;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 0 10px 0 10px;
        }

        .input {
            height: 45px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            outline: none;
            margin-bottom: 20px;
            color: #40414a;
        }

        .input-box .input-field label {
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: .5s;
        }

        .input-field input:focus~label {
            top: -10px;
            font-size: 13px;
        }

        .input-field input:valid~label {
            top: -10px;
            font-size: 13px;
            color: #5d5076;
        }

        .input-field .input:focus,
        .input-field .input:valid {
            border-bottom: 1px solid #743ae1;
        }

        .submit {
            border: none;
            outline: none;
            height: 45px;
           
            border-radius: 5px;
           
        }

        .submit:hover {
            background: rgba(37, 95, 156, 0.937);
            color: #fff;
        }

        .signin {
            text-align: center;
            font-size: small;
            margin-top: 25px;
        }

        span a {
            text-decoration: none;
            font-weight: 700;
            color: #000;
            transition: .5s;
        }

        span a:hover {
            text-decoration: underline;
            color: #000;
        }

        header {
            font-size: 24px
        }

        @media only screen and (max-width: 768px) {
            .side-image {
                border-radius: 10px 10px 0 0;
            }

            .img-god {
                width: 35px;
                position: absolute;
                top: 20px;
                left: 47%;
                transform: translateX(-50%);
                width: 50%;
                height: 50%;
                object-fit: cover;
            }

            .text {
                position: absolute;
                top: 70%;
                text-align: center;
            }

            .text p,
            i {
                font-size: 16px;
            }

            .row {
                max-width: 420px;
                width: 100%;

            }




        }
    </style>

    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6  side-image">

                    <img class="img-god me- " src="image/—Pngtree—ui ux illustration for landing_1568203.jpg" alt="">
                    <div class="text">

                    </div>
                </div>
                <div class="col-md-6 right">

                <div class="input-box">
    <header>Login</header>
    <form action="login_pro.php" method="POST">
        <div class="input-field">
            <input type="text" class="input" id="user_id" name="user_id" required autocomplete="off">
            <label for="user_id">User</label>
        </div>
        <div class="input-field">
            <input type="password" class="input" id="pass" name="password" required>
            <label for="pass">Password</label>
        </div>
        <div class="input-field">
            <input type="submit" class="submit btn-primary" value="Login">
        </div>
        <div class="signin">
            <!-- <span>Don't have an account? <a href="signup.php">Sign up here</a></span> -->
        </div>
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>