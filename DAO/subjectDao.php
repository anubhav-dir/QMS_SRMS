<?php
require_once "../include/adminsession.php";


if (!(isset($_POST['submit']))) {
    header("Location: ../subject.php");
}

$sub_id = $_POST['sub_id'];
$subject = $_POST['subject'];

require_once "../DB/dbconnection.php";
require_once "../DB/subjectDB.php";

$add =  new Subjects($pdo);
$result = $add->addSubject($sub_id, $subject);
if ($result) {

    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">New Subject Added Successfully</div>';
    header("Location: ../subject.php");
    return;
} else {
    echo "fail";
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Something Wrong, Subject not added</div>';
    header("Location: ../subject.php");
    return;
}
