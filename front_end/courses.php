<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body, html {
        height: 100%;
    }

    .center-screen {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php 
        session_start();
        if($_SESSION['student_course'] !== ""){
            echo '<div class="col">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">You Are currently Enrolled to '.$_SESSION['student_course'].' Driving Course.</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <button class="btn btn-primary" name="Theoretical" value="Theoretical" onclick="theoretical()">Enroll Now</button>
                </div>
            </div>
        </div>';
        }
        
    ?>

    <div class="center-screen">
        <div class="container">
            <h1 class="text-center">CHOOSE COURSE TO ENROLL</h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Theoretical Driving Class</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <button class="btn btn-primary" name="Theoretical" value="Theoretical" onclick="theoretical()">Enroll Now</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Practical Driving Class</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <button class="btn btn-primary" onclick="practical()">Enroll Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function theoretical() {
                $.ajax({
                url: 'choose_course.php', // Replace with your actual endpoint URL
                type: 'POST', // or 'GET' based on your requirement
                data: {
                    enrollmentType: 'theoretical' // Replace with any necessary data to be sent with the request
                },
                success: function(response) {
                    // Handle the successful response here
                    location.replace('theoretical.php');
                },
                error: function(xhr, status, error) {
                    // Handle the error here
                    console.error(error);
                }
            });
        }
        function practical() {
            $.ajax({
                url: 'choose_course.php', // Replace with your actual endpoint URL
                type: 'POST', // or 'GET' based on your requirement
                data: {
                    enrollmentType: 'practical' // Replace with any necessary data to be sent with the request
                },
                success: function(response) {
                    // Handle the successful response here
                    location.replace('practical.php');
                },
                error: function(xhr, status, error) {
                    // Handle the error here
                    console.error(error);
                }
            });
        }
    </script>
</body>
</html>