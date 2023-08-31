<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('navbar.php');
    include('../../models/admin/adminClass.php');

    $dbo = new adminClass();
    $colData = $dbo->getRow($_SESSION['tableName'], $_POST['editBtn']);
    $_SESSION['selectedId'] = $_POST['editBtn'];
    ?>
    <main class='main'>
        <div class="main-content-holder">
            <form action="edit2.php" method="post" class="form-control" name="updateForm">
                <?php
                if (isset($_POST)) {
                    foreach ($colData as $col) {
                        foreach ($_SESSION["columns"] as $row) {
                            if ($row->Type == 'int') {
                                $dataType = 'number';
                                $disabled = '';
                                $value = '';
                            }
                            if (strpos($row->Type, 'varchar') !== false) {
                                $dataType = "text";
                                $disabled = '';
                                $value = '';
                            }
                            if ($row->Type == 'password') {
                                $dataType = 'password';
                                $disabled = '';
                                $value = '';
                            }
                            if ($row->Type == 'email') {
                                $dataType = 'email';
                                $disabled = '';
                                $value = '';
                            }
                            if ($row->Field == 'id') {
                                $value = $_POST['editBtn'];
                                $disabled = 'disabled';
                            }
                            echo "
                            <div class='mb-3'>
                                <label for='exampleFormControlInput1' class='form-label'>$row->Field</label>
                                <input type='$dataType' class='form-control' id='exampleFormControlInput1' name='$row->Field' $disabled value='$value'>
                            </div>
                            ";
                        }
                    }
                } else {
                    echo "No button clicked";
                }
                ?>
                <input class="btn btn-primary" type="submit" value="Submit" name='updateBtn'>
            </form>
        </div>
    </main>
</body>

</html>