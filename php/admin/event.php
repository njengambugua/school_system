<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <main class="main">
        <div class="main-content-holder">
            <form action="../../controllers/admin/add_event-proc.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Event Name</label>
                    <input name="eventName" type="text" class="form-control">
                </div>
                <div class="mb-3" style='display: flex; justify-content: space-between; '>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Date</label>
                        <input name="eventDate" type="date" class="form-control" style="width: 40vw">
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Time</label>
                        <input name="eventTime" type="time" class="form-control" style="width: 40vw">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Venue</label>
                    <input name="eventVenue" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Event Details</label>
                    <textarea name="eventDetails" class="form-control" rows="3"></textarea>
                </div>
                <div class="submit">
                    <input type="submit" class="btn btn-primary" name="action" value="Add Event">
                </div>
            </form>
        </div>
    </main>
</body>

</html>