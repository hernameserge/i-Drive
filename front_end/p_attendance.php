<?php
    include "connection.php";
    if (isset($_POST['id'])) {
        $id = $_POST['id']; 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $typeofexam = $_POST['typeofexam'];
        $typeofexam = $_POST['typeoftime'];
        $date = $_POST['date'];
        if (isset($_POST['present'])) {
            $sql = "UPDATE client_scheduleonly SET attendance = '2' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:practical_list.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif (isset($_POST['absent'])) {
            $sql = "UPDATE client_scheduleonly SET attendance = '1' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:practical_list.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
?>