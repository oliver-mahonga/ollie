<?php
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Hello, <?php echo $_SESSION['loggedin_name']; ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br><br><br>
<!-- Selection field and buttons for viewing timetable -->
<div align="center">
    <form action="facultypage.php" method="post">
        <select name="select_teacher" class="list-group-item">
            <option selected disabled>Select Teacher</option>
            <?php
            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT * FROM teachers ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<option value=\"{$row['faculty_number']}\">{$row['name']}</option>";
            }
            ?>
        </select>
        <button type="submit" id="viewteacher" class="btn btn-success btn-lg" style="margin-top: 5px">VIEW TIMETABLE
        </button>
    </form>
    <form action="facultypage.php" method="post">
        <select name="select_semester" class="list-group-item">
            <option selected disabled>Select Semester</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <button type="submit" id="viewsemester" style="margin-top: 5px" class="btn btn-success btn-lg">VIEW TIMETABLE
        </button>
    </form>
</div>
<!-- End selection field and buttons -->

<!-- Evaluation Form -->
<div id="evaluationForm" style="display: none;">
    <form id="evaluationForm" action="submit_evaluation.php" method="post">
        <div align="center" style="margin-top: 10px">
            <input type="text" name="teacherName" placeholder="Enter Teacher's Name" required>
            <input type="number" name="score" placeholder="Enter Score (0-10)" min="0" max="10" required>
            <button type="submit" id="submitEvaluation" class="btn btn-success btn-lg" style="margin-top: 5px">SUBMIT
            </button>
        </div>
    </form>
</div>
<!-- End Evaluation Form -->

<!-- Button to toggle Evaluation Form -->
<div align="center" style="margin-top: 10px">
    <button type="button" id="toggleEvaluationForm" class="btn btn-info btn-lg">EVALUATE TEACHER</button>
</div>

<!-- Teachers' Details Table -->
<div align="center">
    <table id="teacherstable" style="margin-left: 80px">
    <caption><strong>Teacher's Information</strong></caption>
        <tr>
            <th width="130">Faculty No</th>
            <th width=290>Name</th>
            <th width=100>Alias</th>
            <th width="190">Designation</th>
            <th width="190">Contact No.</th>
            <th width="290">Email ID</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT * FROM teachers ORDER BY faculty_number ASC");

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['faculty_number']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['alias']}</td>
                    <td>{$row['designation']}</td>
                    <td>{$row['contact_number']}</td>
                    <td>{$row['emailid']}</td>
                    </tr>\n";
        }
        ?>
        </tbody>
    </table>
</div>
<!-- End Teachers' Details Table -->

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>

<script>
    // JavaScript to toggle Evaluation Form visibility
    document.getElementById('toggleEvaluationForm').addEventListener('click', function () {
        var evaluationForm = document.getElementById('evaluationForm');
        if (evaluationForm.style.display === 'none' || evaluationForm.style.display === '') {
            evaluationForm.style.display = 'block';
        } else {
            evaluationForm.style.display = 'none';
        }
    });
</script>
</body>
</html>