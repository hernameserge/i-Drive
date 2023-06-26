<?php
include('../backend/db_connect.php');
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

$allowedFileTypes = array('pdf', 'ppt', 'doc', 'docx');
if (!in_array($fileType, $allowedFileTypes)) {
    echo "Sorry, only PDF, PPT, and DOC files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {

    try {

        $name = "Sample Name"; 
        $idrive_id = "Sample iDrive_id"; 
        $announcement = "sample_message"; 
        $file_sent = $target_file;

        $sql = "INSERT INTO announcement (idrive_id, name, announcement, file_sent) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idrive_id, $name, $announcement, $file_sent]);

        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded and inserted into the database.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
}
?>
