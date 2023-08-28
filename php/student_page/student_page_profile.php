<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../../css/student/main.css">

    <link rel="stylesheet" href="../../css/student/profile.css">
</head>

<body>
    <?php
    include('../../php/student_navbar.php');
    ?>
    <main class="main">
        <div class="main-content-holder">
            <?php
            $studentParentInfo = (object)include('../../controllers/students/get_student_parent_details_proc.php');
            foreach ($studentParentInfo as $information);
            ?>
            <article class="studentArticle">
                <div>
                    <h1>Student Details</h1>
                </div>
                <div id="info">
                    <div class='details'>
                        <span><strong>Name: </strong><?php echo $information->Name?></span>
                        <span><strong>Reg No: </strong><?php echo $information->regno?></span>
                        <span><strong>Age: </strong> <?php echo $information->Age?></span>
                        <span><strong>Level: </strong> <?php echo $information->Level?></span>
                        <span><strong>Gender: </strong> <?php echo $information->Gender?></span>
                        <span><strong>Religion: </strong> <?php echo $information->parentReligion?></span>
                    </div>
                    <div class="avatar img">
                        <img src="../../images/yellow_grt.jpg" alt="profile image" />
                    </div>

                </div>
            </article>

            <article class="studentArticle">
                <div>
                    <h1>Parent Details</h1>
                </div>
                <div class='details'>
                    <span><strong>Name: </strong><?php echo $information->parentName?></span>
                    <span><strong>Contact:</strong> <?php echo $information->Contact?></span>
                    <span><strong>Email:</strong> <?php echo $information->Email?></span>
                    <span><strong>Gender:</strong> <?php echo $information->parentGender?></span>
                    <span><strong>Religion:</strong> <?php echo $information->parentReligion?></span>
                    <span><strong>Location:</strong><?php echo $information->Location?></span>
                    <span><strong>Relationship:</strong> <?php echo $information->Relationship?></span>
                    <span><strong>Occupation:</strong> <?php echo $information->Occupation?></span>
                </div>
            </article>
        </div>
    </main>
</body>

</html>