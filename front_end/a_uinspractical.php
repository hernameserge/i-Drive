<?php
	include('../backend/employee_login.php');
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
    <title>Instructor Practical List</title>
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
								<th>Instructor Name</th>
								<th>Available Date</th>
								<th>Students Enrolled</th>
								<th>Type of Time</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM instructor_schedule WHERE available_date = '$date' AND typeoftime = 'Whole Day'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['instructor_name']?></td>
								<td><?php echo $row['available_date']?></td>
								<td><?php echo $row['instructor_room']?></td>
								<td><?php echo $row['typeoftime']?></td>
								<td>
                                    <form action="a_upinspractical.php?date=<?php echo $date;?>" method="POST">
										<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="name" value="<?php echo $row['instructor_name']; ?>">
										<input type="hidden" name="typeoftime" value="<?php echo $row['typeoftime']; ?>">
                                        <input type="hidden" name="available_date" value="<?php echo $row['available_date']; ?>">
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

    <div class="content" id="content1">
    <h2>Half Day Morning Class</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Instructor Name</th>
								<th>Available Date</th>
								<th>Students Enrolled</th>
								<th>Type of Time</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php 
								require_once 'connection.php'; 
								$sql = "SELECT * FROM instructor_schedule WHERE available_date = '$date' AND typeoftime = 'Half Day'";
								$query = $conn->query($sql);
								while($row = $query->fetch_assoc()){						
							?>
							
							<tr>
								<td><?php echo $row['instructor_name']?></td>
								<td><?php echo $row['available_date']?></td>
								<td><?php echo $row['instructor_room']?></td>
								<td><?php echo $row['typeoftime']?></td>
								<td>
                                    <form action="a_upinspractical.php?date=<?php echo $date;?>" method="POST">
										<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<input type="hidden" name="name" value="<?php echo $row['instructor_name']; ?>">
										<input type="hidden" name="typeoftime" value="<?php echo $row['typeoftime']; ?>">
                                        <input type="hidden" name="available_date" value="<?php echo $row['available_date']; ?>">
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
</body>
</html>