<?php
require_once "../include/adminsession.php";

if (!(isset($_POST['submit']))) {
    header("Location: ../addquestion.php");
}

$sub_id = $_POST['subject'];
$question = $_POST['question'];
$option01 = $_POST['option01'];
$option02 = $_POST['option02'];
$option03 = $_POST['option03'];
$option04 = $_POST['option04'];
$answer = $_POST['answer'];
$author = $_SESSION['name'];

require_once "../DB/dbconnection.php";
require_once "../DB/questionDB.php";

$add = new Question($pdo);
$result = $add->addQuestion($sub_id, $question, $option01, $option02, $option03, $option04, $answer, $author);

// echo $result;
if ($result) {

    $_SESSION['msg'] = '<script>alert("Question Add")</script>';
    header('Location: ../questions.php?sub_id=' . $sub_id);
} else {
    $_SESSION['msg'] = '<script>alert("Error. Question Not Added")</script>';
    header('Location: ../questions.php?sub_id=' . $sub_id);
}
