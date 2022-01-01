<?php
require_once "../include/adminsession.php";

if (!(isset($_POST['submit']))) {
    header("Location: ../addquestion.php");
}

$id = $_POST['id'];
$sub_id = $_POST['sub_id'];
echo $sub_id;
$question = $_POST['question'];
$option01 = $_POST['option01'];
$option02 = $_POST['option02'];
$option03 = $_POST['option03'];
$option04 = $_POST['option04'];
$answer = $_POST['answer'];
$author = $_SESSION['name'];

require_once "../DB/dbconnection.php";
require_once "../DB/questionDB.php";

$update = new Question($pdo);
$result = $update->updateQuestion($id, $question, $option01, $option02, $option03, $option04, $answer, $author);

if ($result) {
    $_SESSION['msg'] = '<script>alert("Question updated")</script>';
    header('Location: ../questions.php?sub_id=' . $sub_id);
} else {
    $_SESSION['msg'] = '<script>alert("Question not updated")</script>';
    header('Location: ../questions.php?sub_id=' . $sub_id);
}
