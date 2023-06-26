<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(document).ready(function() {
            $('#monthDropdown').change(function() {
                var selectedMonth = $(this).val();
                var isHoliday = $('#isHolidayCheckbox:checked').val() ? 1 : 0;
                updateTable(selectedMonth, isHoliday);
            });

            function updateTable(selectedMonth, isHoliday) {
                $.ajax({
                    url: 'fetch_data.php',
                    method: 'POST',
                    data: { month: selectedMonth, is_holiday: isHoliday },
                    success: function(data) {
                        $('#employeeTable').DataTable().destroy();  
                        $('#employeeTable tbody').html(data); // Update only the tbody section
                        $('#employeeTable').DataTable(); // Initialize DataTable on the updated table
                    }
                });
            }

            // Set the initial value of the table to match the selected month in the dropdown
            var initialMonth = $('#monthDropdown').val();
            var initialIsHoliday = $('#isHolidayCheckbox').is(':checked') ? 1 : 0;
            updateTable(initialMonth, initialIsHoliday);
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#employeeTable').on('click', '.btn', function() {
            var idriveId = $(this).data('id');
            var date = $(this).data('date');
            fetchEmployeeDetails(idriveId, date);
        });

        function fetchEmployeeDetails(idriveId, date) {
            $.ajax({
                url: 'fetch_employee_details.php',
                method: 'POST',
                data: { idrive_id: idriveId, date: date },
                success: function(data) {
                    $('#employeeDetails').html(data);
                }
            });
        }
    });
</script>

</head>
<body>
    <div class="container-fluid mt-3">
        <div class="row pt-3">
            <div class="col-lg p-2" style="background-color:white;">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h4>Employee List</h4></div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end">
                                    <a href="admin.php?page=payroll" class="btn btn-success"><i class="fa-solid fa-cash-register mr-2"></i>Payroll</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeAttendanceModal"><i class="fa-solid fa-plus mr-2"></i>Attendance</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        include('../backend/db_connect.php');

                        try {
                            // Get the distinct months in the attendance records for the dropdown
                            $dropdownSql = "SELECT DISTINCT DATE_FORMAT(date, '%Y-%m') AS month FROM attendance";
                            $dropdownStatement = $conn->prepare($dropdownSql);
                            $dropdownStatement->execute();
                            $dropdownResult = $dropdownStatement->fetchAll(PDO::FETCH_ASSOC);
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>

                        <label for="monthDropdown">Select Month:</label>
                        <select id="monthDropdown">
                            <option value="">All Months</option>
                            <?php foreach ($dropdownResult as $dropdownRow): ?>
                                <?php
                                $month = $dropdownRow['month'];
                                $selected = ($month === date('Y-m')) ? 'selected' : '';
                                ?>
                                <option value="<?php echo $month; ?>" <?php echo $selected; ?>><?php echo $month; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <table id="employeeTable" class="text-start">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $conn = null; ?>
    <div class="modal fade" id="employeeAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="employeeAttendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="employeeAttendanceModalLabel">ADD ATTENDANCE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="sample_payroll.php" method="post" class="p-4">
                    <div class="form-group">
                        <label for="employee_id">Employee ID:</label>
                        <input type="text" name="employee_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="time_in">Time In:</label>
                            <input type="time" name="time_in" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time_out">Time Out:</label>
                            <input type="time" name="time_out" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="isHolidayCheckbox" name="is_holiday">
                            <label class="custom-control-label" for="isHolidayCheckbox">Is it a holiday?</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Add Attendance" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="employeeDetails"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
