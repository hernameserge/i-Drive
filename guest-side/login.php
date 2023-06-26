<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>

    <link rel = "stylesheet" href = "../css/login.css" type="text/css"/>
    
    <!-- Ajax Icons -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Boxicons CDN -->
    <link href = 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  

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
                        <li class = "list"> <a href = "contactus.php"> Contact Us </a> </li>
                        <li class = "list"> 
                            <a class = "login-btn-container" href = "#"> 
                                <button class = "login-btn"> Login </button> 
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class = "cont-1-login"> 
    </div>

    <div class="login-container"> 
        <div class = "login-form"> 
            <h1> Login </h1>
            <form action = "../backend/log_in.php" method="POST"> 
                <div class="text-field"> 
                    <input type="email" name="email_login" placeholder="Email Address" required> 
                </div>
                <span class = "line-animate"> </span>
                <div class="text-field"> 
                    <input type="password" name="password_login" placeholder="Password" required> 
                </div>
                <span class = "line-animate"> </span>
                <div class="password-form"> Forgot Password? </div>

                <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                <input type="submit" value="Login" name = "login">

            </form>

            <div class="signup"> 
                Don't have an iDrive account? <a href = ""> Register </a>
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