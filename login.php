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

    <title>Login</title>
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
            background-color: rgb(0, 0, 0, 0.7);
            height: 100%;
            color: white;

        }
        table tr td, table tr th{
            color: white;
        }
        .card{
            background-color: rgb(0, 0, 0, 0.4);
            border-radius: 10px;
        }
        .card h1 {
            border-radius: 9px;
        }
        .form-control{
            border-radius: 0px;
        }
    </style>
</head>

<body>
    <div class="main">
    <br><br>
    <div class="container">
        <div class="row align-items-center">

            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <h1 class="p-3 mb-2 bg-primary text-white text-center">LOGIN</h1>
                    <div class="card-body">
                        <div>
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                session_unset();
                                if (!isset($_SESSION)) {
                                    session_start();
                                }
                                session_destroy();
                            }
                            ?>
                        </div>
                        <form action="DAO/loginDao.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="Login">
                                Don't have an account? <a href="register.php">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>