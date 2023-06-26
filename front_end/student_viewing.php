<?php 
	require_once 'connection.php'; 
	$sql = "SELECT open FROM admin_schedule WHERE exam = 'Theoretical Exam'";
	$query = $conn->query($sql);
	while($row = $query->fetch_assoc()){	
		$enable = $row['open'];
	}					
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theoretical</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
		.content.disable{
			display:none;
		}
	</style>
</head>
<body>
	<?php 
		if(!empty($enable) == 0){
	?>
	<div class="content" id="content1">
		<h3>List of Student Shedule</h3>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Name</th>
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
								$sql = "SELECT * FROM client_schedule WHERE typeofexam = 'Theoretical Exam'";
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
									<center><button data-id="<?php echo $row['id'];?>" class="btn btn-danger btn-xs remove">Remove</button></center>
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
			<?php if(!empty($enable) == 0){ ?>
				<button class="btn btn-success" data-toggle="modal" data-target="#submit">Submit</button>
			<?php }?>
		</center>
	</div>
	<?php }?>
	<div class="content" id="content2">
		<h3>List of Admin Approval</h3>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Type of Time</th>
								<th>Start Time - End Time</th>
								<th>Instructor</th>
								<th>Grade</th>
								<th>Admin Approval</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Theoretical Exam'";
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
									<?php
										if($row['grade'] == 0 && $row['admin_approval'] == 2 && $row['attendance'] == 2){
											echo "Absent";
										}
										if($row['grade'] == 0 && $row['admin_approval'] == 1){
											echo "Dispproved";
										}
										if($row['grade'] != 0){
											echo $row['grade'];
										}
									?>
								</td>
								<td>
									<?php if($row['admin_approval'] == 0){?>
										<center><button disabled class="btn btn-info btn-xs">Waiting for Approval</button></center>
									<?php }?>
									<?php if($row['admin_approval'] == 1){?>
										<center><button disabled class="btn btn-danger btn-xs">Disabled</button></center>
									<?php }?>
									<?php if($row['admin_approval'] == 2){?>
										<center><button disabled class="btn btn-success btn-xs">Approved</button></center>
									<?php }?>
								</td>
								<td>
									<center><button data-id="<?php echo $row['id'];?>" class="btn btn-info btn-xs view">View</button></center>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div>
		<center>
			<a class="btn btn-info" href="theoretical.php">Back to Scheduling</a>
		</center>
	</div>

	<!-- Modal For Remove-->
	<div id="remove" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
				<center>
					<p>Are you sure you want to remove your schedule?</p>
				</center>	
			</div>
			<div class="modal-footer">
				<center>
					<form action="schedule_remove.php" method="POST">
						<input type="text" class="cust_id" name="id" style="display:none;">
						<button type="submit" name="remove" class="btn btn-default">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					</form>
				</center>
			</div>
			</div>

		</div>
	</div>

	<!-- Modal For Submit-->
	<div id="submit" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Confirmation</h4>
				</div>
					<form action="submit_admin.php" method="POST">
						<div class="modal-body">
							<center>
								<p>Are you sure you want to Submit now your schedule?</p>
								<p style="font-weight:bold;"><span style="color:red;">Note:</span> If you submit this schedule you cant schedule again in the theoretical unless the admin will cancel your schedule</p>
							</center>
						</div>
						<div class="modal-footer">
							<center>
								<?php
									require_once 'connection.php'; 
									$sql = "SELECT * FROM client_schedule WHERE typeofexam = 'Theoretical Exam'";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){	
								?>
									<div style="display:none;">
										<input type="text" name="fullname[]" value="<?php echo $row['name'];?>">
										<input type="text" name="email[]" value="<?php echo $row['student_id'];?>">
										<input type="text" name="typeofexam[]" value="<?php echo $row['typeofexam'];?>">
										<input type="text" name="date[]" value="<?php echo $row['date'];?>">
										<input type="text" name="typeoftime[]" value="<?php echo $row['typeoftime'];?>">
										<input type="text" name="timestamp[]" value="<?php echo $row['timestamp'];?>">
										<input type="text" name="instructor[]" value="<?php echo $row['instructor'];?>">
									</div>
								<?php }?>
									<button class="btn btn-default" name="submit">Yes</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
							</center>
					</form>	
				</div>
			</div>
		</div>
	</div>

	<div id="view" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Schedule Information</h4>
			</div>
			<div class="modal-body" style="padding:30px;">
				
					<label>Student Name: <span style="margin-left:10px; font-weight:400;" class="cust_name"></span></label><br>
					<label>Student Email: <span style="margin-left:10px; font-weight:400;" class="cust_email"></span></label><br>
					<label>Type of Exam: <span style="margin-left:10px; font-weight:400;" class="cust_typeofexam"></span></label><br>
					<label>Schedule Date: <span style="margin-left:10px; font-weight:400;" class="cust_date"></span></label><br>
					<label>Type of Time: <span style="margin-left:10px; font-weight:400;" class="cust_typeoftime"></span></label><br>
					<label>Starting Time - End Time: <span style="margin-left:10px; font-weight:400;" class="cust_timestamp"></span></label><br>
					<label>Instructor: <span style="margin-left:10px; font-weight:400;" class="cust_instructor"></span></label><br>
					<br><center><button disabled class="admin_approval"></button></center>
				
			</div>
			</div>

		</div>
	</div>


	<script>
		$(function(){
			$('.remove').click(function(e){
				e.preventDefault();
				$('#remove').modal('show');
				var id = $(this).data('id');
				getRow(id);
			});
		});

		$(function(){
			$('.view').click(function(e){
				e.preventDefault();
				$('#view').modal('show');
				var id = $(this).data('id');
				getRow(id);
			});
		});

		function getRow(id){
			$.ajax({
				type:'POST',
				url:'booking_row.php',
				data:{id:id},
				dataType: 'json',
				success: function(response){
					$('.cust_id').val(response.id);
					$('.cust_name').html(response.name);
					$('.cust_email').html(response.email);
					$('.cust_typeofexam').html(response.typeofexam);
					$('.cust_date').html(response.date);
					$('.cust_typeoftime').html(response.typeoftime);
					$('.cust_timestamp').html(response.timestamp);
					$('.cust_instructor').html(response.instructor);

					storednumber = response.admin_approval;

					if(storednumber == 0){
						$('.admin_approval').html("Waiting for Approval");
						$('.admin_approval').addClass('btn btn-info');
					}
					if(storednumber == 1){
						$('.admin_approval').html("Disabled");
						$('.admin_approval').addClass('btn btn-danger');
					}
					if(storednumber == 2){
						$('.admin_approval').html("Approved");
						$('.admin_approval').addClass('btn btn-success');
					}
				}
			});
		}
	</script>
</body>
</html>