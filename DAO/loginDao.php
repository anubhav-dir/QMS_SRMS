<?php

session_start();

if (!(isset($_POST["submit"]))) {
    header("Location: ../login.php");
}

require_once "../DB/dbconnection.php";
require_once "../DB/loginDB.php";
$username = $_POST["username"];
$password = $_POST["password"];

$login = new Login($pdo);

$result = $login->login($username, $password);
// echo $result[0];
if (isset($result[0])) {
    $_SESSION["id"] = $result["username"];
    $_SESSION["username"] = $result["username"];
    $name = $result["firstname"] . ' ' . $result["lastname"];
    $_SESSION["name"] = $name;
    if ($_SESSION['username'] == "admin") {
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../home.php");
    }
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email or Password is wrong.</div>';
    header("Location: ../login.php");
    return;
}
