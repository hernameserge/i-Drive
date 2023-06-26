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

    <link rel = "stylesheet" href = "../css/aboutus.css">
    <title> About Us </title>
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
                        <li class = "list"> <a class = "active" href = "aboutus.php"> About Us </a> </li>
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

    
    <div class = "cont-1-about-us"> 
        <h1 class = "title"> About Us </h1>
        <p class = "sub-title"> Know more about iDrive Driving School. </p>
    </div>

    <div class = "body-container">
        <center> <div class="title">
             
            <h1> Here in iDrive, </h1>
            <p> We ensure to bring you the safest learning experience. </p>
            
        </div> </center>
        
        <div class="card-container">
            <div class= "card card-one"> 
                <div class="image-one"> </div>
                <div class="information">
                    <h1> Provide Great Learning Experience </h1>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis assumenda quas excepturi voluptatum sed dolorem! Numquam fugiat quibusdam quia commodi eveniet corporis aperiam illo consequuntur?</p>
                </div>
            </div>
            <div class= "card card-two"> 
                <div class="image-two"> </div>
                <div class="information">
                    <h1> Easy Transaction </h1>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga libero! Animi culpa ipsa quos at sunt magni temporibus recusandae cupiditate beatae, libero quia ratione! </p>
                </div>
            </div>
            <div class="card card-three"> 
                <div class="image-three"> </div>
                <div class="information">
                    <h1> Top Driving School </h1>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero porro culpa quas eveniet tempore vel corrupti perferendis suscipit quidem! Dolorum nesciunt nulla beatae ex consequuntur. </p>
                </div>
            </div>
            <div class= "card card-four"> 
                <div class="image-four"> </div>
                <div class="information">
                    <h1> Quality Instructors </h1>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim repellat officiis illo adipisci quisquam, sapiente inventore dolores reprehenderit? In iste voluptas ducimus repellendus eius voluptates? </p>
                </div>
            </div>
        </div>

        <center> 

        <div class="mission-section">
            <div class="title">
                <h1> Mission </h1>
                <p> To provide students proper knowledge, technical know how and right values that <br> will make them an exceptional driver on and off the road for the betterment of society.</p>
            </div>
        </div>
        <div class="vision-section">
            <div class="title">
                <h1> Vision </h1>
                <p> Our vision is to become one of the best driving training school that can impact society by <br> providing disciplined and law-abiding drivers to minimize accidents and loss of lives on the road. </p>
            </div>
        </div>

        </center>

        <div class = "picture-container">
            <div class="pic-one"> </div>
            <div class="pic-two"> </div>
            <div class="pic-three"> </div>
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