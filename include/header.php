<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SRMS - <?PHP echo $title; ?></title>
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

        table tr td,
        table tr th {
            color: white;
        }

        .card {
            background-color: rgb(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .card h1 {
            border-radius: 9px;
        }

        .form-control,
        .form-select {
            border-radius: 0px;
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