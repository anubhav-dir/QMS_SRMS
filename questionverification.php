<?php
require_once "include/adminsession.php";
$title = "Question Verification";
require_once "include/header.php";
?>

<?php include "nav.php"; ?>

<div class="container">
    <div class="row">
        <h1 class="text-center">Question Verification</h1>
        <div class="col-md-12">
            <?php
            require_once "DB/dbconnection.php";
            require_once "DB/subjectDB.php";
            require_once "DB/questionDB.php";

            $showSubject = new Subjects($pdo);
            $result = $showSubject->getSubject();
            ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="subject">Subject</label>
                    <select class="form-select" name="subject" id="subject">
                        <option value="-1">Select Subject</option>
                        <?php while ($r = $result->fetch()) {  ?>
                            <option <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        if ($r['sub_id'] == $_POST['subject']) {
                                            echo "selected";
                                        }
                                    } ?> value="<?php echo $r['sub_id']; ?>">(<?php echo $r['sub_id']; ?>) <?php echo $r['subject']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary form-control" type="submit" value="submit" name="submit" id="submit">
                </div>
            </form>
        </div>
        <div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $sub_id = $_POST['subject'];
                $showQuestion = new Question($pdo);
                $result = $showQuestion->showQuestions($sub_id);
            ?>

                <h1 class="text-center">Question Bank</h1>
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
                    <?php $qno=0; while ($r = $result->fetch()) { $qno++;?>
                        <tr>
                            <td><?php echo $qno; ?></td>
                            <td><?php echo $r['question']; ?></td>
                            <td><?php echo $r['option01']; ?></td>
                            <td><?php echo $r['option02']; ?></td>
                            <td><?php echo $r['option03']; ?></td>
                            <td><?php echo $r['option04']; ?></td>
                            <td><?php echo $r['answer']; ?></td>
                            <td><?php echo $r['status']; ?></td>
                            <td><a href="DAO/approveQuestionDao.php?id=<?php echo $r['id']; ?>&sub_id=<?php echo $r['sub_id']; ?>">approve</a></td>
                            <td><a href="DAO/rejectQuestionDao.php?id=<?php echo $r['id']; ?>&sub_id=<?php echo $r['sub_id']; ?>">reject</a></td>

                        </tr>
                    <?php   }    ?>
                </table>

            <?php } ?>

        </div>


    </div>
</div>
<?php require_once "include/footer.php"; ?>