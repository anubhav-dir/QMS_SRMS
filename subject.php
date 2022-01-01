<?php
require_once "include/adminsession.php";
$title = "Subject";
require_once "include/header.php";
?>

<?php include "nav.php"; ?>

<div class="container">
    <div class="row align-items-center" style="margin-top: 10px;">
        <div class="col-md-9">
            <h1 class="text-center">Subject</h1>
            <table class="table">

                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Subject I'd</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>All Questions</th>
                    <th>Add Questions</th>

                </tr>
                <?php
                require_once "DB/dbconnection.php";
                require_once "DB/subjectDB.php";

                $showSubject = new Subjects($pdo);
                $result = $showSubject->getSubject();
                $q = 0;
                while ($r = $result->fetch()) {
                    $q++;
                ?>

                    <tr>
                        <td><?php echo $q; ?></td>
                        <td><?php echo $r['subject']; ?></td>
                        <td><?php echo $r['sub_id']; ?></td>
                        <td><a href="updateSubject.php?id=<?php echo $r['sub_id']; ?>">Update</a></td>
                        <td><a href="DAO/deleteSubjectDao.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Delete');">Delete</a></td>
                        <td><a href="questions.php?sub_id=<?php echo $r['sub_id']; ?>">Question Bank</a></td>
                        <td><a href="addquestion.php?sub_id=<?php echo $r['sub_id']; ?>">Add Question</a></td>
                    </tr>


                <?php
                }
                ?>
            </table>

        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <h1 class="p-3 mb-2 bg-primary text-white text-center">Add Subject</h1>
                <div class="card-body">
                    <div>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];

                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                    <form action="DAO/subjectDao.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Subject</label>
                            <input class="form-control" type="text" name="subject" id="subject">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sub_id">Subject I'd</label>
                            <input class="form-control" type="text" name="sub_id" id="sub_id">
                        </div>
                        <div class="mb-3">

                            <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>
<?php require_once "include/footer.php"; ?>