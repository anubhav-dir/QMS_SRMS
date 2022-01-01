<?php
require_once "include/adminsession.php";
$title = "Users";
require_once "include/header.php";
?>

<?php include "nav.php"; ?>

<div class="container">
    <h1 class="text-center">Users</h1>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Username</th>
            <th style="text-align: center;">Registration Date/Time</th>
            <th>Results</th>
            <th>Profile</th>
        </tr>
        <?php
        require_once "DB/dbconnection.php";
        require_once "DB/usersDB.php";
        $users = new Users($pdo);
        $results = $users->getUsers();
        $sn = 0;
        while ($r = $results->fetch()) {
            $sn++;
        ?>
            <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $r['firstname'] . ' ' . $r['lastname']; ?></td>
                <td><?php echo $r['username']; ?></td>
                <td style="text-align: center;"><?php echo $r['date']; ?></td>
                <td><a href="">Performance </a></td>
                <td><a href="">Profile</a></td>
            </tr>
        <?php } ?>

    </table>
</div>
<?php require_once "include/footer.php"; ?>