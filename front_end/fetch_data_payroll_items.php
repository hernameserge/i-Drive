<?php
include('../backend/db_connect.php');
$payroll_id = $_POST['payroll_id'];

$query = "SELECT * FROM payroll_items WHERE payroll_id = :payroll_id";
$statement = $conn->prepare($query);
$statement->bindParam(':payroll_id', $payroll_id);
$statement->execute();

if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['payroll_id'] . "</td>";
        echo "<td>" . $row['idrive_id'] . "</td>";
        echo "<td>" . $row['employee_name'] . "</td>";
        echo "<td>" . $row['total_absences'] . "</td>";
        echo "<td>" . $row['salary_before_deductions'] . "</td>";
        echo "<td>" . $row['deductions'] * 100, '%' . "</td>";
        echo "<td>" . $row['total_salary'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No payroll items data found.</td></tr>";
}
?>
