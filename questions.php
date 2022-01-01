<?php
require_once "include/adminsession.php";
$title = "Question Bank";
require_once "include/header.php";
?>

<?php include "nav.php"; ?>

<?php
require_once "DB/dbconnection.php";
require_once "DB/questionDB.php";
$sub_id = $_GET['sub_id'];
$showSubject = new Question($pdo);
$result = $showSubject->showQuestions($sub_id);
?>
<div class="container">
    <h1 class="text-center">Question Bank</h1>
    <h6 class="text-end"><a href="addquestion.php?sub_id=<?php echo $sub_id; ?>">Add Question</a></h6>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];

        unset($_SESSION['msg']);
    }
    ?>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Option 01</th>
            <th>option02</th>
            <th>option03</th>
            <th>option04</th>
            <th>answer</th>
            <th>status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php $q = 0;
        while ($r = $result->fetch()) {
            $q++; ?>
            <tr>
                <td><?php echo $q; ?></td>
                <td><?php echo $r['question']; ?></td>
                <td><?php echo $r['option01']; ?></td>
                <td><?php echo $r['option02']; ?></td>
                <td><?php echo $r['option03']; ?></td>
                <td><?php echo $r['option04']; ?></td>
                <td><?php echo $r['answer']; ?></td>
                <td><?php echo $r['status']; ?></td>
                <td><a href="updateQuestion.php?id=<?php echo $r['id']; ?>">Update</a></td>
                <td><a href="DAO/deleteQuestionDao.php?id=<?php echo $r['id']; ?>&sub_id=<?php echo $r['sub_id']; ?>" onclick="return confirm('Delete');">Delete</a></td>
            </tr>
        <?php   }    ?>
    </table>
</div>


<?php require_once "include/footer.php"; ?>