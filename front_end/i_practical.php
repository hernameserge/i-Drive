<?php
    include "connection.php";
    if (isset($_POST['id'])) {
        $id = $_POST['id']; 
        $grade = $_POST['grade'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        if (isset($_POST['submit'])) {
            $sql = "UPDATE client_scheduleonly SET grade = '$grade' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:practical_list.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
?>