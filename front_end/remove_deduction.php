<?php
include('../backend/db_connect.php');

// Retrieve the idriveId and deductionId from the POST request
$idriveId = $_POST['idriveId'];
$deductionId = $_POST['deductionId'];

$sql = "DELETE FROM deductions WHERE deduction_id = $deductionId AND idrive_id = '$idriveId'";
$remove = $conn->query($sql);

if ($remove) {
    // Deduction removed successfully
    $response = array(
        'status' => 'success',
        'message' => 'Deduction removed successfully.'
    );
} else {
    // Failed to remove deduction
    $response = array(
        'status' => 'error',
        'message' => 'Failed to remove deduction.'
    );
}

header('Content-Type: application/json');
echo json_encode($response);
?>
