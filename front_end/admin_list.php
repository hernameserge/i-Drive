<?php

    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin List</title>
    <style>
        .container-body{
            width:80%;
            height:100vh;
            margin: auto;
            padding-top:200px;
        }
    </style>
</head>
<body>
    <div class="container-body">
        <center><p>Student Master List</p></center>
        <center>
            <a class="btn btn-primary" href="a_slistpractical.php?date=<?php echo $date?>">Practical List</a>
            <a class="btn btn-primary" href="a_slisttheoretical.php?date=<?php echo $date?>">Theoretical List</a>
        </center>
        <br><br><br>
        <center><p>Instructor Master List</p></center>
        <center>
            <a class="btn btn-primary" href="a_uinspractical.php?date=<?php echo $date?>">Instructor List</a>
        </center>
        <br><br>
        <center><a class="btn btn-default" href="admin.php?page=admin_calendar">Back to Admin Calendar</a></center>
    </div>
</body>
</html>