<?php
session_start();
if (empty($_SESSION['teacher_data'])) {
    header('Location: ../login.php');
} else {
    $teacher_level = (object)$_SESSION['teacher_level'];
    $teacher_subject = (object)$_SESSION['teacher_subject'];
    $teacher_related = $_SESSION['teacher_related'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/teacher//mark_attendance.css">
    <link rel="stylesheet" href="../../css/teacher/view_attendance.css">
    <title>Teacher Portal</title>
</head>

<body>
    <?php include('../../php/teacher_navbar.php') ?>

    <main class="main">
        <div class="main-content-holder">
            <form class="select_heads" action="../../controllers/students/students_proc.php" method="post">
                <div class="left-select-head">
                    <select name="grade" class="select-grade" id="grade">
                        <option selected>Select Grade</option>
                        <?php foreach ($teacher_level as $item) { ?>
                            <?php foreach ($item as $option) { ?>
                                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                            <?php } ?>

                        <?php } ?>
                    </select>

                    <select name="subject" class="select-grade" id="subject">
                        <option selected>Select Subject</option>
                        <?php foreach ($teacher_subject as $item) { ?>
                            <?php foreach ($item as $option) { ?>
                                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                            <?php } ?>

                        <?php } ?>
                    </select>
                    <input type="submit" value="Submit" name="action">
                </div>
            </form>
        </div>
        <?php if (isset($teacher_related) && !empty($teacher_related)) { ?>
            <div class="table-header-display">
                <p><?php echo $teacher_related[0]->subjectName ?></p>
                <p>/</p>
                <p><?php echo $teacher_related[0]->Level ?></p>
            </div>
        <?php  } ?>

        <form action="" class="form-control attendance-form">
            <table class=" table table-sm table-bordered border-primary">
                <thead class="thead-attendance">
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Regno</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <?php if (isset($teacher_related)) { ?>
                    <tbody class="tbody-attendance">
                        <?php foreach ($teacher_related as $student) { ?>
                            <tr>
                                <td><?php echo $student->Name ?></td>
                                <td><?php echo $student->regno ?></td>
                                <td>
                                    <input type="checkbox" name="studentId" value="<?php echo $student->regno ?>">
                                </td>
                            </tr>

                        <?php  } ?>
                    </tbody>
                <?php } ?>


                <?php if (empty($teacher_related)) { ?>
                    <div class="no-student">
                        <h2>No Student Match</h2>
                    </div>
                <?php  } ?>
            </table>
            <input type="submit" name="action" class="mark-attendance-btn" value="Mark Attendance">
        </form>


    </main>
</body>

</html>