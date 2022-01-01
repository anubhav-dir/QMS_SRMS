<?php
require_once "../include/adminsession.php";

$id = $_GET['id'];

require_once "../DB/dbconnection.php";
require_once "../DB/subjectDB.php";

$delete = new Subjects($pdo);

$result = $delete->deleteSubject($id);
if ($result) {
    header("Location: ../subject.php");
} else {
    echo "error";
}
