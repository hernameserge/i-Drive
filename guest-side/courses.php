<?php 

?> 

<!DOCTYPE html>
<html lang = "en"> <!-- the godparent -->
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">

    <!-- Ajax Icons -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Boxicons CDN -->
    <link href = 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href = "../css/courses.css">
    <title> Courses </title>
</head>
<body> <!-- main parent, godparent's child --> 
    <header> <!--sibling 1 -->
        <div class = "navigation-bar-container"> 
            <nav class = "navbar"> <!-- parent of 1 & 2  -->
                
                <input type = "checkbox" id = "check" class = "chkbox"> 
                <label for ="check" class = "hamburger-btn"> 
                    <i class='bx bx-menu'> </i> 
                </label> 

                <div class = "logo-container"> <!-- 1 -->
                    <img src = "../img/i-drive-logo.png" class = "logo"> <strong class = "idrive-name"> i-Drive </strong> 
                </div> 
                <div class = "navbar-list-container"> <!-- 2 -->
                    <ul class = "navbar-list">
                        <li class = "list"> <a href = "index.php"> Home </a> </li>
                        <li class = "list"> <a href = "aboutus.php"> About Us </a> </li>
                        <li class = "list"> <a class = "active" href = "courses.php"> Courses </a> </li>
                        <li class = "list"> <a href = "faqs.php"> FAQs </a> </li>
                        <li class = "list"> <a href = "moreinfo.php"> More Information</a> </li>
                        <li class = "list"> <a href = "contactus.php"> Contact Us </a> </li>
                        <li class = "list"> 
                            <a class = "login-btn-container" href = "login.php"> 
                                <button class = "login-btn"> Login </button> 
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class = "cont-1-courses"> 
        <h1 class = "title"> Courses </h1>
        <p class = "sub-title"> Ready to be a safe i-Driver? Learn more about the courses. </p>
    </div>

    <section class = "cont-bg">
            <div id = "section-one" class="selection-courses grid-position">
                <h1 class = "courses"> Available courses: </h1>
                <a id = "button-toggle-one" target = "1" class="btn-hover tdc-btn"> Theoretical Driving Course (TDC) </a>
                <a id = "button-toggle-two" target = "2" class = "btn-hover pdc-btn"> Practical Driving Course (PDC) </a>
            </div>

            <div class="vertical-line"> </div>

            <div id = "start-section" style = "display: block;"> </div>

            <div id = "section-article-one" class="section-article">
                    <h1 class = "article-title"> Theoretical Driving Course (TDC) </h1>
                    <div class="img-one"> </div>

                    <ul class = "list-margin">
                        <li> A requirement for taking student permit. </li>
                        <li> A 15-hour duration course (2 whole day sessions). </li>
                        <li> Written Examination (3 chances of re-takes) </li>
                        <li> Receives TDC Certificate of Completion upon passing the exam. </li>
                    </ul>

                    <p> Our driving program is intended to provide students the information and abilities they need to drive safely and responsibly. The training covers a broad range of subjects, such as traffic regulations, defensive driving methods, and car upkeep. <br> <br>

                    The course is broken down into a number of lectures, each of which focuses on a different component of driving. First will be the fundamentals of vehicle operation, such as starting the engine, changing gears, and applying the brakes. <br> <br>

                    Then proceed to instructs pupils on how to cross junctions, merge onto highways, and park their cars while emphasizing traffic laws and road signs. <br> <br>

                    Next discusses defensive driving methods include looking for hazards in the distance, anticipating them, and keeping a safe following distance. Moreover, students will learn how to respond to emergencies like hydroplaning and skidding
                    </p>
                    
                </div>

                <div id = "section-article-two" class="section-article">
                    <h1 class = "article-title"> Practical Driving Course (PDC)  </h1>
                    <div class="img-two"> </div>
                    <p> Our practical driving course (PDC) is designed to provide students with the hands-on skills and knowledge necessary to become safe and responsible drivers. The course covers a wide range of topics, including vehicle control, traffic laws, and defensive driving techniques. 
                    <br> <br>
                    Through practical driving course, the student are able to drive through public roads with the assistance of the instructors. We also offer practical driving course on various vehicles such as Motorcycles, SUV, Sedan, and Tricycle. <br> <br>
                    Upon completion of the PDC, students will be well-prepared to take their driving test and obtain their driver's license. Our goal is to help students become confident and competent drivers who are able to safely navigate the roads.
                </p>
                </div>
            </div>

            <div class="box-container-ads">
                <h1> Are you going to take any of these course? </h1>
                <button> <a href = "login.php"> Enroll Now </button> </a> 
            </div>
        </div>
    </section>

    <footer> 
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col col-1">
                    <h3> i - Drive </h4>
                    <ul>
                        <li> <a href = "aboutus.php"> About Us </a> </li>
                        <li> <a href="#"> Terms of Service </a> </li>
                        <li> <a href="#"> Privacy Policy </a> </li>
                    </ul>
                </div>
                <div class="footer-col col-2">
                    <h3> For Your Information </h4>
                    <ul>
                        <li> <a href = "faqs.php"> FAQs </a> </li>
                        <li> <a href = "moreinfo.php"> More Information </a> </li>
                    </ul>
                </div>
                <div class="footer-col col-3">
                    <h3> More Questions? </h4>
                    <ul>
                        <li> <a href = "contactus.php"> Contact Us </a> </li>
                    </ul>
                </div>
                <div class="footer-col col-4">
                    <h3> Be a Safe i-Driver </h4>
                    <ul>
                        <li> <a href = "#"> Register </a> </li>
                    </ul>
                </div>
        </div>
    </div>
            <div class = "footer-2">
                <p> Copyright &#169; NCST BSIT-32M1 Group 4, All Rights Reserved. </p> 
            </div>

    </footer>

    
    <script>

    $(document).ready(function(){

        $(".cont-bg").css("height", "800px");
        $("#section-article-one").hide();
        $("#section-article-two").hide();

       $("#button-toggle-one").click(function(){
            $('#section-article-one').show();
            $('#section-article-two').hide();
       });

       $("#button-toggle-two").click(function(){
            $("#section-article-two").show();
            $('#section-article-one').hide();
       });

    })
    
    </script>

</body>
</html>