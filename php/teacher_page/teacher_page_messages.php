<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Message and Events</title>
  <link rel="stylesheet" href="../../css/teacher/messages.css">
  <link rel="stylesheet" href="../../css/student/event.css" />
</head>

<body>
  <?php
  include('../../php/teacher_navbar.php');
  ?>
  <main class="main">
    <div class="main-content-holder">
      <div class="event-container">
        <?php
        $eventsOrMessages = include('../../controllers/admin/read_event_proc.php');
        foreach ($eventsOrMessages as $message) {
          echo "
            <div class='event-item'>
              <div class='event-details'>
                <h4>$message->eventName</h4>
                <p>$message->description</p>
                </div>
                <div class='event-date'>
                <h3>Venue: $message->venue</h3>
                <p>Date: $message->eventDate</p>
                <p>Time: $message->eventTime</p>
              </div>
            </div>
            ";
        }
        ?>
      </div>
    </div>
  </main>
</body>
</html>