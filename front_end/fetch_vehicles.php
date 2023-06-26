<?php
include('../backend/db_connect.php');

$query = "SELECT * FROM vehicles";
$result = $conn->query($query);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['car_id'] . "</td>";
        echo "<td>" . $row['plate'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>view</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No payroll data found.</td></tr>";
}
?>
