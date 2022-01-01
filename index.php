<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Index</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-image: url('include/omr3.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
            background-attachment: fixed;
        }

        .main {
            background-color: rgb(0, 0, 0, 0.8);
            height: 100%;
            color: white;

        }
        #home {
            height: 100%;
        }

        #home-cover {
            height: 100%;
            background-image: url("../img/bg-home.jpg");
        }

        #home-cover-box {
            height: 100%;
            width: 100%;
            display: table;
        }

        #home-cover-box-inner {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        #home-heading h3 {
            color: white;
            font-size: 55px;
            font-weight: 700;
            margin: 20px 0 20px 0;
            text-transform: uppercase;
        }

        .btn-general {
            border-width: 2px;
            border-radius: 0;
            padding: 12px 26px 12px 26px;
            font-size: 16px;
            font-weight: 400;
            text-transform: uppercase;
        }

        .btn-white {
            border-color: #fff;
            color: #fff;
        }

        .btn-white:hover,
        .btn-white:focus {
            background-color: #fff;
            color: #41464b;
        }
    </style>
</head>

<body>
    <div class="main">
        
        <div id="home">
            <div id="home-cover" class="bg-parallax animated fadeIn">
                <div id="home-cover-box">
                    <div id="home-cover-box-inner" class="text-center">
                        <div id="home-heading" class="animated zoomIn">
                            <h3>Check Out <br>Quiz Management System</h3>
                        </div>
                        <div id="home-btn" class="animated zoomIn">
                            <a class="btn btn-lg btn-general btn-white " role="button" href="login.php" title="Login">Login</a>
                            <a class="btn btn-lg btn-general btn-white " role="button" href="register.php" title="Register">Register</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>