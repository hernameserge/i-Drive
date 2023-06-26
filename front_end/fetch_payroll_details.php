<?php
include('../backend/db_connect.php');

if (isset($_POST['payroll_id'])) {
    $payroll_id = $_POST['payroll_id'];

    $query = "SELECT * FROM payroll WHERE payroll_id = :payroll_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':payroll_id', $payroll_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h5>Payroll ID: " . $row['payroll_id'] . "</h5>";
        echo "<p>Start Date: " . $row['start_date'] . "</p>";
        echo "<p>End Date: " . $row['end_date'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
    } else {
        echo "Payroll not found.";
    }
} else {
    echo "Invalid request.";
}
?>
