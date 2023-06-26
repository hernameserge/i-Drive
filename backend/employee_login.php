<?php
include('db_connect.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM employees WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['idrive_id'] = $row['idrive_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['vehicle'] = $row['vehicle_type'];
        $position = $row['position'];
        switch ($position) {
            case 'Super Admin':
                header('location: ../front_end/super_admin.php');
                break;
            case 'Admin':
                header('location: ../front_end/admin.php');
                break;
            case 'Instructor':
                header('location: ../front_end/instructor.php');
                break;
            default:
                echo "<script>alert('Invalid position. Please contact the administrator.');
                window.location = 'employee_login_form.php';
                </script>";
                break;
            }
    } else {
        echo "<script>alert('Invalid email or password. Please try again.');
        window.location = 'employee_login_form.php';
        </script>";
    }
}
?>
