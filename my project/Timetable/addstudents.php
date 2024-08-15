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
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
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
                <li><a href="addteachers.php">ADD TEACHERS</a></li>
                <li><a href="addstudents.php">ADD STUDENT</a></li>
                <li><a href="addsubjects.php">ADD SUBJECTS</a></li>
                <li><a href="addclassrooms.php">ADD CLASSROOMS</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ALLOTMENT
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=allotsubjects.php>THEORY COURSES</a>
                        </li>
                        <li>
                            <a href=allotpracticals.php>PRACTICAL COURSES</a>
                        </li>
                        <li>
                            <a href=allotclasses.php>CLASSROOMS</a>
                        </li>
                    </ul>
                </li>
                <li><a href="generatetimetable.php">GENERATE TIMETABLE</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br><br><br>
<!--
<div align="center" style="margin-top:60px">
    <form name="import" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" name="subjectexcel" id="subjectexcel" class="btn btn-info btn-lg" value="IMPORT EXCEL"/>
    </form>
    <?php
    if (isset($_POST['subjectexcel'])) {
        if (empty($_FILES['file']['tmp_name'])) {
            echo '<script>alert("Select a file first! ");</script>';
        } else {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, 'r');
            if ($handle !== false) {
                while (($filesop = fgetcsv($handle, 1000)) !== false) {
                    $name = $filesop[0];
                    $email = $filesop[1];
                    if ($name == "" || $name == "Student Name") {
                        continue;
                    }
                    $conn = mysqli_connect("localhost", "root", "", "ttms");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "INSERT INTO students (name, email) VALUES ('$name','$email')";
                    if (mysqli_query($conn, $sql)) {
                        echo '<script>alert("Data inserted successfully.");</script>';
                    } else {
                        echo '<script>alert("Error inserting data: ' . mysqli_error($conn) . '");</script>';
                    }
                    mysqli_close($conn);
                }
                fclose($handle);
            } else {
                echo '<script>alert("Error opening file.");</script>';
            }
        }
    }
    ?>
</div>
-->
<div align="center" style="margin-top: 20px">
    <button id="subjectmanual" class="btn btn-success btn-lg">ADD STUDENT</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add Student</h2>
        </div>
        <div class="modal-body" id="EnterSubject">
            <!--Admin Login Form-->
            <div style="display:none" id="addSubjectForm">
                <form action="addstudentFormValidation.php" method="POST">
                    <div class="form-group">
                        <label for="studentname">Student's Name</label>
                        <input type="text" class="form-control" id="studentname" name="SN"
                               placeholder="Student's Name ...">
                    </div>
                    <div class="form-group">
                        <label for="studentemail">Student's Email</label>
                        <input type="text" class="form-control" id="studentemail" name="SE" placeholder="Student's Email...">
                    </div>
                    <div align="right" class="form-group">
                        <input type="submit" class="btn btn-default" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addsubjectBtn = document.getElementById("subjectmanual");
    var heading = document.getElementById("popupHead");
    var subjectForm = document.getElementById("addSubjectForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addsubjectBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        subjectForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        subjectForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 50px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

<script>
    function deleteHandlers() {
        var table = document.getElementById("studentstable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createDeleteHandler = function(row) {
                return function() {
                    var nameCell = row.getElementsByTagName("td")[0]; // Assuming the first column contains the student name
                    var name = nameCell.innerHTML;
                    if (confirm("Are You Sure?")) {
                        window.location.href = "deletestudent.php?name=" + name;
                    }
                };
            };
            currentRow.cells[3].onclick = createDeleteHandler(currentRow);
        }
    }

    // Call the function when the page is loaded
    window.onload = deleteHandlers;
    window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
            var message = urlParams.get('message');
            if (message) {
                alert(message); // Display the notification message
                // You can also use a better notification method here, like a toast message
            }
        }
</script>

    <table id="studentstable" style="margin-left: 90px">
        <caption><strong> Students' Information</strong></caption>
        <tr>
            <th width="150">ID</th>
            <th width="300">Name</th>
            <th width="250">Email</th>
            <th width="40">Action</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT * FROM students ORDER BY id ASC ");
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td><button>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>
</div>
<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
--></div>
<!-- FOOTER SECTION END-->

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
<!--  Flexslider Scripts -->
<script src="assets/js/jquery.flexslider.js"></script>
<!--  Scrolling Reveal Script -->
<script src="assets/js/scrollReveal.js"></script>
<!--  Scroll Scripts -->
<script src="assets/js/jquery.easing.min.js"></script>
<!--  Custom Scripts -->
<script src="assets/js/custom.js"></script>
</body>
</html>

