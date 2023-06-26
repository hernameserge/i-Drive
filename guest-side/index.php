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

    <link rel = "stylesheet" href = "../css/index.css">
    <title> Home </title>
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
                        <li class = "list"> <a class = "active" href = "index.php"> Home </a> </li>
                        <li class = "list"> <a href = "aboutus.php"> About Us </a> </li>
                        <li class = "list"> <a href = "courses.php"> Courses </a> </li>
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

    <div class = "cont-1-bg-img-1"> 
            <h1> YOU Drive, i-Drive! </h1>
            <h3> Your partner on safe and reliable driving experience. </h3>
                
             <div class = "btn-enr-container">
                    <a href = "#"> 
                        <button class = "enroll-now-btn"> Enroll Now </button>
                    </a> 
             </div>
    </div>

    <div class = "cont-2-bg-clr-2"> <!-- Featured Courses Section -->
            <center> <h1> Featured Courses </h1> </center>
        <div class = "card-container"> 
            <div class = "card card-1">
                <div class = "card-image"> </div>
                    <h2> Theoretical Driving Course (TDC)  </h2>
                    <p> A 15-hour seminar or classroom session where all attendees are expected to learn about the basics of driving and road safety. </p>
                <div class = "box-btn-1"> <a href = ""> View More </a> </div>
            </div>
            <div class = "card card-2">
                <div class = "card-image"> </div>
                    <h2> Practical Driving Course (PDC) </h2>
                    <p> The Practical Driving Course requires a round of driving or riding in the obstacle course. The types of vehicle available for rent are motorcycles, manual cars, automatic cars and light trucks. </p>
                <div class = "box-btn"> <a href = ""> View More </a> </div>
            </div>
        </div>
    </div>

    <div class = "cont-4-bg-clr-4"> 
        <div class = "question-img">
             <img src = "../img/question-mark.png">
        </div> 
        <div class = "accordion-text">
            <div class="title"> Frequently Asked Questions </div>
            <ul class = "faqs-label"> 
                <li> 
                    <div class = "label-question"> 
                        <span class = "question"> Is iDrive Driving School accredited by LTO? </span>
                        <i class = "bx bxs-chevron-down arrow"> </i>
                    </div> 
                    <p> Yes, we are accredited by LTO. You can see us on this list under Region 4A from LTO official website at <a href = ""> https://lto.gov.ph/lto-accreditation/list-of-accredited-driving-schools.html#region-4a </a> </p>
                    <span class = "line"> </span>
                </li>
                <li> 
                    <div class = "label-question"> 
                        <span class = "question"> What are the requirements needed if a person is below 18 wants to learn how to drive? </span>
                        <i class = "bx bxs-chevron-down arrow"> </i>
                    </div> 
                    <p> Below 18 years of age are considered MINORS in the Philippines. This is according to Republic Act No. 6809. If the student is minor, he/she must provide Parent/Guardian 1 pc. of Photocopy of ID with picture and signature. </p>
                    <span class = "line"> </span>
                </li>

                <a href = ""> 
                    <button class = "accordion-btn"> View More FAQs </button> 
                </a>
                 
            </ul>
        </div>
    </div>

    <script>

        let li = document.querySelectorAll('.faqs-label li');
          /*  console.log(li); /* checking Node List */ 
        
        for (var i = 0; i < li.length; i++) {
            li[i].addEventListener("click", (e)=> {

                let clickedLi; 

                if (e.target.classList.contains("label-question")) {
                    clickedLi = e.target.parentElement;
                   /* console.log(clickedLi); /* console target troubleshoot */ 
                } 

                else {
                    clickedLi = e.target.parentElement.parentElement;
                }

                clickedLi.classList.toggle("reveal-content"); 
                
            })   
        }
        
    </script>

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
    

</body>

</html>