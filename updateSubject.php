<?php
require_once "include/adminsession.php";
$title = "Update Subject";
require_once "include/header.php";
?>
<br>
<br>
<br>
<div class="container">

    <div class="row">

        <?php
        require_once "DB/dbconnection.php";
        require_once "DB/subjectDB.php";
        $id = $_GET['id'];
        $update = new Subjects($pdo);
        $result = $update->getASubject($id);


        ?>
        <div class="col-md-8"></div>
        <div class="col-md-3">
            <div class="card" style="width: 22rem;">
                <h1 class="p-3 mb-2 bg-primary text-white text-center">Update Subject</h1>
                <div class="card-body">
                    <form action="DAO/updateSubjectDao.php" method="POST">
                        <div>
                            <input type="hidden" name="id" id="id" value="<?php echo $result['id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subject">Subject</label>
                            <input class="form-control" type="text" name="subject" id="subject" value="<?php echo $result['subject']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sub_id">Subject Id</label>
                            <input class="form-control" type="text" name="sub_id" id="sub_id" value="<?php echo $result['sub_id']; ?>">

                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once "include/footer.php"; ?>