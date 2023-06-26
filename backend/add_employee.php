<?php
include('db_connect.php');

if (isset($_POST['register'])) {
    $currentYear = date('Y');

    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM employees WHERE YEAR(date_registered) = ?");
    $stmt->execute([$currentYear]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $count = $row["count"];
        $count++;
    } else {
        $count = 1;
    }

    $employeeID = $currentYear . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $group = $_POST['position'];
    $category = $_POST['category'];
    $vehicleType = $_POST['vehicle_type'];

    $salary = $_POST['salary'];

    $stmt = $conn->prepare("INSERT INTO employees (idrive_id, username, password, name, gender, age, email, contact_number, position, instructor_course, vehicle_type, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$employeeID, $username, $password, $name, $gender, $age, $email, $contact, $group, $category, $vehicleType, $salary]);

    if ($stmt->rowCount() > 0) {
        echo "New record created successfully";
    } else {
        echo "Error inserting record";
    }

    $filename = $_FILES["employee_picture"]["name"];
    $tempname = $_FILES["employee_picture"]["tmp_name"];
    $folder = "../employee_photos/" . $filename;

    $isql = "INSERT INTO employee_picture (idrive_id, filename) VALUES (?, ?)";
    $istmt = $conn->prepare($isql);
    $istmt->execute([$employeeID, $filename]);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>Image uploaded successfully!</h3>";
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }

    header('location: http://localhost/iDrive/front_end/super_admin.php?page=employees');
    exit();
}

$conn = null;
?>
