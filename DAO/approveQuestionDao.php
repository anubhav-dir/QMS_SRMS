<?php
require_once "../include/adminsession.php";

require_once "../DB/dbconnection.php";
// require_once "DB/subjectDB.php";
require_once "../DB/questionDB.php";

$id = $_GET['id'];
$sub_id = $_GET['sub_id'];
$approve = new Question($pdo);
$result = $approve->approveQuestion($id);


echo $result;
if ($result) {

    // $_SESSION['msg'] = '<script>alert("Question Approved")</script>';
?>
    <form action="../questionverification.php" method="POST">
        <input type="hidden" name="subject" id="subject" value="<?php echo $sub_id; ?>">

        <input type="submit" id="submit" name="submit">
        <script>
            document.getElementById("submit").click();
        </script>
    </form>

<?php

} else {
?>
    <form action="../questionverification.php" method="POST">
        <input type="hidden" name="subject" id="subject" value="<?php echo $sub_id; ?>">

        <input type="submit" id="submit" name="submit">
        <script>
            document.getElementById("submit").click();
        </script>
    </form>

<?php

}
?>