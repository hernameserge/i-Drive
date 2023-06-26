<?php
include('../backend/db_connect.php');

if (isset($_POST['idrive_id']) && isset($_POST['date'])) {
    $idriveId = $_POST['idrive_id'];
    $date = $_POST['date'];

    // Perform necessary database query to fetch employee details based on idrive_id and date
    $query = "SELECT e.*, a.date, a.time_in, a.time_out, a.is_late, a.payment, a.hours_worked, a.is_holiday
          FROM employees e
          LEFT JOIN attendance a ON e.idrive_id = a.idrive_id
          WHERE e.idrive_id = :idriveId AND a.date = :date";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':idriveId', $idriveId);
    $stmt->bindValue(':date', $date);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        $row = $result[0];

        if($row['is_late'] == 0){

        }

        $employeeDetails = "IDrive ID: " . $row['idrive_id'] . "<br>";
        $employeeDetails .= "Date: " . $row['date'] . "<br>";
        $employeeDetails .= "Attendance Time In: " . $row['time_in'] . "<br>";
        $employeeDetails .= "Attendance Time Out: " . $row['time_out'] . "<br>";
        $employeeDetails .= "Payment that day: " . $row['payment'] . "<br> ";
        if($row['is_holiday'] == 0){
            $isholiday = "No";
            $employeeDetails .= "Is Holiday: " . $isholiday . "<br>";
        }else{
            $isholiday = "Yes";
            $employeeDetails .= "Is Holiday: " . $isholiday . "<br>";
        }
        if($row['is_late'] == 0){
            $islate = "No";
            $employeeDetails .= "Is Late: " . $islate . "<br>";
        }else{
            $islate = "Yes";
            $employeeDetails .= "Is Late: " . $islate . "<br>";
        }
        

        echo $employeeDetails;
    } else {
        echo "No records found for the given iDrive ID and date.";
    }
}
?>
