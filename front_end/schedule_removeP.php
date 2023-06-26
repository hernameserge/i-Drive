<?php
    include "connection.php";

    if(isset($_POST['remove'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM client_schedule WHERE id = '$id'";

        if($conn->query($sql)){
            header('location:student_viewingP.php');
        }
    }
?>