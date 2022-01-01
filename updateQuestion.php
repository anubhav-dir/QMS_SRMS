<?php
require_once "include/adminsession.php";
$title = "Update Question";
require_once "include/header.php";
?>

<?php include "nav.php"; ?>

<?php
require_once "DB/dbconnection.php";
require_once "DB/questionDB.php";

$id = $_GET['id'];
$update = new Question($pdo);
$result = $update->showQuestion($id);
?>

<div class="container">
    <h1 class="text-center">Update Question</h1>
    <div class="row">
        <form action="DAO/updateQuestionDao.php" method="POST">
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="<?php echo $result['id'] ?>">
                <input class="form-control" type="hidden" name="sub_id" id="sub_id" value="<?php echo $result['sub_id'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="question">Question</label>
                <input class="form-control" type="text" name="question" id="question" value="<?php echo $result['question'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option01">Option 01</label>
                <input class="form-control" type="text" name="option01" id="option01" value="<?php echo $result['option01'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option02">Option 02</label>
                <input class="form-control" type="text" name="option02" id="option02" value="<?php echo $result['option02'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option03">Option 03</label>
                <input class="form-control" type="text" name="option03" id="option03" value="<?php echo $result['option03'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option04">Option 04</label>
                <input class="form-control" type="text" name="option04" id="option04" value="<?php echo $result['option04'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="answer">Answer</label>
                <input class="form-control" type="text" name="answer" id="answer" value="<?php echo $result['answer'] ?>">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="Update">
            </div>

        </form>
    </div>
</div>
<?php require_once "include/footer.php"; ?>