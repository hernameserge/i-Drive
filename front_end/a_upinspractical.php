<?php
    include "connection.php";
    if (isset($_POST['id'])) {
        $id = $_POST['id']; 
        $name = $_POST['name'];
        $typeoftime = $_POST['typeoftime'];
        $date = $_POST['available_date'];
        if (isset($_POST['approved'])) {
            $sql = "UPDATE instructor_schedule SET admin_approval = '2' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:a_uinspractical.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif (isset($_POST['disapproved'])) {
            $sql = "UPDATE instructor_schedule SET admin_approval = '1' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:a_uinspractical.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
?>