<?php
require_once "../include/adminsession.php";


if (!(isset($_POST["submit"]))) {
    header("Location: ../setexam.php");
}

require_once "../DB/dbconnection.php";
require_once "../DB/setexamDB.php";

$subject = $_POST['subject'];
$status = $_POST['status'];
// echo $status;
$setexam = new SetExam($pdo);
$result = $setexam->addExam($subject, $status);
if ($result) {
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">New Subject Added Successfully</div>';
    header("Location: ../setexam.php");
    return;
} else {
    echo "fail";
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Something Wrong, Subject not added</div>';
    header("Location: ../setexam.php");
    return;
}
