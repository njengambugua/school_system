<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <section id="navbar">
        <div id="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Culcheth_High_School_Logo.png" alt="School Logo">
            <h2 style="color: black">Wisedigits Day and Boarding School</h2>
        </div>
        <div id="options">
            <ul>
                <li>
                    <a href="./index.php">Home</a>
                    <a href="php/admission.php">Admissions</a>
                    <a href="controllers/fee/fee_proc.php?id=<?php echo md5(1) ?>">Fees</a>
                    <a href="php/about.php">About</a>
                    <a href="./php/login.php">Login</a>
                </li>
            </ul>
        </div>
    </section>
    <div id="wholeBody">
        <article>
            <div class="img1">
                <img class="avator" src="https://www.naperville203.org/cms/lib/IL01904881/Centricity/Domain/9/20221110_085746.jpg" alt="elementary_sch">
                <h2 class="sch_name animate--slow animate--reals slideInLeft">Welcome to Wisedigits Day and Boarding School</h2>
                <h3 class="sch_motto animate--fast animate--forever slideInLeft">Empowering Young Minds, Inspiring futures</h3>
                <a href="#"></a><button class="cta">Admissions</button></a>
            </div>
        </article>
    </div>
</body>

</html>