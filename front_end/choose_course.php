<?php
    session_start();
    include('../backend/db_connect.php');
    $course = $_POST['enrollmentType'];
    $stud_id = $_SESSION['student_id'];
    $sql = "UPDATE users SET student_course = :course WHERE student_id = :student_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':student_id', $stud_id);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        if($course === "theoretical"){
            header('location:theoretical.php;');
        }else{
            header('location:practical.php');
        }
    } else {
        // Update failed
        echo "<script>console.log('error');</script>";
    }
?>
