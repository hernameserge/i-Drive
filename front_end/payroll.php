<!DOCTYPE html>
<html>
<head>
    <title>Payroll Generation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>
<body>
    <div class="container-fluid mt-3">
        <div class="row pt-3">
            <div class="col-lg p-2" style="background-color:white;">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h4>Payroll List</h4></div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#generatePayroll">
                                    Create Payroll
                                </button>
                                <a href="admin.php?page=employee_attendance" class="btn btn-primary">
                                    Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="payroll_list" class="text-start">
                            <thead>
                                <tr>
                                    <th>Payroll ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Create Payroll -->
    <div class="modal fade" id="generatePayroll" tabindex="-1" role="dialog" aria-labelledby="payrollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payrollModalLabel">Payroll Generation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="payrollFormMsg" class="text-center"></div>
                    <form id="payrollForm">
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Generate Payroll" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for View Payroll Details -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Payroll Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function updateTable() {
                $.ajax({
                    url: 'fetch_payroll.php',
                    method: 'POST',
                    data: {},
                    success: function(data) {
                        $('#payroll_list').DataTable().destroy();
                        $('#payroll_list tbody').html(data); // Update only the tbody section
                        $('#payroll_list').DataTable(); // Initialize DataTable on the updated table
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call the updateTable function initially
            updateTable();

            // Submit the payroll generation form using AJAX
            $('#payrollForm').submit(function(e) {
                e.preventDefault();
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();

                $.ajax({
                    url: 'generate_payroll.php',
                    method: 'POST',
                    data: {
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function(response) {
                        // Handle the success response if needed
                        // For example, display a success message or update the table
                        $('#payrollFormMsg').html('<div class="alert alert-success">Payroll generated successfully!</div>');
                        updateTable(); // Update the table after generating payroll
                        setTimeout(function() {
                            $('#payrollFormMsg').html(''); // Clear the success message after a delay
                            $('#generatePayroll').modal('hide'); // Hide the modal
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error if needed
                        console.error(error);
                        $('#payrollFormMsg').html('<div class="alert alert-danger">There was an error in generating payroll.</div>');
                    }
                });

                // Additional AJAX request to add payroll to the database
                    $.ajax({
                    url: 'add_payroll.php',
                    method: 'POST',
                    data: {
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function(response) {
                        // Handle the success response if needed
                        console.log('success'); 
                    },
                    error: function(xhr, status, error) {
                        // Handle the error if needed
                        console.error(error);
                    }
                });

            });
        });
    </script>
</body>
</html>
