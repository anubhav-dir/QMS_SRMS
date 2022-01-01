<?php
require_once "include/adminsession.php";
$title = "Set Exam";
require_once "include/header.php";
?>
<?php
 include "nav.php";
 ?>

<div class="container">
    <div class="row align-items-center" style="margin-top: 10px;">
        <div class="col-md-8">
            <h1 class="text-center">Exams</h1>

            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Subject I'd</th>
                    <th>Status</th>
                    <th>Re-Schedule</th>
                    <th>Delete</th>
                </tr>

                <?php
                require_once "DB/dbconnection.php";
                require_once "DB/setexamDB.php";
                $showexam = new SetExam($pdo);
                $result = $showexam->getSchedule();
                $sno=0;
                while ($r = $result->fetch()) { $sno++;
                ?>

                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $r['subject']; ?></td>
                        <td><?php echo $r['status']; ?></td>
                        <td><a href="updateexam.php?id=<?php echo $r['id']; ?>">Update</a></td>
                        <td><a href="DAO/deleteExamDao.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Delete');">Delete</a></td>
                    </tr>

                <?php
                }
                ?>
            </table>


        </div>
        <div class="col-md-4">
            <div class="card" style="width: 22rem;">
                <h1 class="p-3 mb-2 bg-primary text-white text-center">Schedule Exam</h1>
                <div class="card-body">
                    <div>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];

                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                    <?php
                    require_once "DB/dbconnection.php";
                    require_once "DB/subjectDB.php";

                    $showSubject = new Subjects($pdo);
                    $result = $showSubject->getSubject();
                    ?>
                    <form action="DAO/setexamDao.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Subject</label>
                            <select class="form-select" name="subject" id="subject">
                                <option value="-1">Select Subject</option>
                                <?php while ($r = $result->fetch()) {         ?>

                                    <option value="<?php echo $r['sub_id']; ?>">(<?php echo $r['sub_id']; ?>) <?php echo $r['subject']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="true">Allow</option>
                                <option value="false">Disallow</option>
                            </select>
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