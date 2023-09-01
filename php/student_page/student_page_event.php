<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/student/main.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/student/fees.css" />
    <link rel="stylesheet" href="../../css/student/attendance.css" />
    <link rel="stylesheet" href="../../css/student/event.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
    <title>Student Portal</title>
</head>

<body>
    <?php
    include('../../php/student_navbar.php');
    ?>
    <main class="main">
        <div class="main-content-holder">
            <div class="event-container">
                <?php
                $events = include('../../controllers/admin/read_event_proc.php');
                foreach ($events as $event) {
                    echo '
                    <div class="event-item">
                        <div class="event-details">
                            <h4>' . $event->eventName . '</h4>
                            <h3>' . $event->venue . '</h3>
                            <p>' . $event->description . '</p>
                        </div>
                        <div class="event-date">
                            <p>Thursday' . $event->eventDate . '</p>
                            <p>' . $event->eventTime . '</p>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>