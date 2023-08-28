<?php
session_start();
// if (empty($_SESSION['timetable'])) {
//     header('Location: ../login.php');
// }
$time = [];
foreach ($_SESSION['timetable'] as $dt) {
    if (!in_array($dt->time, $time)) {
        array_push($time, $dt->time);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin/create_timetable.css">
    <link rel="stylesheet" href="../../css/teacher/main.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
    <title>create timetable</title>
</head>
<?php include('navbar.php') ?>

<body class="create-body main">
    <div class="top-main">
        <div class="existing-time-range main-content-holder">
            <h4>Existing Time Range</h4>
            <?php foreach ($time as $t) { ?>
                <p><?php echo $t ?></p>
            <?php } ?>
        </div>
        <div class="update-time-form">
            <p>Add only the Lesson Intervals Assume the breaks.</p>
            <form class="form-control time-form">
                <label for="" class="form-control">
                    Add Time
                    <input type="text" class="form-control">
                </label>
                <input type="submit" class="form-control time-btn mt-4" value="Add Time">
            </form>
        </div>

    </div>

    <div class="botton-main">
        <form action="../../controllers/schedule/schedule_proc.php" method="POST" class="form-control display-edit">

            <input type="submit" class="submit-btn" name="submit_btn" value="Submit">
        </form>
    </div>

</body>
<script>
    let timeForm = document.querySelector('.time-form');
    let displayForm = document.querySelector('.display-edit');
    let inputCounter = 0;

    timeForm.addEventListener('submit', (ev) => {
        ev.preventDefault();
        let input = timeForm.querySelector('input');
        if (input.value.length > 0) {

            let newDiv = document.createElement('div');
            newDiv.classList.add('input-display-holder');

            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.classList.add('form-control', 'input-display');
            newInput.name = `input_${inputCounter++}`;

            newInput.value = input.value;

            let deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';

            deleteButton.addEventListener('click', () => {
                displayForm.removeChild(newDiv);
            });

            newDiv.appendChild(newInput);
            newDiv.appendChild(deleteButton);

            displayForm.appendChild(newDiv);

            input.value = '';


        }
    })

    displayForm.addEventListener('submit', (ev) => {
        ev.preventDefault();
        if (displayForm.childNodes.length === 2) {
            ev.preventDefault();
            alert("No time inputs");
        } else {
            displayForm.submit();

        }
    });
</script>


</html>