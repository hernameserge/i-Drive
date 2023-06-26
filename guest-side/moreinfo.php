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

    <link rel = "stylesheet" href = "../css/moreinfo.css">
    <title> More Information </title>
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
                        <li class = "list"> <a href = "courses.php"> Courses </a> </li>
                        <li class = "list"> <a href = "faqs.php"> FAQs </a> </li>
                        <li class = "list"> <a class = "active" href = "moreinfo.php"> More Information</a> </li>
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
    
    <div class = "cont-1-more-info"> 
        <h1 class = "title"> More Information </h1>
        <p class = "sub-title"> Here's an overview about driving school and other important information you need to know. </p>
    </div>
    
    <div class = "body-container">
        <div class="information-container">
            <div class="label-question">
                <h1> What is a driver's license? </h1>
                <hr>
                <div class="answer">
                    <p> Under the Republic Act No. 4136, a driver's license is an official document issued by the government that permits a specific individual to operate one or more types of motorized vehicles on a public road.</p>
                </div>
            </div>
            <div class="label-question">
                <h1> Is it required to enroll on a driving school first before getting a license? </h1>
                <hr> 
                <div class="answer">
                    <p> Yes, Land Transportation Office (LTO) issued new guidelines on accreditation and supervision of driving schools, as well as the standardization of driver and conductor's education. It was released on March 22, 2023 and were set to take effect on April 15, 2023.</p>
                </div>
            </div>
            <div class="label-question">
                <h1> iDrive Account  </h1>
                <hr>
                <div class="answer">
                    <p> Every student who are enrolled to this driving school have an iDrive account. There you can easily enroll, transact, view your progress, and your schedule for you to be informed. </p>
                </div>
            </div>
            <div class="label-question">
                <h1> 10-year validity of Driver's License  </h1>
                <hr>
                <div class="answer">
                    <p> LTO has issuing about the 10-year validity of driver's license. In renewing your expired driver's license, you will need to pass the examination of CDE or Comprehensive Driver's Education. You can take this exam at LTO's new website system called LTMS Portal that also requires you to make an account. <br> <br>

                    If you want to have a quick refresher, iDrive Driving School would like to give you a special assessment reviewer for this exam just for free that can be found after you registered an iDrive account. (Note that, the sample questions we have prepared are only for your convenience and does not guarantee passing the CDE exam. Also, your results is not recorded in our system.)  
                    </p>
                </div>
            </div>
        </div>
    </div>

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