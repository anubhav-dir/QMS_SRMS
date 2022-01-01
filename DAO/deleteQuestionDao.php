<?php
require_once "../include/adminsession.php";

if (!(isset($_GET['id']))) {
    header("Location: subject.php");
}

$id = $_GET["id"];
$sub_id = $_GET["sub_id"];
require_once "../DB/dbconnection.php";
require_once "../DB/questionDB.php";

$delete = new Question($pdo);
$result = $delete->deleteQuestion($id);

if ($result) {

    header('Location: ../questions.php?sub_id=' . $sub_id);
} else {
    echo "error";
}
