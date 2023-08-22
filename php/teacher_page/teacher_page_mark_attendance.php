<?php
session_start();
if (empty($_SESSION['teacher_data'])) {
    header('Location: ../login.php');
} else {
    $teacher_level = (object)$_SESSION['teacher_level'];
    $teacher_subject = (object)$_SESSION['teacher_subject'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/teacher/view_attendance.css">
    <title>Teacher Portal</title>
</head>

<body>
    <?php include('../../php/teacher_navbar.php') ?>

    <main class="main">
        <div class="main-content-holder">
            <form class="select_heads">
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

    </main>
</body>

</html>