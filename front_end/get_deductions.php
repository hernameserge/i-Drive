<?php
include('../backend/db_connect.php');

$id = $_GET['idrive_id']; // Retrieve the id parameter from the GET request

$ddc = "SELECT * FROM deductions WHERE idrive_id = '$id'";
$ddclr = $conn->query($ddc);

if ($ddclr->rowCount() > 0) {
  foreach($ddclr as $drow){
      echo '<div class="card bg-light mb-3">
              <div class="card-header">
                  <div class="row d-flex justify-content-between pl-2 pr-2">
                      <div>
                          <h5>'.$drow['deduction_name'].'</h5>
                      </div>
                      <div>
                          <button class="btn btn-danger remove-deduction" data-idrive="'.$id.'" data-deduction="'.$drow['deduction_id'].'">
                              <i class="fa-solid fa-trash"></i> Remove
                          </button>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                  <p class="card-text">Cost: '.$drow['deduction_amount'].'</p>
              </div>
          </div>';
  }
} else {
  echo '<h5 class="card-title">No Deductions yet.</h5>';
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.remove-deduction').click(function() {
            var idriveId = $(this).data('idrive');
            var deductionId = $(this).data('deduction');
            $.ajax({
                url: 'remove_deduction.php',
                method: 'POST',
                data: { idriveId: idriveId, deductionId: deductionId },
                success: function(response) {
                },
                error: function(xhr, status, error) {
                  alert(error);
                }
            });
        });
    });
</script>
