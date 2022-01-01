<?
// Starting session 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<body>
    <h1>logout</h1>
    <?php

    // Removing session 
    session_unset();
    // Destroying session 

    // if destroyer not work 
    if (!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    // redirecting 
    // header("Location: index.php");
    header("Location: index.php");
    ?>
</body>

</html>