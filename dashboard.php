<?php
require_once "include/adminsession.php";
$title = "Dashboard";
require_once "include/header.php";
?>


<?php
include "nav.php";
require_once "DB/questionDB.php";
?>
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <h1 class="text-center" style="font-size: 70px;" >WELCOME <?php echo $_SESSION['name']; ?></h1>
        <h1 class="text-center">Admin Pannel</h1>
    </div>
</div>

<?php require_once "include/footer.php"; ?>