<?php

    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Practical List</title>
    <style>
		table{
			table-layout:fixed;
		}
        .content{
			width:90%;
			margin:auto;
			margin-top:30px;
			display:block;
		}
	</style>
</head>
<body>
<div class="content" id="content1">
    <h2>Whole Day Class</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Student ID</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Type of Time</th>
								<th>Start Time - End Time</th>
                                <th>Instructor</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Whole Day'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['student_id']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
								<td><?php echo $row['typeoftime']?></td>
								<td><?php echo $row['timestamp']?></td>
                                <td><?php echo $row['instructor']?></td>
								<td>
                                    <form action="a_upractical.php?date=<?php echo $date;?>" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
										<input type="hidden" name="email" value="<?php echo $row['student_id']; ?>">
										<input type="hidden" name="typeofexam" value="<?php echo $row['typeofexam']; ?>">
                                        <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
									    <?php 
											$student_attendance = $row['admin_approval'];
											if($student_attendance == 1){
												echo "Disapproved";
											}
											if($student_attendance == 2){
												echo "Approved";
											}
											if($student_attendance == 0){
										?>
											<center>
												<button name="disapproved" class="btn btn-danger btn-xs remove">Decline</button>
												<button name="approved" class="btn btn-success btn-xs remove">Confirm</button>
												<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">view</button>											
											</center>
										<?php }?>
                                    </form>
								</td>
							</tr>
							<!--VIEW MODAL-->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Payment of <?php echo $row['name'];?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="container d-flex justify-content-center" style="max-width: 100%; max-height: 100%;">
												<?php
												$sql = "SELECT * FROM schedule_proof_of_payment WHERE student_id = '" . $row['student_id'] . "'";

												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
													while ($row = $result->fetch_assoc()) {
													// Access the image_proof column value
													$imageProof = $row['image_proof'];

													// Output the image
													echo "<img src='$imageProof' alt='Payment Image' class='modal-image' style='max-width:100%; max-height:auto;'>";

													// You can also access other columns if needed
													$paymentId = $row['payment_id'];
													$name = $row['name'];
													$amount = $row['amount'];

													echo "<center><p><b>Amount: " . $amount . "</b></p></center>";
													}
												} else {
													echo "No rows found.";
												}
												?>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    <div class="content" id="content1">
    <h2>Half Day Morning Class</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Type of Time</th>
								<th>Start Time - End Time</th>
								<th>Instructor</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Half Day'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
								<td><?php echo $row['typeoftime']?></td>
								<td><?php echo $row['timestamp']?></td>
								<td><?php echo $row['instructor']?></td>
								<td>
                                    <form action="a_upractical.php?date=<?php echo $date;?>" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
										<input type="hidden" name="email" value="<?php echo $row['email']; ?>">
										<input type="hidden" name="typeofexam" value="<?php echo $row['typeofexam']; ?>">
                                        <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
									    <?php 
											$student_attendance = $row['admin_approval'];
											if($student_attendance == 1){
												echo "Disapproved";
											}
											if($student_attendance == 2){
												echo "Approved";
											}
											if($student_attendance == 0){
										?>
											<center><button name="disapproved" class="btn btn-danger btn-xs remove">Disapproved</button>
											<button name="approved" class="btn btn-success btn-xs remove">Approved</button></center>
										<?php }?>
                                    </form>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div>
		<center>
			<a class="btn btn-info" href="admin.php?page=admin_calendar">Back to Admin Scheduling</a>
		</center>
	</div>
	<?php $conn->close(); ?>
</body>
</html>