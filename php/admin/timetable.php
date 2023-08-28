<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$levels = [];
$data;
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'reset') {
        unset($_SESSION['sort-timetable']);
    }
}
if (isset($_SESSION['timetable'])) {
    $data = $_SESSION['timetable'];
    foreach ($_SESSION['timetable'] as $dt) {
        if (!in_array($dt->level, $levels)) {
            array_push($levels, $dt->level);
        }
    }
    if (isset($_SESSION['sort-timetable'])) {
        $data = $_SESSION['sort-timetable'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin/timetable.css">
    <title>timetable</title>
</head>

<body>
    <?php include('navbar.php') ?>

    <main class="main">
        <div class="main-content-holder">

            <div class="buttons-holder">
                <form method="post" class="reset-form">
                    <input type="submit" name="action" value="reset">
                </form>
                <form action="../../controllers/schedule/schedule_proc.php" method="post" class="form-control sort-form-main">
                    <select name="level" id="" class="form-control sort-form">
                        <?php foreach ($levels as $level) { ?>
                            <option class="form-control" value="<?php echo $level ?>"><?php echo $level ?></option>
                        <?php } ?>

                    </select>

                    <input type="submit" name='action' value="Sort" class="form-control">
                </form>

                <a href="create_schedule.php">Create New</a>

            </div>

            <table class="table table-sm timetable-table">
                <thead>
                    <tr>
                        <th scope="col">schedule_id</th>
                        <th scope="col">day_of_week</th>
                        <th scope="col">time</th>
                        <th scope="col">teacher_name</th>
                        <th scope="col">level</th>
                        <th scope="col">subjectNames</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $session) { ?>

                        <tr>
                            <td><?php echo $session->schedule_id ?></td>
                            <td><?php echo $session->day_of_week ?></td>
                            <td><?php echo $session->time ?></td>
                            <td><?php echo $session->teacher_name ?></td>
                            <td><?php echo $session->level ?></td>
                            <td><?php echo $session->subjectName ?></td>

                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </main>
</body>

</html>