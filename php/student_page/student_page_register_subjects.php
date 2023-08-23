<?php
session_start();
if (isset($_SESSION['reg_details']) && isset($_SESSION['subjects'])) {
    $reg_student = (object)$_SESSION['reg_details'];
    $subjects = (object)$_SESSION['subjects'];
    // ?teacher_id=<?php echo $_SESSION['teacher_data']->id; 
} else {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/student/register_subjects.css">
    <title>Student Subjects</title>
</head>

<body>
    <div class="header-reg">
        <h1>Welcome <?php echo $reg_student->name ?></h1>
        <p>Pleae fill the form to complete your Registration</p>
    </div>
    <div class="form-container">
        <form action="../../controllers/student_teacher_subjects/subjects.php" method="post">
            <input type="hidden" name="studentId" value="<?php echo $reg_student->id ?>">
            <div class="mb-3">
                <label for="" class="form-control label">
                    Registration Number:
                    <input class="form-control" type="text" name="regno" value="<?php echo $reg_student->regno ?>" aria-label="Disabled input example" readonly>
                </label>

                <label for="" class="form-control label">
                    Student Level Of Education:
                    <input class="form-control" type="text" name="level" value="<?php echo $reg_student->Level ?>" aria-label="Disabled input example" readonly>
                </label>
            </div>
            <h4 class="continuation-header">Please select the Subjects Accordingly</h4>
            <div class="form-check-holder">
                <?php foreach ($subjects as $subject) { ?>

                    <div class="form-check">
                        <input class="form-check-input" name="<?php echo $subject->subjectName ?>" type="checkbox" value="<?php echo $subject->id ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $subject->subjectName ?>
                        </label>
                    </div>

                <?php } ?>
            </div>

            <div class="submit-btn">
                <input type="submit" class="form-control">
            </div>
        </form>
    </div>
</body>

</html>