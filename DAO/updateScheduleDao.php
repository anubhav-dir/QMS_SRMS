<?php
require_once "../include/adminsession.php";

if (!(isset($_POST['submit']))) {
    header("Location: ../setexam.php");
}

$id = $_POST['id'];
$subject = $_POST['subject'];
$status = $_POST['status'];

require_once "../DB/dbconnection.php";
require_once "../DB/setexamDB.php";

$update = new SetExam($pdo);
$result = $update->updateSchedule($id, $subject, $status);
if ($result) {

    $_SESSION['msg'] = '<script>alert("Schedule updated")</script>';
    header("Location: ../setexam.php");
    return;
} else {
    $_SESSION['msg'] = '<script>alert("Schedule not updated")</script>';
    header("Location: ../setexam.php");
}
