<?php
require_once "../include/adminsession.php";

if (!(isset($_POST['submit']))) {
    header("Location: ../setexam.php");
}

$id = $_POST['id'];
$subject = $_POST['subject'];
$sub_id = $_POST['sub_id'];

require_once "../DB/dbconnection.php";
require_once "../DB/subjectDB.php";

$update = new Subjects($pdo);
$result = $update->updateSubject($id, $subject, $sub_id);
if ($result) {

    $_SESSION['msg'] = '<script>alert("Subject updated")</script>';
    header("Location: ../subject.php");
    return;
} else {
    $_SESSION['msg'] = '<script>alert("Subject not updated")</script>';
    header("Location: ../subject.php");
}
