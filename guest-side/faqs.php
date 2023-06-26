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

    <link rel = "stylesheet" href = "../css/faqs.css">
    <title> FAQs </title>
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
                        <li class = "list"> <a class = "active" href = "faqs.php"> FAQs </a> </li>
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
    
    <div class = "cont-1-faqs"> 
        <h1 class = "title"> FAQs </h1>
        <p class = "sub-title"> Frequenly Asked Questions, commonly asked questions from iDrive. </p>
    </div>

        <div id = "accordion" class = "grid-container"> 
            <div class = "accordion-container"> 
                <ul class = "faqs-label"> 
                    <li> 
                    <div class = "label-question"> 
                        <span class = "question"> Some question? </span>
                        <i class = "bx bxs-chevron-down arrow"> </i>
                    </div> 
                    <p class = "accordion-body" style = "display: none;"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, iure, voluptates aspernatur ducimus laudantium tenetur voluptatibus dicta, temporibus veniam laboriosam alias libero officiis doloribus nobis? </p>
                    <hr>
                    </li>
                    <li> 
                    <div id = "toggle-question" class = "label-question"> 
                        <span class = "question"> Some question? </span>
                        <i class = "bx bxs-chevron-down arrow"> </i>
                    </div> 
                    <p class = "accordion-body" style = "display: none;"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque nam accusantium expedita, suscipit deleniti ipsa? Vero iure neque numquam dolorem quo repudiandae perferendis earum harum. </p>
                    <hr>
                    </li>
                    <li> 
                    <div id = "toggle-question" class = "label-question"> 
                        <span class = "question"> Some question? </span>
                        <i class = "bx bxs-chevron-down arrow"> </i>
                    </div> 
                    <p class = "accordion-body" style = "display: none;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ipsa ratione eum dolore, commodi reprehenderit at debitis perferendis quasi culpa maxime illo. Expedita, perspiciatis aliquam. </p>
                    <hr>
                    </li>
                    <li> 
                    <div id = "toggle-question" class = "label-question"> 
                        <span class = "question"> Some question? </span>
                        <i class = "bx bxs-chevron-down arrow"> </i>
                    </div> 
                    <p class = "accordion-body"  style = "display: none;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim veniam perspiciatis doloremque, voluptatibus incidunt eius reiciendis sequi harum eveniet laboriosam consectetur illo rem temporibus ullam! </p>
                    <hr>
                    </li>
                </ul>
            </div>
            <div class = "question-form">
                <div class="title-question">
                    <h1> Are there more questions? </h1>
                    <p> Send us a message! </p>
                </div>
                <div class="fill-up-form">
                    <form> 
                        <label class="text-label"> Name </label> <input type="text" required>
                        <label class="text-label"> Email address </label> <input type="email" required>
                        <label class="text-label"> Message </label> <textarea rows = "5" placeholder="Message"> </textarea>
                        <center> <button type = "submit"> Submit </button> </center>
                    </form>
                </div>
            </div>
        </div>


    <script>

        $(document).ready(function(){   

            $("#active-question").slideDown(300);

            $(".label-question").click(function() {
                if($(this).next(".accordion-body").hasClass("active")){
                    $(this).next(".accordion-body").removeClass("active").slideUp(300);
                }

                else{
                    $(".accordion-body").slideUp(300);
                    $(".label-question").css("font-weight:", "bold");
                    $(this).next(".accordion-body").addClass("active").slideDown(300);
                }
            }); 

        });


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