<?php
session_start();
if (!isset($_SESSION['teacher_data'])) {
    header('Location: ../login.php');
}

$uniqueSubjects = [];
$uniqueLevel = [];
foreach ($_SESSION['teacher_select'] as $day) {
    if (!in_array($day->subjectName, $uniqueSubjects)) {
        array_push($uniqueSubjects, $day->subjectName);
    }

    if (!in_array($day->level, $uniqueLevel)) {
        array_push($uniqueLevel, $day->level);
    }
}

$attendance = [];
foreach ($_SESSION['all_student_attendance'] as $att) {
    foreach ($uniqueSubjects as $subject) {
        if (($att->subjectName == $subject && isset($att->Name))) {
            if (!isset($attendance[$att->Name])) {
                $attendance[$att->Name] = [];
            }
            $attendance[$att->Name][$subject] = $att->lesson_attend;
            $attendance[$att->Name]["regno"] = $att->regno;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="../../css/teacher/view_attendance.css">
</head>

<body>
    <?php include('../../php/teacher_navbar.php') ?>
    <main class="main">
        <div class="main-content-holder">

            <form method="post" action="../../controllers/attendance/attendance_proc.php" class="select_heads">
                <div class="left-select-head">

                    <select name="level" id="" class="form-control">
                        <?php foreach ($uniqueLevel as $level) { ?>
                            <option value="<?php echo $level ?>" class="form-control"><?php echo $level ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="right-select-head">
                    <input type="submit" name="action" value="Get All" class="select-grade">
                </div>
            </form>

            <a href="teacher_view_student_attendance.php">
                <button>Back To Single Student</button>
            </a>

            <div class="att_rec">
                <h4>Attendance Records</h4>
            </div>
            <div class="attendance-tables">
                <div class="table-holder">
                    <table class="table table-sm` att-table">
                        <thead class="thead-att">
                            <tr>
                                <th>Name</th>
                                <th>Regno</th>
                                <?php foreach ($uniqueSubjects as $subject) { ?>
                                    <th><?php echo $subject ?></th>
                                <?php  } ?>
                            </tr>
                        </thead>
                        <tbody class="tbody-att">

                            <?php foreach ($attendance as $name => $subjects) { ?>
                                <tr>
                                    <td><?php echo $name ?></td>

                                    <td><?php echo $subjects['regno'] ?></td>

                                    <?php foreach ($uniqueSubjects as $subject) { ?>
                                        <td><?php echo isset($subjects[$subject]) ? $subjects[$subject] : 0 ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
    </main>
</body>

</html>