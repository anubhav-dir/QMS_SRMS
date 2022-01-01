<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header("Location: index.php");
}
?>


<?php
$title = "Profile";
require_once "include/header.php";
?>
<?php
if ($_SESSION['username'] == "admin") {
    include "nav.php";
} else {
    include "nav2.php";
}

?>


<div class="container">
    <h1 class="text-center">Profile</h1>
    <?php
    require_once "DB/dbconnection.php";
    require_once "DB/profileDB.php";
    $id = $_SESSION['id'];
    $profile = new Profile($pdo);
    $result = $profile->getProfile($id);

    ?>
    <div class="row justify-content-md-center text-center">
        <div class="col-lg-6 ">
            <table class="table">
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Id</th>
                    <td><?php echo $result['username']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $result['email']; ?></td>
                </tr>
                <tr>
                    <th>Contact No</th>
                    <td><?php echo $result['contactNo']; ?></td>
                </tr>
                <tr>
                    <th>Register Date</th>
                    <td><?php echo $result['date']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php require_once "include/footer.php"; ?>