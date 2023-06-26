<?php
include('../backend/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST["employee_id"];
    $date = $_POST["date"];
    $timeIn = $_POST["time_in"];
    $timeOut = $_POST["time_out"];
    $isHoliday = isset($_POST["is_holiday"]) ? 1 : 0;

    try {
        $checkQuery = "SELECT COUNT(*) AS count FROM attendance WHERE idrive_id = :employeeId AND date = :date";
        $checkStatement = $conn->prepare($checkQuery);
        $checkStatement->bindParam(':employeeId', $employeeId);
        $checkStatement->bindParam(':date', $date);
        $checkStatement->execute();
        $row = $checkStatement->fetch(PDO::FETCH_ASSOC);
        $count = $row['count'];

        if ($count > 0) {
            echo "<script>alert('The employee has an attendance for that day')
            window.history.back()
            </script>";
        } else {
            $salaryQuery = "SELECT salary FROM employees WHERE idrive_id = :employeeId";
            $salaryStatement = $conn->prepare($salaryQuery);
            $salaryStatement->bindParam(':employeeId', $employeeId);
            $salaryStatement->execute();
            $row = $salaryStatement->fetch(PDO::FETCH_ASSOC);
            $salary = $row['salary'];

            $isLate = 0;
            $startTime = strtotime($timeIn);
            $lateTime = strtotime('08:00:00');
            if ($startTime > $lateTime) {
                $isLate = 1;
            }

            $endTime = strtotime($timeOut);
            $secondsWorked = $endTime - $startTime;
            $hoursWorked = $secondsWorked / 3600;

            if ($isHoliday == 1) {
                $salary *= 2;
            }
            $payment = 0;
            if ($hoursWorked <= 8) {
                $payment = $hoursWorked * $salary;
            } else {
                $overtimeHours = $hoursWorked - 8;
                $payment = (8 * $salary) + ($overtimeHours * ($salary * 1.1));
            }

            $formattedDate = date('Y-m-d', strtotime($date));

            $insertQuery = "INSERT INTO attendance (idrive_id, date, time_in, time_out, is_late, hours_worked, payment, is_holiday)
            VALUES (:employeeId, :date, :timeIn, :timeOut, :isLate, :hoursWorked, :payment, :isHoliday)";
            $insertStatement = $conn->prepare($insertQuery);
            $insertStatement->bindParam(':employeeId', $employeeId);
            $insertStatement->bindParam(':date', $formattedDate);
            $insertStatement->bindParam(':timeIn', $timeIn);
            $insertStatement->bindParam(':timeOut', $timeOut);
            $insertStatement->bindParam(':isLate', $isLate);
            $insertStatement->bindParam(':hoursWorked', $hoursWorked);
            $insertStatement->bindParam(':payment', $payment);
            $insertStatement->bindParam(':isHoliday', $isHoliday);

            $insertStatement->execute();

            echo "Attendance record successfully added.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
header('location:http://localhost/iDrive/front_end/super_admin.php?page=employee_attendance')
?>