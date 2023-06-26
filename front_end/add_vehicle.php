<?php
    include('../backend/db_connect.php');
    $model = $_POST['model'];
    $plate = $_POST['plate'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $insertQuery = "INSERT INTO vehicles (model, plate, category, price) VALUES (:model, :plate, :category, :price)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bindParam(':model', $model);
    $insertStmt->bindParam(':plate', $plate);
    $insertStmt->bindParam(':category', $category);
    $insertStmt->bindParam(':price', $price);
    $insertStmt->execute();
?>