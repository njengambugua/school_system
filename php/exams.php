<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/exam.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Interview Pursuit Admission Test</h1>
    </header>
    <div class="manyQuestions">

        <div class="question">
            <p>
                What color is the sky?
            </p>
            <div class="options">
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
            </div>
        </div>

        <div class="question">
            <p>
                What color is the sky?
            </p>
            <div class="options">
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
            </div>
        </div>

        <div class="question">
            <p>
                What color is the sky?
            </p>
            <div class="options">
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
                <div>
                    <input type="checkbox">Red
                </div>
            </div>
        </div>
        
    </div>
    <a id="submit" href="#">Submit</a>
    <script>
        var btn = document.querySelector('#submit')
        btn.addEventListener('click', ()=>{
            alert('You have completed your exam. Your parent will receive an email of your results.');
            open('../index.php')
        })
    </script>
</body>
</html>