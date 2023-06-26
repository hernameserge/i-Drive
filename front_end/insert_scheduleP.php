<?php
    require 'connection.php';
    var_dump($_POST);
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $typesofExam = $_POST['exam'];
        $typeoftime = $_POST['typeTime'];
        $timestamp = $_POST['timestamp'];
        $instructor = $_POST['instructor'];
        $vehicle_type = $_POST['vehicle_type'];


        $sql = "INSERT INTO client_schedule (name, student_id, date, typeofexam, vehicle_type, typeoftime, timestamp, instructor)
        VALUES ('$name', '$email', '$date', '$typesofExam' , '$vehicle_type', '$typeoftime', '$timestamp', '$instructor')";

        if ($conn->query($sql) === TRUE) {
            header('location:practical.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    }

?>