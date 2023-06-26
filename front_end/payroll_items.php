<!DOCTYPE html>
<?php
include('../backend/db_connect.php');

$payroll_id = $_GET['payroll_id'];

$sql = "SELECT start_date, end_date from payroll where payroll_id = :payroll_id";
$statement = $conn->prepare($sql);
$statement->bindParam(':payroll_id', $payroll_id);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);

$start_date = $result['start_date'];
$end_date = $result['end_date'];

?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid mt-3">
        <div class="row pt-3">
            <div class="col-lg p-2" style="background-color:white;">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h4>Payroll ID: <?php echo $payroll_id; ?></h4></div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <a href="super_admin.php?page=employee_attendance" class="btn btn-primary"><i class="fa-solid fa-clipboard-user mr-2"></i>Employee Attendance</a>
                                    <a href="super_admin.php?page=payroll" class="btn btn-success"><i class="fa-solid fa-cash-register mr-2"></i>Payroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="payrollItems" class="text-center">
                            <thead>
                                <tr>
                                    <th>Payroll ID</th>
                                    <th>iDrive ID</th>
                                    <th>Employee Name</th>
                                    <th>Days Present</th>
                                    <th>Salary before deductions</th>
                                    <th>Deductions total</th>
                                    <th>Total Salary</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateTable() {
            $.ajax({
                url: 'fetch_data_payroll_items.php',
                method: 'POST',
                data: {payroll_id: <?php echo $payroll_id; ?>},
                success: function(data) {
                    $('#payrollItems').DataTable().destroy();
                    $('#payrollItems tbody').html(data); // Update only the tbody section
                    $('#payrollItems').DataTable({ // Initialize DataTable on the updated table
                    dom: 'Bfrtip',
                    buttons: [
                        {
                        extend: 'print',
                        text: 'Print',
                        customize: function(win) {
                            $(win.document.body).find('h1').css('text-align', 'center').text('Payroll report: <?php echo $payroll_id ?>');
                            var h3Text = 'From <?php echo $start_date; ?> to <?php echo $end_date ?>';
                            $('<h5>').css({
                            'text-align': 'center',
                            'margin-top': '20px' // Adjust the margin as needed
                            }).text(h3Text).insertAfter($(win.document.body).find('h1'));
                            $(win.document.body).find('table').css('font-size', '12px');
                            $(win.document.body).find('table').addClass('compact').css('width', '100%');
                            $(win.document.body).find('.buttons-print').addClass('float-right'); // Add custom CSS class
                        },
                        filename: 'Payroll_Report_<?php echo $payroll_id; ?>' // Specify your custom filename here
                        }
                    ]
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        // Call updateTable() initially to populate the table
        updateTable();
    </script>
</body>
</html>
