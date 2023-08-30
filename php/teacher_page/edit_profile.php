<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/teacher/edit_profile.css">
    <link rel="stylesheet" href="../../css/colors.css">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    // print_r($_SESSION['teacher_data']);
    ?>

    <form action="edit2.php" method="post">
        <div id='dataDiv'>
            <?php
            foreach ($_SESSION['teacher_data'] as $key => $value) {
                echo "
                <div id='record'>
                    <label>$key</label>
                    <input type='text' value='$value' name='$key'>
                </div>
                ";
            }
            ?>
        </div>
        <div id='btnDiv'>
            <button type='submit' name="submit">Submit</button>
        </div>
    </form>
</body>

</html>