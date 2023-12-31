<?php
session_start();
if ($_POST['action'] == 'Login') {
    if (preg_match('/^SDT/', $_POST['regno'])) {
        $_SESSION['loginData'] = $_POST;
        header('Location: ../controllers/students/students_proc.php');
    } elseif (preg_match("/^TCH/", $_POST['regno'])) {
        $_SESSION['loginData'] = $_POST;
        header('Location: ../controllers/teacher/teacher_proc.php');
    } elseif (preg_match("/^Admin/", $_POST['regno'])) {
        $_SESSION['loginData'] = $_POST;
        header('Location: ../controllers/admin/admin_proc.php');
    } else {
        header('Location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Culcheth_High_School_Logo.png" alt="">
        <div>
            <label>Admission No./Employee No.</label>
            <input type="text" name="regno">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password">
        </div>
        <section class="log">
            <input type="hidden" name="id" value="<?php echo $_SESSION['student_id']; ?>">
            <input id="loginBtn" type="submit" name="action" value="Login">
        </section>
        <div>
            <a href="#">Forgot Password?</a>
        </div>
    </form>
</body>

</html>