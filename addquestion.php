<?php
require_once "include/adminsession.php";
$title = "Question";
require_once "include/header.php";
?>
<?php include "nav.php"; ?>

<?php
require_once "DB/dbconnection.php";
require_once "DB/subjectDB.php";

$showSubject = new Subjects($pdo);
$result = $showSubject->getSubject();
?>

<div class="container">
    <h1 class="text-center">Add Question</h1>
    <div class="row">
        <form action="DAO/addQuestionDao.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="subject">Subject</label>
                <select class="form-select" name="subject" id="subject">
                    <option value="-1">Select Subject</option>
                    <?php while ($r = $result->fetch()) {  ?>
                        <option <?php if ($r['sub_id'] == $_GET['sub_id']) {
                                    echo "selected";
                                } ?> value="<?php echo $r['sub_id']; ?>">(<?php echo $r['sub_id']; ?>) <?php echo $r['subject']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="question">Question</label>
                <input class="form-control" type="text" name="question" id="question">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option01">Option 01</label>
                <input class="form-control" type="text" name="option01" id="option01">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option02">Option 02</label>
                <input class="form-control" type="text" name="option02" id="option02">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option03">Option 03</label>
                <input class="form-control" type="text" name="option03" id="option03">
            </div>
            <div class="mb-3">
                <label class="form-label" for="option04">Option 04</label>
                <input class="form-control" type="text" name="option04" id="option04">
            </div>
            <div class="mb-3">
                <label class="form-label" for="answer">Answer</label>
                <input class="form-control" type="text" name="answer" id="answer">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="Add">
            </div>

        </form>
    </div>
</div>
<?php require_once "include/footer.php"; ?>