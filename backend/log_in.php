<?php
include('db_connect.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email_login'];
    $password = $_POST['password_login'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['user_password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['first_name'] . " " . $row['last_name'];
        $_SESSION['student_id'] = $row['student_id'];

        // Add the 'student_course' key to the $_SESSION array
        $_SESSION['student_course'] = $row['student_course'];

        header('location: ../front_end/student_dashboard.php');
    } else {
        echo "<script> alert('Invalid email or password. Please try again.');
        window.location = '../guest-side/login.php';
        </script>";
    }
}
?>
