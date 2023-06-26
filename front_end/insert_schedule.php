<?php
    require 'connection.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $typesofExam = $_POST['exam'];
        $typeoftime = $_POST['typeTime'];
        $timestamp = $_POST['timestamp'];
        $instructor = $_POST['instructor'];


        $sql = "INSERT INTO client_schedule (name, student_id, date, typeofexam ,typeoftime, timestamp, instructor)
        VALUES ('$name', '$email', '$date', '$typesofExam' , '$typeoftime', '$timestamp', '$instructor')";

        if ($conn->query($sql) === TRUE) {
            header('location:theoretical.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        
    }

?>