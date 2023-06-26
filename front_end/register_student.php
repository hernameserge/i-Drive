<?php
include('../backend/db_connect.php');

function generateStudentID($conn) {
    $currentYear = date("y"); 
    $studentCount = getStudentCountForYear($conn, $currentYear) + 1;  
    $studentID = $currentYear . "-" . str_pad($studentCount, 4, "0", STR_PAD_LEFT);     
    return $studentID;
}

function getStudentCountForYear($conn, $year) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE student_id LIKE :year_pattern");
    $stmt->bindValue(':year_pattern', $year . '-%');
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count;
}

if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $email = trim($_POST['register_email']);
    $password = trim($_POST['register_password']);
    $date_of_birth = $_POST['date_of_birth'];
    $mobile_number = $_POST['mobile_number'];

    $student_id = generateStudentID($conn);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, student_id, age, email, user_password, date_of_birth, mobile_number) 
                            VALUES (:first_name, :middle_name, :last_name, :student_id, :age, :email, :user_password, :date_of_birth, :mobile_number)");

    // Bind the parameters
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':middle_name', $middle_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user_password', $hashed_password);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':mobile_number', $mobile_number);

    if ($stmt->execute()) {
        echo "Registration successful! Student ID: " . $student_id;
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
