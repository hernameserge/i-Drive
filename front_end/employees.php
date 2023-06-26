<?php include('../backend/db_connect.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>SUPER ADMIN</title>
        <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="initial-scale=1.0" >
    <link rel="icon" type="image/x-icon" href="../photos/idrive_logo.png">

    <!-- Latest jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>        
    <link href="../css/employees.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid mt-3">
            <div class="row pt-3">
                <div class="col-lg p-2" style="background-color:white;">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col"><h4>Employees</h4></div>
                                <div class="col"><button type="button" id="add_employee" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#employees-modal"><span>ADD EMPLOYEES</span></button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM employees where status = 1";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($rows as $row) {
                                        $id = $row['idrive_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['idrive_id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td class="d-flex justify-content-start">
                                            <form action="../backend/remove_employee.php" method="GET" onsubmit="return confirm('Are you sure you want to remove employee <?php echo $row['name'];?>?')">
                                                <button style="height:30px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#employee-info<?php echo $id ?>" onclick="setEmployeeID('<?php echo $id ?>')"><i class="fa-solid fa-eye"></i>View</button>
                                                <button style="height:30px;" type="button" class="btn btn-success ml-2 mr-2" data-toggle="modal" data-target="#modalicious<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                                                <input type="hidden" name="employee_id" value="<?php echo $id ?>">
                                                <button style="height:30px;" type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i> Remove
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- WHEN VIEW IS CLICKED -->
                    <?php
                    $sql = "SELECT * FROM employees";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch()) {
                        $id = $row['idrive_id'];
                    ?>
                        <div class="modal fade bd-example-modal-lg" id="employee-info<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-3" style="margin-top:15%;">
                                    <div id="photo-container" class="d-flex justify-content-center">
                                        <?php
                                        $query = "SELECT * FROM employee_picture WHERE idrive_id = :id LIMIT 1";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bindParam(':id', $id);
                                        $stmt->execute();
                                        $data = $stmt->fetch(PDO::FETCH_ASSOC);
                                        if ($data) {
                                        ?>
                                            <div class="d-flex justify-content-center" style="margin-bottom:-10%;">
                                                <img src="../employee_photos/<?php echo $data['filename']; ?>" style="width:200px; height:200px; position:relative; top:-100px; border-radius:50%;" alt="profile-picture">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <h4 class="text-center"><?php echo $row['name']; ?></h4>
                                    <h5 class="text-center"><?php echo $row['idrive_id']; ?></h5>
                                    <div class="container-fluid text-justify pl-5" id="age-gender">
                                        <div class="row">
                                            <div class="col-6">
                                                <div><span class="something">Age:</span><span><?php echo $row["age"]; ?></span></div>
                                            </div>
                                            <div class="col-6">
                                                <div><span class="something">Gender:</span><span><?php echo $row["gender"]; ?></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div><span class="something">Position:</span><span><?php echo $row["position"]; ?></span></div>
                                            </div>
                                            <div class="col-6">
                                                <div><span class="something">Course:</span><span><?php echo $row["instructor_course"]; ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $ddc = "SELECT * FROM deductions WHERE idrive_id = '$id'";
                                    $deductionsResult = $conn->query($ddc);
                                    ?>
                                    <div class="row m-3">
                                        <div class="col-7">
                                            <div class="card bg-light mb-3">
                                                <div class="card-header">
                                                    <div class="row d-flex justify-content-between pl-2 pr-2">
                                                        <div>
                                                            <h5>DEDUCTIONS</h5>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-success" id="add_deduction" data-toggle="modal" data-target="#addDeductionModalLabel<?php echo $id; ?>">
                                                                <i class="fa-solid fa-plus"></i> Add Deduction
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col">
                                                            <div id="deductions-card-content-<?php echo $id; ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- DEDUCTION LIST -->
                                                <?php
                                                $dqr = "SELECT * FROM deduction_list";
                                                $dqry = $conn->query($dqr);
                                                ?>
                                                <div class="modal fade" id="addDeductionModalLabel<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="addDeductionModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addDeductionModalLabel">Add Deduction</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="deductionForm<?php echo $id; ?>">
                                                                    <label for="deductionType-<?php echo $id; ?>">Deduction Type:</label>
                                                                    <select id="deductionType-<?php echo $id; ?>" name="deductionType">
                                                                        <?php if ($dqry->rowCount() > 0) { ?>
                                                                            <?php foreach ($dqry as $dqrow) { ?>
                                                                                <option value="<?php echo $dqrow['deduction_name']; ?>"><?php echo $dqrow['deduction_name']; ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <input type="hidden" name="idrive_id" value="<?php echo $id; ?>">
                                                                    <button class="btn btn-primary" id="submitDeduction-<?php echo $id; ?>">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                                <div class="card-header">
                                                    <h5>Other Info</h5>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Light card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <button class="btn btn-primary">Go somewhere</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!--WHEN EDIT IS CLICKED-->
                    <?php
                    $sql = "SELECT * FROM employees";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row) {
                        $id = $row['idrive_id'];
                    ?>
                    <div class="modal fade bd-example-modal-lg p-3" id="modalicious<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>EDIT EMPLOYEE PROFILE</h4>
                                </div>
                                <div class="img-profile-container">
                                    <?php
                                   $query = "SELECT * FROM employee_picture WHERE idrive_id = :id LIMIT 1";
                                   $stmt2 = $conn->prepare($query);
                                   $stmt2->bindParam(':id', $id);
                                   $stmt2->execute();
                                   $data = $stmt2->fetch(PDO::FETCH_ASSOC);
                                    if ($data) {
                                    ?>
                                        <div class="d-flex justify-content-center mt-5 mb-5">
                                            <img src="../employee_photos/<?php echo $data['filename']; ?>" style="width:200px; height:200px; position:relative; border-radius:50%;" alt="profile-picture">
                                        </div>
                                        <div class="text-center">
                                            <h3>iDrive ID: <?php echo $id; ?></h3>
                                        </div>
                                    <?php } ?>
                                </div>
                                <form class="p-3" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                    <div class="form-group row">
                                        <label style="font-size:15px;" for="edit_name" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input name="edit_name" style="height:40px; font-size:15px;" type="text" class="form-control" id="edit_name" placeholder="<?php echo $row['name']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="font-size:15px;" for="edit_email" class="col-md-2 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input name="edit_email" style="height:40px; font-size:15px;" type="email" class="form-control" id="edit_email" placeholder="<?php echo $row['email']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="font-size:15px;" for="edit_username" class="col-md-2 col-form-label">username</label>
                                        <div class="col-md-10">
                                            <input name="edit_username" style="height:40px; font-size:15px;" type="text" class="form-control" id="edit_username" placeholder="<?php echo $row['username']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="font-size:15px;" for="edit_age" class="col-md-2 col-form-label">Age</label>
                                        <div class="col-md-10">
                                            <input name="edit_age" style="height:40px; font-size:15px;" type="number" class="form-control" id="edit_age" placeholder="<?php echo $row['age']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="font-size:15px;" for="edit_contact" class="col-md-2 col-form-label">contact</label>
                                        <div class="col-md-10">
                                            <input name="edit_contact" style="height:40px; font-size:15px;" type="number" class="form-control" id="edit_contact" placeholder="<?php echo $row['contact_number']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="font-size:15px;" for="edit_gender" class="col-md-2 col-form-label">Gender</label>
                                        <div class="col-md-10">
                                            <input name="edit_gender" style="height:40px; font-size:15px;" type="text" class="form-control" id="edit_gender" placeholder="<?php echo $row['gender']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size:15px;" for="edit_instruc_group">Position</label>
                                        <select class="form-control" style="height:40px; font-size:15px;" id="edit_instruc_group" name="edit_group" required onchange="toggle()">
                                                <option value="" selected>No Group</option>
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Instructor">Instructor</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size:15px;" for="edit_course_type">Type Of Course</label>
                                        <select name="edit_course" style="height:40px; font-size:15px;" class="form-control" id="edit_course_type" required>
                                                <option value="N/A" selected>No Course</option>
                                                <option value="Practical">Practical</option>
                                                <option value="Theoretical">Theoretical</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size:15px;" for="edit_course_type">Type Of Course</label>
                                        <select name="edit_vehicle" style="height:40px; font-size:15px;" class="form-control" id="edit_vehicle" required>
                                                <option value="N/A" selected>No Course</option>
                                                <option vaue="Sedan Automatic">Sedan Automatic</option>
                                                <option value="Sedan Manual">Sedan Manual</option>
                                                <option value="Motorcycle">Motorcycle</option>
                                                <option value="Tricycle">Tricycle</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary float-right mt-2" style="width:100px; height:40px; font-size:15px;">UPDATE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if (isset($_POST['update'])) {
                            $id = $_POST['edit_id'];
                            $username = $_POST['edit_username'];
                            $name = $_POST['edit_name'];
                            $gender = $_POST['edit_gender'];
                            $age = $_POST['edit_age'];
                            $email = $_POST['edit_email'];
                            $contact = $_POST['edit_contact'];
                            $group = $_POST['edit_group'];
                            $course = $_POST['edit_course'];
                            $vehicle = $_POST['edit_vehicle'];
                        
                            $sql = "UPDATE employees SET username = :username, name = :name, gender = :gender, age = :age, email = :email, contact_number = :contact, position = :group, instructor_course = :course, vehicle_type = :vehicle_type WHERE idrive_id = :id";
                            $estmt = $conn->prepare($sql);
                            $estmt->bindParam(':username', $username);
                            $estmt->bindParam(':name', $name);
                            $estmt->bindParam(':gender', $gender);
                            $estmt->bindParam(':age', $age);
                            $estmt->bindParam(':email', $email);
                            $estmt->bindParam(':contact', $contact);
                            $estmt->bindParam(':group', $group);
                            $estmt->bindParam(':course', $course);
                            $estmt->bindParam(':vehicle_type', $vehicle);
                            $estmt->bindParam(':id', $id);
                            $estmt->execute();
                        }
                } ?>
                    <div id="employee-option">
                        <div id="employee-modal">
                            <div class="modal fade bd-example-modal-lg" id="employees-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" >
                                    <div class="modal-content" id="employee-modal-content" style="font-size:20px; color:black; border-radius:15px 15px 0 0 !important;">
                                        <div class="modal-header" id="employee-modal-header">
                                            <h4 style="color:white;">Add Employees</h4>
                                        </div>
                                        <form action="../backend/add_employee.php" method="POST" enctype="multipart/form-data">
                                            <div class="container">
                                                <div id="display-photo-container">
                                                    <label for="employee_file" id="add-photo-label"><i class="fa-solid fa-image mr-2"></i>ADD PHOTO</label>
                                                    <input type="file" style="display: none;" name="employee_picture" id="employee_file" value="" accept="image/*">
                                                    <img id="preview-image" src="#" alt="Preview" style="display: none; width: 100%; height: 100%; border-radius:50%;">
                                                </div>
                                            </div>
                                            <script>
                                                const displayPhotoContainer = document.getElementById('display-photo-container');
                                                const employeeFileInput = document.getElementById('employee_file');

                                                displayPhotoContainer.addEventListener('click', function() {
                                                    employeeFileInput.click();
                                                });
                                            </script>
                                            <br>
                                            <div class="form-group">
                                                <label for="employee_name">Employee Name</label>
                                                <input type="text" class="form-control" id="employee_name" name="name" placeholder="Employee Name">
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                                                </div>
                                                <div class="col">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg">
                                                    <label for="email">Valid email</label>
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Valid Email Address" required>
                                                </div>
                                                <div class="form-group col-lg">
                                                    <label for="number">Contact Number</label>
                                                    <input type="number" name="contact" class="form-control" id="number" placeholder="Enter your Contact number" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg">
                                                    <label for="gender">Gender</label>
                                                    <input type="text" name="gender" class="form-control" id="gender" placeholder="Enter your gender" required>
                                                </div>
                                                <div class="form-group col-lg">
                                                    <label for="age">Age</label>
                                                    <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age" required>
                                                </div>
                                                <div class="form-group col-lg">
                                                    <label for="salary">Salary</label>
                                                    <input type="number" name="salary" class="form-control" id="salary" placeholder="Enter salary per hour" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg">
                                                    <label for="instruc_group">Position</label>
                                                    <select class="form-control" name="position" id="instruc_group" required onchange="toggleFields()">
                                                        <option value="" selected>No Position</option>
                                                        <option value="Super Admin">Super Admin</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Instructor">Instructor</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg" id="categoryField" style="display: none;">
                                                    <label for="instruc_group">Category</label>
                                                    <select class="form-control" name="category" style="border: solid #177695;">
                                                        <option value="N/A" selected>No Category</option>
                                                        <option value="Practical">Practical</option>
                                                        <option value="Theoretical">Theoretical</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg" id="vehicleTypeField" style="display: none;">
                                                    <label for="instruc_group">Vehicle Type</label>
                                                    <select class="form-control" name="vehicle_type" style="border: solid #177695;" required>
                                                        <option value="N/A" selected>No Vehicle</option>
                                                        <option value="Sedan Manual">Sedan Manual</option>
                                                        <option value="Sedan Automatic">Sedan Automatic</option>
                                                        <option value="Motorcycle">Motorcycle</option>
                                                        <option value="Tricycle">Tricycle</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" name="register" class="btn btn-primary">REGISTER</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
                
            } );
        </script>
        <script>
            function setEmployeeID(employeeID) {
                document.getElementById('employeeIDInput').value = employeeID;
            }
        </script>
        <script>
            $(document).ready(function() {
                function updateCard() {
                    $('[id^="deductions-card-content"]').each(function() {
                        var idrive_id = this.id.replace('deductions-card-content-', ''); // Extract the ID from the element's ID attribute
                        $.ajax({
                            url: 'get_deductions.php',
                            method: 'GET',
                            data: { idrive_id: idrive_id },
                            success: function(response) {
                                $('#deductions-card-content-' + idrive_id).html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                }

                updateCard();
                setInterval(updateCard, 1000);
            });
        </script>
        <script>
            function toggleFields() {
                var position = document.getElementById("instruc_group").value;
                var categoryField = document.getElementById("categoryField");
                var vehicleTypeField = document.getElementById("vehicleTypeField");

                if (position === "Instructor") {
                    categoryField.style.display = "block";
                    vehicleTypeField.style.display = "block";
                } else {
                    categoryField.style.display = "none";
                    vehicleTypeField.style.display = "none";
                }
            }
        </script>
        <script>
            $(document).ready(function() {
            $('form[id^="deductionForm"]').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();

                // Make an AJAX request to submit the form data
                $.ajax({
                url: 'submit_deduction.php', // Replace with the appropriate URL for your server-side processing
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    alert('New deduction has been added to the user');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('There are error in adding deductions, please try again later');
                }
                });
            });
            });
        </script>
        <script>
            function previewImage(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function () {
                var preview = document.getElementById('preview-image');
                preview.src = reader.result;
                preview.style.display = 'block';
                var addPhotoLabel = document.getElementById('add-photo-label');
                addPhotoLabel.style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            }

            var fileInput = document.getElementById('employee_file');
            fileInput.addEventListener('change', previewImage);
        </script>
        <script>
            function toggle() {
                var positionDropdown = document.getElementById("edit_instruc_group");
                var courseTypeDropdown = document.getElementById("edit_course_type");
                var vehicleDropdown = document.getElementById("edit_vehicle");

                // Get the selected value from the "Position" dropdown
                var selectedPosition = positionDropdown.value;

                // Disable or enable the other dropdowns based on the selected value
                if (selectedPosition === "Instructor") {
                courseTypeDropdown.disabled = false;
                vehicleDropdown.disabled = false;
                } else {
                courseTypeDropdown.disabled = true;
                vehicleDropdown.disabled = true;
                }
            }
        </script>

    </body>
</html>