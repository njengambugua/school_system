<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/teacher/exam.css">
  <title>Teacher Portal</title>
</head>

<body>
  <?php include('../teacher_navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <form class="select_heads" method="post" action="../../controllers/exams/exams_proc.php">
        <div class="left-select-head">
          <select name="level" class="select-grade" id="grade" required>
            <option value="" selected>Select Grade</option>
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
        <div class="exam">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Exam Question</label>
            <textarea class="form-control textarea" name="question" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <div class="form-group">
              <label for="">Answer One</label>
              <input type="text" class="form-control ans_input" name="answer1" id="" aria-describedby="helpId" placeholder="Enter first answer">
            </div>
          </div>

          <div class="mb-3">
            <div class="form-group">
              <label for="">Answer Two</label>
              <input type="text" class="form-control ans_input" name="answer2" id="" aria-describedby="helpId" placeholder="Enter third answer">
            </div>
          </div>


          <div class="mb-3">
            <div class="form-group">
              <label for="">Answer Three</label>
              <input type="text" class="form-control ans_input" name="answer3" id="" aria-describedby="helpId" placeholder="Enter first answer">
            </div>
          </div>


          <div class="mb-3">
            <div class="form-group">
              <label for="">Answer Four</label>
              <input type="text" class="form-control ans_input" name="answer4" id="" aria-describedby="helpId" placeholder="Enter fourth answer">
            </div>
          </div>

          <button onclick="selectValues(event)" class="form-control select-ans-btn">Select Answer</button>

          <div class="mb-3 select">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name='correct_answer'>
            </select>
          </div>
        </div>
        <input class="select-grade" id="sel_grade" type="submit" name="action" value="Filter">
      </form>
    </div>
  </main>
  <script>
    const inputs = document.querySelectorAll(".ans_input");
    const selectHolder = document.querySelector(".select");
    const buttonSelect = document.querySelector(".select-ans-btn");

    function selectValues(event) {
      event.preventDefault();
      let values = [];

      inputs.forEach((input) => {
        if (input.value.length > 0) {
          values.push(input.value);
        }
      });

      let selectEl = selectHolder.querySelector("select");

      if (values.length > 0) {
        selectHolder.style.display = "flex";
        selectEl.innerHTML = "";

        values.forEach((item) => {
          selectEl.innerHTML += `<option value="${item}">${item}</option>`;
        });

        buttonSelect.setAttribute("disabled", true);
      } else {
        alert("Please enter answers");
      }
    }

    inputs.forEach((x) => {
      x.addEventListener("input", () => {
        buttonSelect.removeAttribute("disabled");
      });
    });
  </script>
</body>

</html>