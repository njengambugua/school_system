<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <section id="navbar">
        <div id="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Culcheth_High_School_Logo.png" alt="School Logo">
        </div>
        <div id="options">
            <ul>
                <li>
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Admissions</a>
                    <a href="#">Fees</a>
                    <a href="#">Login</a>
                </li>
            </ul>
        </div>
    </section>
    <form id="wholeBody" method="post" action="../controllers/applicant/applicant_proc.php">
        <div id="studentinfo">
            <h4 for="">Student Information</h4>
            <div id="studInfo">
                <div id="info">
                    <label>Name</label>
                    <input type="text" name="Name">
                    <!-- <input type="text"> -->
                </div>
                <div id="info">
                    <label>Age</label>
                    <input type="number" name="Age">
                    <!-- <input type="number"> -->
                </div>
                <div id="info">
                    <label>Gender</label>
                    <select name="Gender">
                    <!-- <select> -->
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div id="info">
                    <label>Level of education</label>
                    <select name="Level">
                    <!-- <select> -->
                        <option value="PP1">PP1</option>
                        <option value="PP2">PP2</option>
                        <option value="Grade_1">Grade 1</option>
                        <option value="Grade_2">Grade 2</option>
                        <option value="Grade_3">Grade 3</option>
                        <option value="Grade_4">Grade 4</option>
                        <option value="Grade_5">Grade 5</option>
                        <option value="Grade_6">Grade 6</option>
                        <option value="Form_1">Form 1</option>
                        <option value="Form_2">Form 2</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="studentinfo">
            <h4 for="">Parents Information</h4>
            <div id="studInfo">
                <div id="info">
                    <label>Name</label>
                    <input type="text" name="parentName">
                </div>
                <div id="info">
                    <label>Gender</label>
                    <select name="parentGender">
                        <option value="Male">Male</option>
                        <option value="Female ">Female</option>
                    </select>
                </div>
                <div id="info">
                    <label>Occupation</label>
                    <input type="text" name="parentOccupation">
                </div>
                <div id="info">
                    <label>Contact</label>
                    <input type="text" name="parentContact">
                </div>
                <div id="info">
                    <label>Religion</label>
                    <select name="parentReligion">
                        <option>Christianity</option>
                        <option>Islam</option>
                        <option>Hinduism</option>
                        <option>Buddhism</option>
                        <option>Judaism</option>
                        <option>None</option>
                    </select>
                </div>
                <div id="info">
                    <label>Relationship</label>
                    <input type="text" name="parentRelationship">
                </div>
                <div id="info">
                    <label>Location</label>
                    <input type="text" name="parentLocation">
                </div>
            </div>
        </div>
        <input type="submit" id="btn" value="Apply" name="action">
    </form>
</body>

</html>