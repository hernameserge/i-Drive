<?php
    include('../backend/employee_login.php');
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
    <title>Instructor</title>
    <style>
        .container-body{
            width:80%;
            height:100vh;
            margin: auto;
            padding-top:50px;
        }
    </style>
</head>
<body>
    <div class="container-body">
        <?php 
            require_once 'connection.php'; 
            $sql = "SELECT * FROM instructor_schedule WHERE available_date = '$date'";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){	
                $instructor_available = $row['available_date'];
            }
        ?>
        <?php
            if(!empty($instructor_available) == $date){
                
        ?>
            <center><p><?php echo "You are available in this date: " . $date;?></p></center>
            <center><a class="btn btn-warning" href="instructor_scheduling.php">Back to Scheduling</a></center>
        <?php }else{ ?>
            <form action="insert_instructor.php" method="POST">
                <center><p>Are you available in this date: <?php echo $date;?> ?</p></center>
                <div class="form-group">
                    <label for="" style="float:left;">Instructor Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name']; ?>" readOnly="true">
                </div>
                <div id="radioContainer4" class="radio-container" style="text-align:left;">
                    <input type="radio" id="age3" name="typeoftime" value="Whole Day" required>
                    <label for="age3">Whole Day</label>
                </div>
                <div id="radioContainer5" class="radio-container" style="text-align:left;">
                    <input type="radio" id="age4" name="typeoftime" value="Half Day" required>
                    <label for="age4">Half Day</label>
                </div>
                <div class="form-group" style="display:none;">
                    <label for="" style="float:left;">Date</label>
                    <input type="text" class="form-control" name="date" value="<?php echo $date;?>" required>
                </div>
                <input type="hidden" name="vehicle_type" value="<?php echo $_SESSION['vehicle']; ?>">
                <center><button class="btn btn-info" type="submit" name="submit">Available</button></center>
            </form>
        <?php } ?>
        <br>
        <center><p>Student Master List</p></center>
        <center>
            <a class="btn btn-primary" href="practical_list.php?date=<?php echo $date?>">Practical List</a>
            <a class="btn btn-primary" href="theoretical_list.php?date=<?php echo $date?>">Theoretical List</a>
        </center>
    </div>
</body>
</html>