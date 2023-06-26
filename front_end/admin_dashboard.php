<!DOCTYPE html>
<html>
    <head>
        <title>Administrator</title>
        <link href="../css/admin_dashboard.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/x-icon" href="../photos/idrive_logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!--BOOTSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    

    </head>
    <body>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="side-panel">
                            <button class="btn btn-danger close-button" id="closeBtn"><i class="fa-solid fa-x"></i></button>
                            <div class="dashboard-container">
                                <div class="logo-container">
                                    <h2><img src="../photos/idrive_logo.png" alt="">&nbsp;iDrive</h2>
                                </div>
                                <div class="account-name-container">
                                    <h2>Admin Dashboard</h2>
                                    <h3>Account B</h3>
                                </div>
                                <div class="buttons-container">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> <button><div class="photos-container"><img src="../photos/current_expense.png" alt="" style="height:50px; width:auto; float:left;"></div> Current Expense</button></li>
                                    <li class="list-group-item"> <button><div class="photos-container"><img src="../photos/current_income.png" alt="" style="height:50px; width:auto; float:left;"></div> Current Income</button></li>
                                    <li class="list-group-item"> <button><div class="photos-container"><img src="../photos/total_expense.png" alt="" style="height:50px; width:auto; float:left;"></div> Total Expense</button></li>
                                    <li class="list-group-item"><button><div class="photos-container"><img src="../photos/total_income.png" alt="" style="height:50px; width:auto; float:left;"></div> Total Income</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary position-fixed top-0 start-0 mt-3 ms-3" id="hamburgerBtn">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                        
                        <script>
                            // Handle hamburger menu button click
                            document.getElementById('hamburgerBtn').addEventListener('click', function() {
                            document.querySelector('.side-panel').classList.toggle('open');
                            });

                            // Handle close button click
                            document.getElementById('closeBtn').addEventListener('click', function() {
                            document.querySelector('.side-panel').classList.remove('open');
                            });
                        </script>
                    </div>
                    <div class="col-8">
                        <!--START-->
                        <div class="profile-container">
                            <div class="profile-image-container">
                                <div class="dropdown" style="padding-top:20px;">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://play-lh.googleusercontent.com/A6y8kFPu6iiFg7RSkGxyNspjOBmeaD3oAOip5dqQvXASnZp-Vg65jigJJLHr5mOEOryx" alt="" style="height:75px; width:75px;border:solid; border-radius:50%;">
                                    <span style="margin-left:5px;">&nbsp;Admin</span>&nbsp;
                                    
                                    </a>

                                    <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <ol style="list-style-type: none; padding-top:5px; padding-right:100px;">
                                            <li><a class="dropdown-item" href="#">Settings</a></li>
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END-->
                    </div>
                </div>
                <hr style="color:white;">
            </div>    
        </main>
    </body>
</html>