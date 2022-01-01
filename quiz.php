<?php
session_start();
if (!(isset($_SESSION['id']))) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Quiz</title>
    <style>
        body {
            background-color: #c3e1fa;
        }

        .table_for {
            background-color: #bbabf5;
            border-radius: 10px;
        }

        .table {
            border: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        require_once "DB/dbconnection.php";
        require_once "DB/quizDB.php";
        $sub_id = $_GET['sub_id'];
        $results = new Quiz($pdo);
        $questions = $results->getQuestions($sub_id);
        $q = 0;
        ?>
        <div class="text-center">
            <h1>(<?php echo $sub_id; ?>) Quiz</h1>
        </div>
    <br>

        <div class="row">
            <form action="DAO/quizResultDao.php" method="POST">
                <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
                <?php while ($r = $questions->fetch()) {
                    $q++; ?>


                    <table class="table table_for">
                        <tr>
                            <th scope="row">Q <?php echo $q; ?>.
                                <?php echo $r['question'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> <input type="radio" name="q<?php echo $q; ?>" id="q<?php echo $q; ?>" value="<?php echo $r['option01']; ?>"> 1.
                                <?php echo $r['option01'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> <input type="radio" name="q<?php echo $q; ?>" id="q<?php echo $q; ?>" value="<?php echo $r['option02']; ?>"> 2.
                                <?php echo $r['option02'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> <input type="radio" name="q<?php echo $q; ?>" id="q<?php echo $q; ?>" value="<?php echo $r['option03']; ?>"> 3.
                                <?php echo $r['option03'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> <input type="radio" name="q<?php echo $q; ?>" id="q<?php echo $q; ?>" value="<?php echo $r['option04']; ?>"> 4.
                                <?php echo $r['option04'] ?></td>
                        </tr>

                    </table>
                <?php } ?>
                <input class="btn btn-primary form-control" type="submit" value="Submit" name="submit" id="submit">
            </form>
        </div>
        <br>
        <br>
        <br>


    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>