<?php
if (!(isset($_POST["submit"]))) {
    header("Location: ../register.php");
}

require_once "../DB/dbconnection.php";
require_once "../DB/registerDB.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$username = $_POST["username"];
$contactno = $_POST["contactno"];
$password = $_POST["password"];

$reg = new Register($pdo);

$reg->register($firstname,$lastname, $email, $username, $contactno,$password);

echo "<hr>";
echo $firstname . ' ' . $lastname . ' ' . $email . ' ' . $contactno . ' ' . $password;
