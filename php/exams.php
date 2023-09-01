<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/exam.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Interview Pursuit Admission Test</h1>
    </header>
    <form method="POST" action="../controllers/exams/exams_proc.php?applicant_id=<?php echo $_SESSION['applicant_id'] ?>" class="manyQuestions">
        <?php foreach ($_SESSION["exams"] as $question) { ?>

            <div class="question">
                <p>
                    <?php echo $question->question ?>
                </p>
                <div class="options">
                    <div>
                        <input type="radio" name="answer<?php echo $question->id ?>" id="answer1" value="<?php echo $question->answer1 ?>" required>
                        <label for="answer1">
                            <?php echo $question->answer1 ?>
                        </label>
                    </div>
                    <div>
                        <input type="radio" name="answer<?php echo $question->id ?>" id="answer2" value="<?php echo $question->answer2 ?>" required>
                        <label for="answer2">
                            <?php echo $question->answer2 ?>
                        </label>
                    </div>
                    <div>
                        <input type="radio" name="answer<?php echo $question->id ?>" id="answer3" value="<?php echo $question->answer3 ?>" required>
                        <label for="answer3">
                            <?php echo $question->answer3 ?>
                        </label>
                    </div>
                    <div>
                        <input type="radio" name="answer<?php echo $question->id ?>" id="answer4" value="<?php echo $question->answer4 ?>" required>
                        <label for="answer4">
                            <?php echo $question->answer4 ?>
                        </label>
                    </div>
                </div>
            </div>
        <?php } ?>

        <input type="submit" id="submit" name="action" value="submit-exam">

    </form>

    <script>
        var btn = document.querySelector('#submit')
        btn.addEventListener('click', () => {
            alert('You have completed your exam. Your parent will receive an email of your results.');
            // open('../index.php')
        })
    </script>
</body>

</html>