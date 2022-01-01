<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header("Location: index.php");
}
if (!(isset($_POST["submit"]))) {
    header("Location: ../schedule.php");
}

require_once "../DB/dbconnection.php";
require_once "../DB/quizDB.php";

$sub_id = $_POST['sub_id'];
$ans = new Quiz($pdo);
$answer = $ans->getQuestions($sub_id);
$q = 0;
$marks = 0;
while ($a = $answer->fetch()) {
    $q++;
    $qn = 'q' . $q;
    $option = $_POST[$qn];

    if ($option == $a['answer']) {
        $marks++;
    }
}

$marks = (($marks / $q) * 100);
if ( $marks > 35) {

    $status = "pass";
} else {
    $status = "fail";
}

$username = $_SESSION['id'];


$result = $ans->setResults($username, $sub_id, $marks, $status);

if ($result) {
    header("Location: ../home.php");
} else {
    echo "error";
}
