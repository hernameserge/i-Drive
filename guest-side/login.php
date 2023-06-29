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

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

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
                Don't have an iDrive account? <a href = "" id = "register-link"> Register </a>
            </div>
        </div>
    </div>

    <div class="modal-form" id = "modal">
            <div class="modal-content"> 
                <div class="modal-header"> Registration Form 
                    <span> <i id = "close" class='bx bx-x'> </i> </span>  
                </div> 
            <hr>
            <form action = "../front_end/register_student.php" method="POST">
            
                <div class="form-row"> 
                    <label for = "first_name"> First Name </label>
                    <input type="text" name="first_name" id="first_name" required>
                </div>
                <div class="form-row">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" required>
                </div>
                <div class="form-row">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" required>
                </div>
                <div class="form-row">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" required>
                </div>
                <div class="form-row">
                    <label for="email_address">Email Address</label>
                    <input type="email" name="register_email" id="email_address" required>
                </div>   
                <div class="form-row">      
                    <label for="password">Password</label>
                    <input type="password" name="register_password" id="password" required>
                </div>
                <div class="form-row">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" required>
                </div>
                <div class="form-row">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="number" name="mobile_number" id="mobile_number" required>
                </div>
                <div class="terms-agreement">
                    <input type="checkbox" id = "terms_and_conditions" value = "1"> <h1> I have read and agreed to the <a href = "index.php" target="_blank" rel="noopener noreferrer"> Terms and Agreements</a>. </h1>
                </div>
                
                <center> 

                <button id = "submit_button" class = "submit-btn" type="submit" name="register" disabled> Sign In </button>

                </center>

                <script>
                
                $(document).ready(function(){

                    $('#terms_and_conditions').click(function(){
                        if($(this).is(':checked')){
                            $('#submit_button').attr("disabled", false);
                        } 
                        else{
                            $('#submit_button').attr("disabled", true);
                        }
                    });

                });

                </script>
                 
            </form>
        </div>
    </div>

    <script>
                
        $(document).ready(function(){

            $('.modal-form').hide();

            $('#register-link').click(function(){ 
                $('.modal-form').show();
            });

            $('#close').click(function() {
                $('.modal-form').hide();
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