<?php
session_start();
if (empty($_SESSION['teacher_data'])) {
    header('Location: ../login.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $_GET['subject'];
        $_GET['level'];
    }
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

            <?php if (isset($_GET['subject']) && isset($_GET['level'])) { ?>
                <form class="select_heads" action="../../controllers/students/students_proc.php" method="post">
                    <div class="left-select-head">
                        <input type="text" name="grade" class="select-grade" value="<?php echo $_GET['level'] ?>" readonly>
                        <input type="text" name="subject" class="select-grade" value="<?php echo $_GET['subject'] ?>" readonly>
                        <input type="submit" value="Submit" name="action">
                    </div>
                </form>
            <?php } ?>

            <?php if (isset($_SESSION['error'])) { ?>
                <p class="error-lesson" style="color: red;">
                    <?php echo $_SESSION['error'] ?>
                </p>
            <?php } ?>

        </div>
        <?php if (isset($teacher_related) && !empty($teacher_related)) { ?>
            <div class="table-header-display">
                <p><?php echo $teacher_related[0]->subjectName ?></p>
                <p>/</p>
                <p><?php echo $teacher_related[0]->Level ?></p>
            </div>
        <?php  } ?>

        <form action="../../controllers/attendance/attendance_proc.php" method="POST" class="form-control attendance-form">
            <table class=" table table-sm table-bordered border-primary">
                <input type="hidden" name="lesson_id" value="<?php echo $_SESSION['lesson_id'] ?>">
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
                                    <input type="checkbox" name="studentId-<?php echo $student->regno ?>" value="<?php echo $student->student_id ?>">
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

            <?php if (!empty($teacher_related)) { ?>
                <div class="no-student">
                    <input type="submit" name="action" class="mark-attendance-btn" value="Mark Attendance">
                </div>
            <?php  } ?>
        </form>


    </main>
</body>

</html>