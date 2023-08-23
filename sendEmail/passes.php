<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passed</title>
</head>

<body>
    <h1>Congratulation!!!</h1>
    <h2>Dear Parent</h2>
    <h3>Your child {{ STUDENT_NAME }} has been seleted to WiseDigits Academy</h3>
    <p>Your Regitsration Number is {{ STUDENT_REGNO }}</p>
    <p>Default password: 12345678</p>
    <p>Follow the following link to login the student portal:

        <a href="http://localhost:8009/school_system/controllers/students/students_proc.php?id={{ STUDENT_REG_MD5 }}">student portal</a>
    </p>
</body>

</html>