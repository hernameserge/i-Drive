<?php
include('../backend/db_connect.php');
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$qry = "SELECT * FROM payroll WHERE start_date = :start_date AND end_date = :end_date";
$sqry = $conn->prepare($qry);
$sqry->bindParam(':start_date', $start_date);
$sqry->bindParam(':end_date', $end_date);
$sqry->execute();

$result = $sqry->fetchAll();
foreach($result as $row){
    $payroll_id = $row['payroll_id'];
    $query = "SELECT idrive_id, hours_worked, payment FROM attendance WHERE date BETWEEN :start_date AND :end_date";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $idrive_id = $row['idrive_id'];

        $duplicateCheckQuery = "SELECT COUNT(*) AS count FROM payroll_items WHERE idrive_id = :idrive_id AND payroll_id = :payroll_id";
        $duplicateCheckStmt = $conn->prepare($duplicateCheckQuery);
        $duplicateCheckStmt->bindParam(':idrive_id', $idrive_id);
        $duplicateCheckStmt->bindParam(':payroll_id', $payroll_id);
        $duplicateCheckStmt->execute();
        $duplicateCheckRow = $duplicateCheckStmt->fetch(PDO::FETCH_ASSOC);
        $count = $duplicateCheckRow['count'];

        if ($count > 0) {
            continue;
        }

        $hours_worked = $row['hours_worked'];
        $payment = $row['payment'];

        $employeeQuery = "SELECT name FROM employees WHERE idrive_id = :idrive_id";
        $employeeStmt = $conn->prepare($employeeQuery);
        $employeeStmt->bindParam(':idrive_id', $idrive_id);
        $employeeStmt->execute();
        $employeeRow = $employeeStmt->fetch(PDO::FETCH_ASSOC);
        $employeeName = $employeeRow['name'];

        $absenceQuery = "SELECT COUNT(*) AS total_absences FROM attendance WHERE idrive_id = :idrive_id AND date BETWEEN :start_date AND :end_date AND WEEKDAY(date) != 6";
        $absenceStmt = $conn->prepare($absenceQuery);
        $absenceStmt->bindParam(':idrive_id', $idrive_id);
        $absenceStmt->bindParam(':start_date', $start_date);
        $absenceStmt->bindParam(':end_date', $end_date);
        $absenceStmt->execute();
        $absenceRow = $absenceStmt->fetch(PDO::FETCH_ASSOC);
        $totalAbsences = $absenceRow['total_absences'];

        $deductionQuery = "SELECT SUM(deduction_amount) AS total_deductions FROM deductions WHERE idrive_id = :idrive_id";
        $deductionStmt = $conn->prepare($deductionQuery);
        $deductionStmt->bindParam(':idrive_id', $idrive_id);
        $deductionStmt->execute();
        $deductionRow = $deductionStmt->fetch(PDO::FETCH_ASSOC);
        $totalDeductions = $deductionRow['total_deductions'];
        $deductions = $totalDeductions / 100; // Divide by 100 to get the percentage

        $salary_before_deductions = $payment;

        $total_salary = $salary_before_deductions - ($salary_before_deductions * $deductions);

        $insertQuery = "INSERT INTO payroll_items (payroll_id, idrive_id, employee_name, total_absences, salary_before_deductions, deductions, total_salary) 
        VALUES (:payroll_id, :idrive_id, :employeeName, :totalAbsences, :salary_before_deductions, :deductions, :total_salary)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bindParam(':payroll_id', $payroll_id);
        $insertStmt->bindParam(':idrive_id', $idrive_id);
        $insertStmt->bindParam(':employeeName', $employeeName);
        $insertStmt->bindParam(':totalAbsences', $totalAbsences);
        $insertStmt->bindParam(':salary_before_deductions', $salary_before_deductions);
        $insertStmt->bindParam(':deductions', $deductions);
        $insertStmt->bindParam(':total_salary', $total_salary);
        $insertStmt->execute();
    }
}

$conn = null;
?>
