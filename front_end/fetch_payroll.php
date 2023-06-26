<?php
include('../backend/db_connect.php');

$query = "SELECT * FROM payroll";
$result = $conn->query($query);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['payroll_id'];
        echo "<tr>";
        echo "<td>" . $row['payroll_id'] . "</td>";
        echo "<td>" . $row['start_date'] . "</td>";
        echo "<td>" . $row['end_date'] . "</td>";
        echo '<td><a href="admin.php?page=payroll_items&payroll_id='.$row['payroll_id'].'" class="view-details-link">View Details</a></td>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No payroll data found.</td></tr>";
}
?>
