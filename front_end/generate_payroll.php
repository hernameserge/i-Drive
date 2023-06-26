<?php

include('../backend/db_connect.php');

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Insert the payroll data into the table
        $insert_query = "INSERT INTO payroll (start_date, end_date, status) VALUES (:start_date, :end_date, 'Not Payed')";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bindParam(':start_date', $start_date);
        $insert_stmt->bindParam(':end_date', $end_date);
        $insert_stmt->execute();

        echo "Payroll generated and inserted successfully!";
    } else {
        echo "Error: Start date and end date are required!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
