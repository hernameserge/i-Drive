<!DOCTYPE html>
<html lang = "en"> <!-- the godparent -->
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">

    <!-- Ajax Icons -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Boxicons CDN -->
    <link href = 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  

    <link rel = "stylesheet" href = "../css/contactus.css">
    <title> Contact Us </title>
</head>
<body>
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
                        <li class = "list"> <a href = "moreinfo.php"> More Information</a> </li>
                        <li class = "list"> <a class = "active" href = "contactus.php"> Contact Us </a> </li>
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

    <div class = "cont-1-contact-us"> 
        <h1 class = "title"> Contact Us </h1>
        <p class = "sub-title"> We lend our ears for those in need. </p>
    </div>

    <div class = "contact-us-form-container"> 
            <div class = "contact-info-cont"> 
                <h1 class = "title-inquiry"> <b> FOR MORE INQUIRIES: </b> <br> </h1>
                <p class = "contact apply one"> <i class='bx bxs-phone'> </i> 046-436-3009  </p> 
                <p class = "contact apply two"> <i class='bx bxs-phone'> </i> 046-885-6320 </p> 
                <p class = "contact apply three"> <i class='bx bxs-phone'> </i> 0961-408-6758  </p>  
                <p class = "contact apply four"> <i class ='bx bx-envelope'> </i> idrivedrivingschool@yahoo.com </p> 
                <p class = "contact apply five"> <i class ='bx bx-time'> </i> 8am - 5pm, Monday to Sunday </p>   
                
                <p class = "contact location apply six"> <i class='bx bx-location-plus' ></i> 2A Emilio Aguinaldo Hwy, Imus, 4103 Cavite </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.739829115806!2d120.93695877590923!3d14.384459182330218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d339c3bcd739%3A0xa1e57293aa613f34!2siDrive%20Driving%20School!5e0!3m2!1sen!2sph!4v1687162214133!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe>
            </div>
            <div class="contact-us-form">
                <form> 
                    <h3> Get in touch with us: </h3>
                    <input type = "text" id = "name" placeholder = "Name" required>  
                    <input type = "email" id = "name" placeholder = "Email" required>  
                    <input type = "text" id = "mobile-number" placeholder = "Mobile Number" required>  
                    <textarea id = "message" rows = 4 placeholder = "Message"> </textarea>
                    <button type = "submit"> Submit </button>
                </form>
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