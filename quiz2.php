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
    <title>Quiz Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #full_scrn {
            /* background-color: rebeccapurple; */
            height: 100%;
        }

        #top_head {
            /* background-color: rosybrown; */
            height: 120px;
        }

        .row {
            height: 100%;
        }

        #left_body {
            /* background-color: greenyellow; */
            height: 100%;

        }

        #right_body {
            background-color: #b8ccd1;
            height: 100%;

        }

        #bottom_Down {
            background-color: #514b57;
            height: 120px;
            padding: 5px;
        }

        .table_box {
            height: 100%;
            width: 100%;
            display: table;
        }

        .table_box_inner {
            display: table-cell;
            vertical-align: middle;
        }

        #number_box {
            background-color: #f5e6e6;
            height: 60%;
            padding: 10px;
            overflow-x: hidden;
            text-align: center;
            border-radius: 5px;
        }

        .num_box {
            background-color: #6c757d;
            display: inline-block;
            padding: 11px;
            margin: 2px;
            border-radius: 5px;
            border-color: black;
        }

        .info_btn {
            display: inline-block;
            padding: 11px;
            margin: 2px;
            border-radius: 5px;
            border-color: black;
        }

        .num_box:hover {
            padding: 10px;
            margin: 3px;
        }

        #table_padding {
            padding-left: 50px;
            padding-right: 50px;
        }

        .q_no {
            font-size: 35px;
            font-weight: 700;
            text-align: center;
        }

        .buttons {
            text-align: center;
        }

        span {
            margin-left: 15px;
        }

        .red_btn {
            background-color: #dc3545;
            color: #000;
        }

        .gray_btn {
            background-color: #6c757d;
            color: #000;
        }

        .yellow_btn {
            background-color: #ffc107;
            color: #000;
        }

        .green_btn {
            background-color: #198754;
            color: #000;
        }

        #clock_box {
            background-color: aqua;
            border-radius: 5px;
            border-color: black;
            margin: 5px 100px;
        }

        #clock_box_inner {
            margin: 5px;
            padding: 5px;
            text-align: center;
            font-size: 25px;
            letter-spacing: 2px;
            font-weight: 700;
        }

        #sub_name {
            font-size: 35px;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 700;
        }

        #student_name {
            font-size: 40px;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 700;
        }

        .question {
            display: none;
        }

        table {
            width: 100%;
        }
    </style>

</head>

<body onload="showQuestion('1')">
    <?php

    $qno = 1;
    require_once "DB/dbconnection.php";
    require_once "DB/quizDB.php";
    require_once "DB/profileDB.php";
    require_once "DB/subjectDB.php";


    $sub_id = $_GET['sub_id'];

    $sub = new Subjects($pdo);
    $sub_name = $sub->getASubject($sub_id);

    $results = new Quiz($pdo);
    $questions = $results->getQuestions($sub_id);
    $q = 0;

    $id = $_SESSION['id'];
    $profile = new Profile($pdo);
    $name = $profile->getProfile($id);
    ?>

    <div id="top_head" class="fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 gray_btn" id="student_name">
                    <?php echo $name['firstname'] . ' ' . $name['lastname']; ?> ( <?php echo $name['username']; ?> )
                </div>
                <div class="col-lg-9 yellow_btn" id="sub_name">
                    <?php echo $sub_name['subject']; ?> (<?php echo $sub_id ?>)
                </div>
                <div class="col-lg-3 green_btn">
                    <div id="clock_box">
                        <div id="clock_box_inner">
                            00 : 00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="full_scrn" class="container-fluid">
        <div class="row">

            <div id="left_body" class="col-lg-9">
                <div class="table_box">
                    <div class="table_box_inner" id="table_padding">
                        <br>

                        <form action="DAO/quizResultDao.php" method="POST">
                            <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
                            <?php while ($r = $questions->fetch()) {
                                $q++; ?>

                                <table class="table question" id="<?php echo $q ?>">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2" class="q_no">Q. <?php echo $q; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> Q. <?php echo $r['question'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="q<?php echo $q; ?>" id="option01" value="<?php echo $r['option01']; ?>">
                                                    <label class="form-check-label" for="option01">
                                                        1. <?php echo $r['option01'] ?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="q<?php echo $q; ?>" id="option02" value="<?php echo $r['option02']; ?>">
                                                    <label class="form-check-label" for="option02">
                                                        2. <?php echo $r['option02'] ?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="q<?php echo $q; ?>" id="option03" value="<?php echo $r['option03']; ?>">
                                                    <label class="form-check-label" for="option03">
                                                        3. <?php echo $r['option03'] ?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="q<?php echo $q; ?>" id="option04" value="<?php echo $r['option04']; ?>">
                                                    <label class="form-check-label" for="option04">
                                                        4. <?php echo $r['option04'] ?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            <?php } ?>
                            <button type="submit" type="button" class="btn btn-success text-center">Final Submit</button>
                        </form>


                        <br>
                        <br>
                        <div class="buttons">
                            <button type="button" class="btn btn-primary ">Marks for Review</button> <span></span>
                            <button type="button" class="btn btn-primary ">Skip</button> <span></span>
                            <button type="reset" type="button" class="btn btn-primary ">Reset</button> <span></span>
                            <button type="button" class="btn btn-success " onclick="nextQuestion('<?php echo $qno; ?>')">Save and Next</button>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <div id="right_body" class="col-lg-3">

                <div class="table_box">
                    <div class="table_box_inner">
                        <div id="number_box">
                            <?php

                            for ($i = 1; $i <= $q; $i = $i + 1) {
                            ?>
                                <button class="num_box" onclick="showQuestion('<?php echo $i; ?>')"><?php if ($i < 10) {
                                                                                                        echo "0$i";
                                                                                                    } else {
                                                                                                        echo $i;
                                                                                                    }; ?></button>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="bottom_Down" class="fixed-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9">
                    <button class="info_btn gray_btn">00</button> <span>Not Attended</span>
                    <button class="info_btn yellow_btn">00</button> <span>Mark for Review</span>
                    <br>
                    <button class="info_btn red_btn">00</button> <span>Not Answered</span>
                    <button class="info_btn green_btn">00</button> <span>Answered</span>
                </div>
                <div class="col-lg-3">
                    <button type="button" class="btn btn-info">Introduction</button> <span></span>
                    <button type="submit" type="button" class="btn btn-success text-center">Final Submit</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showQuestion(q_no) {
            var i, allQuestion;
            allQuestion = document.getElementsByClassName("question")
            for (i = 0; i < allQuestion.length; i++) {
                allQuestion[i].style.display = "none";
            }
            document.getElementById(q_no).style.display = "block";
        }

        function nextQuestion(qno) {
            if (qno > 0 && qno <= q) {
                showQuestion(qno);
            } else {
                showQuestion(1);
            }
        }
    </script>

    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>