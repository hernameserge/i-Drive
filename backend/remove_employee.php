<?php
include('../backend/db_connect.php');

$employeeID = $_GET['employee_id'];

$sql = "UPDATE employees SET status = 2 WHERE idrive_id = :employeeID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':employeeID', $employeeID);

if ($stmt->execute()) {
    echo "Employee removed successfully";
    header('Location: http://localhost/iDrive/front_end/super_admin.php?page=employees');
} else {
    echo "Error removing employee: " . $stmt->errorInfo()[2];
}
$conn = null;
?>
