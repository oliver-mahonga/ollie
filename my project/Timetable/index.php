<?php
if (isset($_GET['generated']) && $_GET['generated'] == "false") {
    unset($_GET['generated']);
    echo '<script>alert("Timetable not generated yet!!");</script>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Automatic Timetable Generator</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>

    <style>
        #button-section {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }
        #button-section {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }
        #social-icons {
            position: absolute;
            top: 20px; /* Adjust the top position */
            left: 20px; /* Adjust the left position */
            z-index: 999;
        }

        #social-icons a {
            margin: 0 5px; /* Adjust the margin */
        }

        #social-icons img {
            width: 30px; /* Adjust the width */
            height: 30px; /* Adjust the height */
        }

        .home-sec {
            padding-top: 0; /* Remove top padding */
        }

        .home-sec {
            padding-top: 0; /* Remove top padding */
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div align="center">
            <h3 align="center">COMPUTER SCIENCE DEPARTMENT TIMETABLE</h3>
            <!-- Social Media Icons -->
            <div id="social-icons">
                <a href="#"> <img src="assets/img/Social/facebook.png" alt=""/> </a>
                <a href="#"> <img src="assets/img/Social/google-plus.png" alt=""/></a>
                <a href="#"> <img src="assets/img/Social/twitter.png" alt=""/></a>
            </div>
        </div>
    </div>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="margin-bottom: 160px">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="assets/img/image3.png" alt="Chania">
        </div>
        
        <div class="item">
            <img src="assets/img/image2.png" alt="Chania">
        </div>

        <div class="item">
            <img src="assets/img/image3.png" alt="Flower">
        </div>
        <div class="item">
            <img src="assets/img/images1.png" alt="Flower">
        </div>
    </div>
</div>

<div class="container" id="button-section">
    <div align="center" STYLE="margin-top: 30px">
        <button data-scroll-reveal="enter from the bottom after 0.2s" id="studentLoginBtn" class="btn btn-info btn-lg">STUDENT LOGIN</button>
        <button data-scroll-reveal="enter from the bottom after 0.2s" id="teacherLoginBtn" class="btn btn-info btn-lg">TEACHER LOGIN</button>
        <button data-scroll-reveal="enter from the bottom after 0.2s" id="adminLoginBtn" class="btn btn-success btn-lg">ADMIN LOGIN</button>
    </div>
    <br>
    <div align="center">
        <form data-scroll-reveal="enter from the bottom after 0.2s" action="studentvalidation.php" method="post">
            <select id="select_semester" name="select_semester" class="list-group-item">
                <option selected disabled>Select Semester</option>
                <option value="3"> B.Tech II Year ( Semester III )</option>
                <option value="4"> B.Tech II Year ( Semester IV )</option>
                <option value="5"> B.Tech III Year ( Semester V )</option>
                <option value="6"> B.Tech III Year ( Semester VI )</option>
                <option value="7"> B.Tech IV Year ( Semester VII )</option>
                <option value="8"> B.Tech IV Year ( Semester VIII )</option>
            </select>
            <button type="submit" class="btn btn-info btn-lg" style="margin-top: 10px">Download</button>
        </form>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <style>
#myModal { z-index: 999; /* Sit on top */}
    </style>
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Modal Header</h2>
        </div>
        <div class="modal-body" id="LoginType">
            <!--Admin Login Form-->
            <div style="display:none" id="adminForm">
                <form action="adminFormvalidation.php" method="POST">
                    <div class="form-group">
                        <label for="adminname">Username</label>
                        <input type="text" class="form-control" id="adminname" name="UN" placeholder="Username ...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="PASS"
                               placeholder="Password ...">
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-default" name="LOGIN" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
        <!--Faculty Login Form-->
        <div style="display:none" id="facultyForm">
            <form action="facultyformvalidation.php" method="POST" style="overflow: hidden">
                <div class="form-group">
                    <label for="facultyno">Faculty No.</label>
                    <input type="text" class="form-control" id="facultyno" name="FN" placeholder="Faculty No. ...">
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-default" name="LOGIN">LOGIN</button>
                </div>
            </form>
        </div>
        <!-- Student Login Form -->
 <div style="display:none" id="studentForm">
            <form action="studentFormvalidation.php" method="POST" style="overflow: hidden">
                <div class="form-group">
                    <label for="studentName">Name</label>
                    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="studentEmail">Email</label>
                    <input type="email" class="form-control" id="studentEmail" name="studentEmail" placeholder="Enter your email">
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-default" name="LOGIN">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
    </div>
  </div>
</div>
 
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var teacherLoginBtn = document.getElementById("teacherLoginBtn");
var adminLoginBtn = document.getElementById("adminLoginBtn");
var studentLoginBtn = document.getElementById("studentLoginBtn"); // Add this line
var heading = document.getElementById("popupHead");
var facultyForm = document.getElementById("facultyForm");
var adminForm = document.getElementById("adminForm");
var studentForm = document.getElementById("studentForm"); // Add this line
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    adminLoginBtn.onclick = function () {
    modal.style.display = "block";
    heading.innerHTML = "Admin Login";
    adminForm.style.display = "block";
    facultyForm.style.display = "none";
    studentForm.style.display = "none"; // Add this line
}

teacherLoginBtn.onclick = function () {
    modal.style.display = "block";
    heading.innerHTML = "Faculty Login";
    facultyForm.style.display = "block";
    adminForm.style.display = "none";
    studentForm.style.display = "none"; // Add this line
}

studentLoginBtn.onclick = function () { // Add this block
    modal.style.display = "block";
    heading.innerHTML = "Student Login";
    studentForm.style.display = "block";
    adminForm.style.display = "none";
    facultyForm.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
    adminForm.style.display = "none";
    facultyForm.style.display = "none";
    studentForm.style.display = "none"; // Add this line
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<div id="news-section">
    <div class="container set-pad">
        <div class="row text-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">NEWS UPDATES</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
                <div class="news-div">
                    <h3 align="center">New Study Shows Benefits of Meditation</h3>
                    <hr/>
                    <p align="center">A recent study published in the Journal of Neuroscience reveals the positive impact of meditation on brain health.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                <div class="news-div">
                    <h3 align="center">Tech Company Announces Breakthrough in AI</h3>
                    <hr/>
                    <p align="center">Tech Innovations Inc. unveiled their latest artificial intelligence breakthrough, promising to revolutionize the industry.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.6s">
                <div class="news-div">
                    <h3 align="center">Global Summit Addresses Climate Change Crisis</h3>
                    <hr/>
                    <p align="center">World leaders gather in Paris for a historic summit aimed at combating the escalating climate change crisis.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container" align ="left">
    <div class="row set-row-pad">
        <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 "
             data-scroll-reveal="enter from the bottom after 0.4s">
            <h2><strong>Our Location </strong></h2>
            <hr/>
            <div>
                <h4>Meru, linturi road</h4>
                <h4>Linturi house</h4>
                <h4><strong>Call:</strong>+254791300315</h4>
                <h4><strong>Email: </strong>karihejames8@gmail.com</h4>
            </div>
        </div>
        


    </div>
</div>
<!-- CONTACT SECTION END-->
<div id="footer">
    <!--  &copy 2024 mydomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
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