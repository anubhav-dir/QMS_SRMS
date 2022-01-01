<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-image: url('include/bg_qu.png');
            background-repeat: no-repeat;
            background-size: 100%;
            background-attachment: fixed;
        }

        .main {
            background-color: rgb(0, 0, 0, 0.7);
            height: 100%;
            color: white;

        }

        a {
            color: #fff;
            font-size: 15px;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 1px;
            font-weight: 700;
        }

        a:hover,
        a:focus {
            background: none;
            color: #34c6d3;
        }
    </style>
</head>

<body>

    <div class="main">
        <?php
        include "nav2.php";
        require_once "DB/questionDB.php";
        ?>
        <br><br><br><br><br>

        <div class="container">
            <div class="row">
                <h1 class="text-center" style="font-size: 70px;">WELCOME <?php echo $_SESSION['name']; ?></h1>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>