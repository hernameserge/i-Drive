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
    <title>Theoretical List</title>
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
		.contents{
			padding:20px;
		}
		.contentss{
			padding:20px;
		}
		.scheduling{
			width:90%;
			height:auto;
			margin:auto;
			display:flex;
			justify-content:space-between;
		}
		.schedulings{
			width:90%;
			height:auto;
			margin:auto;
			display:flex;
			justify-content:space-between;
		}
		.hidden {
			max-height: 0;
			opacity: 0;
			overflow: hidden;
			transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
		}

		.visible {
			max-height: 1000px; /* Adjust the value as needed */
			opacity: 1;
			transition: max-height 0.3s ease-in, opacity 0.3s ease-in;
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
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Type of Time</th>
								<th>Start Time - End Time</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Whole Day' AND admin_approval = '2'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
								<td><?php echo $row['typeoftime']?></td>
								<td><?php echo $row['timestamp']?></td>
								<td>
									<form action="p_attendance.php?date=<?php echo $date;?>" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
										<input type="hidden" name="email" value="<?php echo $row['student_id']; ?>">
										<input type="hidden" name="typeofexam" value="<?php echo $row['typeofexam']; ?>">
										<input type="hidden" name="typeoftime" value="<?php echo $row['typeoftime']; ?>">
                                        <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
										<?php 
											$student_attendance = $row['attendance'];
											if($student_attendance == 0){
										?>
											<center><button name="absent" class="btn btn-danger btn-xs remove">Absent</button>
											<button name="present" class="btn btn-success btn-xs remove">Present</button></center>
										<?php }
											if($student_attendance == 1){
												echo "Absent";
											}
											if($student_attendance == 2){
												echo "Present";
											}
										?>
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

	<br>
	<div>
		<center><button class="btn btn-info" id="toggleButton1">See the Attendance</button></center>
	</div>
	<div class="scheduling hidden">
	<div class="contents" id="content1">
    <h2>Student Present</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Grading</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Whole Day' AND admin_approval = '2' AND attendance = '2'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
                                <td>
                                    <center>
										<?php 
											$student_grading = $row['grade'];
											if($student_grading == 0){
										?>
                                        <button data-id="<?php echo $row['id'];?>" class="btn btn-success btn-xs grading">Grading</button>
										<?php }
											if($student_grading != 0){
												echo "Already Graded";
											}
										?>
                                    </center>
                                </td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="contentss" id="content1">
    <h2>Student Absent</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Attendance</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Whole Day' AND admin_approval = '2' AND attendance = '1'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
                                <td>
                                    <?php 
										$attendance = $row['attendance'];
										if($attendance == 1){
											echo "Absent";
										}
									?>
                                </td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
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
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Half Day' AND admin_approval = '2'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
								<td><?php echo $row['typeoftime']?></td>
								<td><?php echo $row['timestamp']?></td>
								<td>
									<form action="p_attendance.php?date=<?php echo $date;?>" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
										<input type="hidden" name="email" value="<?php echo $row['email']; ?>">
										<input type="hidden" name="typeofexam" value="<?php echo $row['typeofexam']; ?>">
										<input type="hidden" name="typeoftime" value="<?php echo $row['typeoftime']; ?>">
                                        <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
										<?php 
											$student_attendance = $row['attendance'];
											if($student_attendance == 0){
										?>
											<center><button name="absent" class="btn btn-danger btn-xs remove">Absent</button>
											<button name="present" class="btn btn-success btn-xs remove">Present</button></center>
										<?php }
											if($student_attendance == 1){
												echo "Absent";
											}
											if($student_attendance == 2){
												echo "Present";
											}
										?>
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

	<br>
	<div>
		<center><button class="btn btn-info" id="toggleButton2">See the Attendance</button></center>
	</div>
	<div class="schedulings hidden">
	<div class="contents" id="content1">
    <h2>Student Present</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Grading</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Half Day' AND admin_approval = '2' AND attendance = '2'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
                                <td>
                                    <center>
										<?php 
											$student_grading1 = $row['grade'];
											if($student_grading1 == 0){
										?>
                                        <button data-id="<?php echo $row['id'];?>" class="btn btn-success btn-xs grading">Grading</button>
										<?php }
											if($student_grading1 != 0){
												echo "Already Graded";
											}
										?>
                                    </center>
                                </td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="contentss" id="content1">
    <h2>Student Absent</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Type of Exam</th>
								<th>Date</th>
								<th>Attendance</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM client_scheduleonly WHERE typeofexam = 'Practical Exam' AND date = '$date' AND typeoftime = 'Half Day' AND admin_approval = '2' AND attendance = '1'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['typeofexam']?></td>
								<td><?php echo $row['date']?></td>
                                <td>
                                    <?php 
										$attendance = $row['attendance'];
										if($attendance == 1){
											echo "Absent";
										}
									?>
                                </td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	<br>


    <center>
		<a class="btn btn-info" href="instructor_scheduling.php">Back to Instructor Scheduling</a>
	</center>
	
	<div id="grading" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Student Grading</h4>
			</div>
			<div class="modal-body" style="padding:30px;">
					<form action="i_practical.php?date=<?php echo $date;?>" method="POST">
						<label for="" style="margin-left:128px;">Student Name: <span style="margin-left:10px; font-weight:400;" class="cust_name"></span></label>
						<br>
						<center>
						<input type="text" class="cust_id" name="id" style="display:none;">
						<input type="text" name="date" value="<?php echo $date?>" style="display:none;">
						<label for="">Student Grade:</label>&nbsp;&nbsp;
						<input type="number" name="grade" placeholder="Student Grade">
						<br><br>
						<button type="submit" name="submit">Insert Grade</button>
					</form>
				</center>
			</div>
			</div>

		</div>
	</div>
	

	<script>
    // Get the toggle button elements
    const toggleButton1 = document.getElementById('toggleButton1');
    const toggleButton2 = document.getElementById('toggleButton2');

    // Get the section elements
    const section1 = document.querySelector('.scheduling');
    const section2 = document.querySelector('.schedulings');

    // Add event listeners to the toggle buttons
    toggleButton1.addEventListener('click', function() {
        section1.classList.toggle('visible');
        section1.classList.toggle('hidden');
    });

    toggleButton2.addEventListener('click', function() {
        section2.classList.toggle('visible');
        section2.classList.toggle('hidden');
    });
	
	$(function(){
			$('.grading').click(function(e){
				e.preventDefault();
				$('#grading').modal('show');
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