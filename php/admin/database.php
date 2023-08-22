<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/student/timetable.css">
    <title>Admin Database</title>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('navbar.php');
    include('../../models/admin/adminClass.php');
    $class = new adminClass;
    ?>
    <main class="main">
        <div class="main-content-holder">
            <form  method="post" action="" id="dayDiv">
                <select name="table" id="days">
                    <option selected disabled>Choose Table</option>
                    <?php
                    foreach($class->retrieveTables() as $tables) {
                        echo "<option class='dayOptions' value=$tables[0]>$tables[0]</option>";
                    }
                    ?>
                </select>
              <input type="submit" value="Display" name="action" id="sortButton">
            </form>
            <?php
            if(isset($_POST['action'])) {
                echo "Button clicked<br>";
                echo "Table chosen: " . $_POST['table'];
                $results = $class->select($_POST['table']);
                print_r($results);
            }
            ?>
            
        </div>
    </main>
</body>
</html>