<?php
include('../backend/db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted data
    $idrive_id = $_POST['idrive_id'];
    $deduction_type = $_POST['deductionType'];

    // Query the deduction_list table to fetch the corresponding deduction information
    $deductionQuery = "SELECT deduction_id, deduction_amount FROM deduction_list WHERE deduction_name = :deduction_type";
    $deductionStmt = $conn->prepare($deductionQuery);
    $deductionStmt->bindParam(':deduction_type', $deduction_type);
    $deductionStmt->execute();
    $deductionRow = $deductionStmt->fetch();

    if ($deductionRow) {
        // Extract the deduction_id and deduction_amount
        $deduction_id = $deductionRow['deduction_id'];
        $deduction_amount = $deductionRow['deduction_amount'];

        // Prepare and execute the INSERT statement
        $insertQuery = "INSERT INTO deductions (deduction_id, idrive_id, deduction_name, deduction_amount)
                        VALUES (:deduction_id, :idrive_id, :deduction_name, :deduction_amount)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bindParam(':deduction_id', $deduction_id);
        $insertStmt->bindParam(':idrive_id', $idrive_id);
        $insertStmt->bindParam(':deduction_name', $deduction_type);
        $insertStmt->bindParam(':deduction_amount', $deduction_amount);
        $insertStmt->execute();

        // Return a success response or perform further actions
        echo "<script>alert('success')</script>";
    } else {
        // Handle the case where the selected deduction is not found
        echo "<script>alert('fail')</script>";
    }
}

$conn = null;
?>
