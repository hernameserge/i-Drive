<?php
include('../backend/db_connect.php');
$selectedMonth = $_POST['month'];

try {
    $sql = "SELECT e.idrive_id, e.name, e.salary, COALESCE(a.hours_worked, 0) AS hours_worked, COALESCE(a.payment, 0) AS payment,  a.time_in, a.time_out, a.date
            FROM employees e
            RIGHT JOIN attendance a ON e.idrive_id = a.idrive_id AND DATE_FORMAT(a.date, '%Y-%m') = :selectedMonth
            WHERE e.status = 1";

    $statement = $conn->prepare($sql);
    $statement->bindValue(':selectedMonth', $selectedMonth);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>".$row['idrive_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-id='".$row['idrive_id']."' data-date='".$row['date']."'>View Details</button></td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "<tr><td colspan='8'>No data found</td></tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
