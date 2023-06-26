<?php
include('../backend/db_connect.php');
$data = $conn->query("SELECT * FROM announcement order by announcement_id desc")->fetchAll();
if (count($data) > 0) {
    foreach ($data as $row) {
        $fileName = basename($row['file_sent']);

        echo '
            <div class="card w-100 mt-3 mb-3">
                <div class="card-body">
                    <div style="width:80px;height:80px;background-color:pink;border-radius:50%;"></div>
                    <h4 class="card-title">' . $row['name'] . '</h4>
                    <p class="card-text">' . $row['announcement'] . '</p>
                    <div>
                        
                        <a href="' . $row['file_sent'] . '" download="' . $fileName . '">' . $fileName . '</a>
                    </div>
                </div>
            </div>';
    }
} else {
    echo "<h3>There are no announcements so far</h3>";
}
?>
