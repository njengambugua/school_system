<?php
session_start();
$uniqueDays = [];
$uniqueSubjects = [];
$readableDays = [];
$uniqueLevel = [];
// level
foreach ($_SESSION['teacher_select'] as $day) {
    if (!in_array($day->day_of_week, $uniqueDays)) {
        array_push($uniqueDays, $day->day_of_week);
    }

    if (!in_array($day->subjectName, $uniqueSubjects)) {
        array_push($uniqueSubjects, $day->subjectName);
    }

    if (!in_array($day->level, $uniqueLevel)) {
        array_push($uniqueLevel, $day->level);
    }
}

function convertDay($day)
{
    if ($day == 'Day1') {
        return 'Monday';
    } elseif ($day == 'Day2') {
        return 'Tuesday';
    } elseif ($day == 'Day3') {
        return 'Wednesday';
    } elseif ($day == 'Day4') {
        return 'Thursday';
    } elseif ($day == 'Day5') {
        return 'Friday';
    } else {
        return "Day not valid";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lessonFound = false;
    $subject;
    $level;
    $lessonId;
    foreach ($_SESSION['teacher_select'] as $lesson) {
        if ($lesson->day_of_week == $_POST['day'] && $lesson->subjectName == $_POST['subject'] && $lesson->level == $_POST['level']) {
            $lessonFound = true;
            $subject = $lesson->subjectName;
            $level = $lesson->level;
            $lessonId = $lesson->schedule_id;
            print_r($lesson);
            break;
        }
    }

    if (!$lessonFound) {
        $_SESSION['error-lesson'] = 'You Do Not Have That Lesson In That Class';
    } else {
        unset($_SESSION['error-lesson']);
        $_SESSION['lesson_id'] = $lessonId;
        header('Location: teacher_page_mark_attendance.php?subject=' . $subject . '&level=' . $level);
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="../../css/teacher/students.css">
    <link rel="stylesheet" href="../../css/teacher/choose_lesson.css">
</head>

<body>
    <?php include('../../php/teacher_navbar.php') ?>
    <main class="main">
        <div class="main-content-holder">
            <div class="overlay-holder">
                <p class="error-lesson">
                    <?php if (isset($_SESSION['error-lesson'])) {
                        echo $_SESSION['error-lesson'];
                    } ?></p>
                <form action="" method="post" class="form-control select_lesson_form">

                    <div class="select-holder">
                        <p>Please Choose Day To Mark Attendance</p>
                        <select name="day" id="" class="form-control">
                            <option value="" class="form-control">Select Day</option class="form-control">
                            <?php foreach ($uniqueDays as $day) { ?>
                                <option value="<?php echo $day ?>" class="form-control"><?php echo convertDay($day) ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="select-holder">
                        <p>Please Choose Subject To Mark Attendance</p>
                        <select name="subject" id="" class="form-control">
                            <option value="" class="form-control">Select SUbject</option>
                            <?php foreach ($uniqueSubjects as $subject) { ?>
                                <option value="<?php echo $subject ?>" class="form-control"><?php echo $subject ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="select-holder">
                        <p>Please Choose Class</p>
                        <select name="level" id="" class="form-control">
                            <option value="" class="form-control">Select Class</option>
                            <?php foreach ($uniqueLevel as $level) { ?>
                                <option value="<?php echo $level ?>" class="form-control"><?php echo $level ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="submit-btn mt-4">
                        <input type="submit" name="action" value="Select Lesson" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>