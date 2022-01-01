<!-- adminsession.php  -->
<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header("Location: index.php");
}
if ($_SESSION['username'] != "admin") {
    header("Location: login.php");
}
?>