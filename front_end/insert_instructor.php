<?php
    require 'connection.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $vehicle = $_POST['vehicle_type'];
        $typeoftime = $_POST['typeoftime'];
        $date = $_POST['date'];


        $sql = "INSERT INTO instructor_schedule (instructor_name, vehicle_type, instructor_room, available_date, typeoftime)
        VALUES ('$name', '$vehicle', '30', '$date', '$typeoftime')";

        if ($conn->query($sql) === TRUE) {
            header('location:instructor_scheduling.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        
    }

?>