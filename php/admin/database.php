<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/student/timetable.css">
    <link rel="stylesheet" href="../../css/teacher/view_academics.css">
    <title>Admin Database</title>
</head>

<body>
    <?php
    include('navbar.php');
    include('../../models/admin/adminClass.php');
    $class = new adminClass;
    ?>
    <main class="main">
        <div class="main-content-holder">
            <form method="post" action="" id="dayDiv">
                <select name="table" id="days">
                    <option selected disabled>Choose Table</option>
                    <?php
                    foreach ($class->retrieveTables() as $tables) {
                        echo "<option class='dayOptions' value=$tables[0]>$tables[0]</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Display" name="action" id="sortButton">
            </form>

            <?php
            if (isset($_POST['action'])) {
            ?>
                <!-- sad -->
                <?php
                echo "<h1>Table chosen: " . $_POST['table'] . "</h1>";
                $_SESSION['tableName'] = $_POST['table'];
                ?>

                <!-- Table Head -->
                <table class="table table-bordered table-academics">
                    <thead class="thead-academics">
                        <?php
                        $_SESSION['tableDesc'] = $class->aboutTable($_POST['table']);
                        foreach ($class->aboutTable($_POST['table']) as $columns) {
                            echo "<th scope='col'>$columns->Field</th>";
                        }
                        $_SESSION["columns"] = $class->aboutTable($_POST['table']);
                        $obj = new stdClass;
                        $obj->admin = 1;
                        echo "
                        <th>Edit</th>
                        <th>Delete</th>
                        ";
                        ?>
                    </thead>

                    <!-- Table Body -->
                    <?php
                    if (isset($_POST['action'])) {
                        $results = (object)$class->select($_POST['table']);
                        echo "
                        <tbody class='tbody-academics'>
                        ";
                        foreach ($results as $record) {
                            echo "
                            <tr>";
                            foreach ($record as $cols) {
                                echo "
                                <td>$cols</td>
                                ";
                            }
                            echo "
                            <form name='id' action='editRecord.php' method='post'>
                                <td>
                                    <button name='editBtn' id='editBtn' type='submit' value = '$record->id'>EDIT</button>
                                </td>
                            </form>
                            <form action='deleteRecord.php' method='post'>
                                <td>
                                    <button name='deleteBtn' id='deleteBtn' type='submit' value = '$record->id'>DELETE</button>
                                </td>
                                </form>
                                ";
                            echo "
                            </tr>
                            ";
                        }
                        echo "
                        </tbody>
                        ";
                    }
                    ?>
                </table>
                <!--  asdsa-->
            <?php
            }
            ?>
        </div>
    </main>
</body>

</html>