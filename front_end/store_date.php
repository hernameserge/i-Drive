<?php
    include('../backend/login.php');
    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }
    $whole_daye = "Whole Day";
    $half_daye = "Half Day";
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
    <title>Scheduling</title>
    <style>
        .container-body{
            width:30%;
            height:100vh;
            margin: auto;
            padding-top:100px;
        }
        .radio-container {
            display: none;
        }

        .pText{
            text-align:left;
        }

        .radio-container.visible{
            display:block;
        }

        .whole_day{
            display:none;
        }
        .whole_day.visible{
            display:block;
        }

        .button_toggle{
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            display: inline-block;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <div class="container-body">
        <form action="insert_schedule.php" method="POST">
            <div class="form-group">
                <label for="" style="float:left;">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name']; ?>" readOnly="true">
            </div>
            <div class="form-group">
                <label for="" style="float:left;">iDrive ID</label>
                <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['student_id']; ?>" readOnly="true">
            </div>
            <div class="form-group" style="display:none;">
                <label for="" style="float:left;">Date</label>
                <input type="text" class="form-control" name="date" value="<?php echo $date;?>" required>
            </div>
            <div class="form-group" style="display:none;">
                <label for="" style="float:left;">Types of Exam</label>
                <input type="text" class="form-control" name="exam" value="Theoretical Exam" required>
            </div>

            <div>
                <?php 
                    require 'connection.php';

                    $query = "SELECT typeoftime, COUNT(id) as count FROM client_schedule WHERE typeoftime = 'Whole Day' AND typeofexam = 'Theoretical Exam'";

                    $query_result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($query_result)){
                        $output = $row['count'];
                        $typeoftime = $row['typeoftime'];
                    }

                                
                    ?>

                    <?php if($typeoftime == "Whole Day" && mysqli_num_rows($query_result) != 0){ ?>
                        <a class="button_toggle" onclick="toggleRadioContainerForHalfDay()" style="text-decoration: none; color:white; display:none;">Half Day</a>
                            <?php if($output != 2){?>
                                <a class="button_toggle" onclick="toggleRadioContainerForWholeDay()" style="text-decoration: none; color:white;">Whole Day</a>
                            <?php }else{ ?>
                                <h5>Remove pending schedule so that you can book again</h5>
                            <?php }?>
                    <?php }?>

                    <?php
                        require 'connection.php';
                        $query1 = "SELECT typeoftime, COUNT(id) as count1 FROM client_schedule WHERE typeoftime = 'Half Day' AND typeofexam = 'Practical Exam'";

                        $query_result1 = mysqli_query($conn, $query1);

                        while($row1 = mysqli_fetch_assoc($query_result1)){
                            $output1 = $row1['count1'];
                            $typeoftime2 = $row1['typeoftime'];
                        }
                                
                    ?>

                    <?php if($typeoftime2 == "Half Day" && mysqli_num_rows($query_result1) != 0){ ?>
                        <a class="button_toggle" onclick="toggleRadioContainerForWholeDay()" style="text-decoration: none; color:white; display:none;">Whole Day</a>
                            <?php if($output1 != 4){?>
                                <a class="button_toggle" onclick="toggleRadioContainerForHalfDay()" style="text-decoration: none; color:white;">Half Day</a>
                            <?php }else{ ?>
                                <h5>Remove pending schedule so that you can book again</h5>
                            <?php }?>
                    <?php }?>
                                        
                    <?php if($typeoftime != "Whole Day" && $typeoftime2 != "Half Day" && mysqli_num_rows($query_result1) != 0) {?>
                        <a class="button_toggle" onclick="toggleRadioContainerForWholeDay()" style="text-decoration: none; color:white;">Whole Day</a>
                        <a class="button_toggle" onclick="toggleRadioContainerForHalfDay()" style="text-decoration: none; color:white;">Half Day</a>
                    <?php } ?>
                        <input style="display:none;" type="text" class="form-control" name="typeTime" id="formdatesInput1" required>
            </div>
                        <br>
            <div id="radioContainer" class="radio-container">
                <p class="pText">Please select time for Half Day:</p>
                            
                <div id="radioContainer1" class="radio-container" style="text-align:left;">
                    <input type="radio" id="age1" name="timestamp" value="8:00AM - 11:00AM" required>
                    <label for="age1">8:00AM - 11:00AM</label>
                </div>
                <div id="radioContainer2" class="radio-container" style="text-align:left;">
                    <input type="radio" id="age2" name="timestamp" value="1:00PM - 4:00PM" required>
                    <label for="age2">1:00PM - 4:00PM</label>
                </div>
                          
            </div>
                        
            <div id="radioContainer3" class="radio-container">
                <p class="pText">Please select time for Whole Day:</p>
                <?php 
                    require 'connection.php';
                    $query1 = "SELECT instructor, typeoftime, timestamp, COUNT(id) as count1 FROM client_schedule WHERE typeoftime = 'Whole Day' AND typeofexam = 'Theoretical Exam'";
                    $query_result1 = mysqli_query($conn, $query1);

                    while($row1 = mysqli_fetch_assoc($query_result1)){
                        $output1 = $row1['count1'];
                        $typeoftime2 = $row1['typeoftime'];
                        $timestamp1 = $row1['timestamp'];
                        $instructor = $row1['instructor'];
                    }  
                            
                    if($timestamp1 == "8:00AM - 4:00PM" && mysqli_num_rows($query_result1) != 0){ ?>
                    <div id="radioContainer4" class="radio-container" style="text-align:left; display:none;">
                        <input type="radio" id="age3" name="timestamp" value="8:00AM - 4:00PM" required>
                        <label for="age3">8:00AM - 4:00PM</label>
                    </div>
                    <div id="radioContainer5" class="radio-container" style="text-align:left;">
                        <input type="radio" id="age4" name="timestamp" value="8:00AM - 3:00PM" required>
                        <label for="age4">8:00AM - 3:00PM</label>
                    </div>
                    <?php } ?>
                    <?php
                    if($timestamp1 == "8:00AM - 3:00PM" && mysqli_num_rows($query_result1) != 0){ ?>
                        <div id="radioContainer4" class="radio-container" style="text-align:left;">
                            <input type="radio" id="age3" name="timestamp" value="8:00AM - 4:00PM" required>
                            <label for="age3">8:00AM - 4:00PM</label>
                        </div>
                        <div id="radioContainer5" class="radio-container" style="text-align:left; display:none;">
                            <input type="radio" id="age4" name="timestamp" value="8:00AM - 3:00PM" required>
                            <label for="age4">8:00AM - 3:00PM</label>
                        </div>
                    <?php } ?>
                    <?php 
                    if($timestamp1 != "8:00AM - 4:00PM" || $timestamp1 != "8:00AM - 3:00PM" && mysqli_num_rows($query_result1) != 0){?>
                        <div id="radioContainer4" class="radio-container" style="text-align:left;">
                             <input type="radio" id="age3" name="timestamp" value="8:00AM - 4:00PM" required>
                                    <label for="age3">8:00AM - 4:00PM</label>
                                </div>
                                <div id="radioContainer5" class="radio-container" style="text-align:left;">
                                    <input type="radio" id="age4" name="timestamp" value="8:00AM - 3:00PM" required>
                                    <label for="age4">8:00AM - 3:00PM</label>
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="whole_day" id="whole_day">
                            <p class="pText">Available Instructor in this day:</p>
                            <?php 
                                require 'connection.php';
                                $query12 = "SELECT instructor_name, available_date FROM instructor_schedule WHERE typeoftime = '$whole_daye' AND admin_approval = '2'";
                                $query_result12 = mysqli_query($conn, $query12);

                                $instructorsFound = false; 

                                while($row1 = mysqli_fetch_assoc($query_result12)){
                                    $available_date = $row1['available_date'];
                                    $instructor_name = $row1['instructor_name'];
                                    if($available_date == $date){
                                        $instructorsFound = true;

                            ?>
                                        <div style="text-align:left;">
                                            <input type="radio" id="age3" name="instructor" value="<?php echo $instructor_name;?>" required>
                                            <label for="age1"><?php echo $instructor_name;?></label>
                                        </div>
                            <?php
                                    }
                                } 
                                if(!$instructorsFound){ echo "No Available Instructor Today " . $date?>
                                     <div style="text-align:left; display:none;">
                                        <input type="radio" id="age3" name="instructor" value="" required>
                                        <label for="age1"></label>
                                    </div>
                                <?php } ?>
                        </div>

                        <div class="whole_day" id="whole_day1">
                            <p class="pText">Available Instructor in this day:</p>
                            <?php 
                                require 'connection.php';
                                $query12 = "SELECT instructor_name, available_date FROM instructor_schedule WHERE typeoftime = '$half_daye' AND admin_approval = '2'";
                                $query_result12 = mysqli_query($conn, $query12);

                                $instructorsFound = false; 

                                while($row1 = mysqli_fetch_assoc($query_result12)){
                                    $available_date = $row1['available_date'];
                                    $instructor_name = $row1['instructor_name'];
                                    if($available_date == $date){
                                        $instructorsFound = true;

                            ?>
                                        <div style="text-align:left;">
                                            <input type="radio" id="age3" name="instructor" value="<?php echo $instructor_name;?>" required>
                                            <label for="age1"><?php echo $instructor_name;?></label>
                                        </div>
                            <?php
                                    }
                                } 
                                if(!$instructorsFound){ echo "No Available Instructor Today " . $date?>
                                     <div style="text-align:left; display:none;">
                                        <input type="radio" id="age3" name="instructor" value="" required>
                                        <label for="age1"></label>
                                    </div>
                                <?php } ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger" style="width:100%; margin-top:30px;">Submit</button>
        </form>
    </div>

    <script>

        function toggleRadioContainerForHalfDay() {
            var container = document.getElementById("radioContainer");
            var container1 = document.getElementById("radioContainer1");
            var container2 = document.getElementById("radioContainer2");
            var whole_day1 = document.getElementById("whole_day1");
            container.classList.toggle("visible");
            container1.classList.toggle("visible");
            container2.classList.toggle("visible");
            whole_day1.classList.toggle("visible");

            var container3 = document.getElementById("radioContainer3");
            var container4 = document.getElementById("radioContainer4");
            var container5 = document.getElementById("radioContainer5");
            var radioButton3 = document.getElementById("age3");
            var radioButton4 = document.getElementById("age4");
            var whole_day = document.getElementById("whole_day");
            container3.classList.remove("visible");
            container4.classList.remove("visible");
            container5.classList.remove("visible");
            whole_day.classList.remove("visible");
            radioButton3.checked = false;
            radioButton4.checked = false;
            

            var inputField = document.getElementById("formdatesInput1");
            inputField.value = "Half Day";
        }

        function toggleRadioContainerForWholeDay() {
            var container = document.getElementById("radioContainer");
            var container1 = document.getElementById("radioContainer1");
            var container2 = document.getElementById("radioContainer2");
            var radioButton1 = document.getElementById("age1");
            var radioButton2 = document.getElementById("age2");
            var whole_day1 = document.getElementById("whole_day1");
            container.classList.remove("visible");
            container1.classList.remove("visible");
            container2.classList.remove("visible");
            whole_day1.classList.remove("visible");
            radioButton1.checked = false;
            radioButton2.checked = false;

            var container3 = document.getElementById("radioContainer3");
            var container4 = document.getElementById("radioContainer4");
            var container5 = document.getElementById("radioContainer5");
            var whole_day = document.getElementById("whole_day");
            container3.classList.toggle("visible");
            container4.classList.toggle("visible");
            container5.classList.toggle("visible");
            whole_day.classList.toggle("visible");

            var inputField = document.getElementById("formdatesInput1");
            inputField.value = "Whole Day";
        }
    </script>
</body>
</html>