<?php
    include "connection.php";
    if (isset($_POST['id'])) {
        $id = $_POST['id']; 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $typeofexam = $_POST['typeofexam'];
        $date = $_POST['date'];
        if (isset($_POST['approved'])) {
            $sql = "UPDATE client_scheduleonly SET admin_approval = '2' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                $sql1 = "UPDATE admin_schedule SET open = '0' WHERE name='$name' AND student_id = '$email' AND date='$date' AND exam = '$typeofexam'";
                $conn->query($sql1);
                header('location:a_slistpractical.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif (isset($_POST['disapproved'])) {
            $sql = "UPDATE client_scheduleonly SET admin_approval = '1' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                $sql1 = "UPDATE admin_schedule SET open = '0' WHERE name='$name' AND student_id = '$email' AND date='$date' AND exam = '$typeofexam'";
                $conn->query($sql1);
                header('location:a_slistpractical.php?date='.$date);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
?>