<?php
require_once "../include/adminsession.php";

$id = $_GET['id'];

require_once "../DB/dbconnection.php";
require_once "../DB/setexamDB.php";

$delete = new SetExam($pdo);

$result = $delete->deleteSchedule($id);
if ($result) {
    header("Location: ../setexam.php");
} else {
    echo "error";
}
