<!DOCTYPE html>
<html>
    <head>
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
    </head>
    <body>
        <div class="container-fluid mt-3">
            <div class="row pt-3">
                <div class="col-lg p-2" style="background-color:white;">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6"><h4>Car List</h4></div>
                                <div class="col-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-car"><i class="fa-solid fa-plus mr-2"></i>Add Car</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="vehicle-table">
                                <thead>
                                    <tr>
                                        <th>Car Name</th>
                                        <th>Plate Number</th>
                                        <th>Category</th>
                                        <th>Price Per Session</th>
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
        <!--MODAL FOR ADDING CARS-->
        <div class="modal fade" id="add-car" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h4>ADD CAR</h4></div>
                    <div class="container w-100 d-flex justify-content-center mt-2"><p id="response"></p></div>
                    <form class="was-validated p-3" id="add_vehicle">
                        <div class="form-group">
                            <div>
                                <label for="model">Carl Model</label>
                                <input type="text" class="form-control is-valid" name="model" id="model" placeholder="Car Model" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="plate_number">Plate Number</label>
                                <input type="text" class="form-control is-valid" name="plate_num" id="plate_number" placeholder="Plate Number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dropdown">Category</label>
                            <select class="custom-select" name="category" id="dropdown" required>
                                <option value="">Open this select menu</option>
                                <option value="Sedan Automatic">Sedan Automatic</option>
                                <option value="Sedan Manual">Sedan Manual</option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Tricycle">Tricycle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price Per Session</label>
                            <input type="number" class="form-control is-valid" name="price" id="price" placeholder="Price Per Session" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                function updateTable() {
                    $.ajax({
                        url: 'fetch_vehicles.php',
                        method: 'POST',
                        data: {},
                        success: function(data) {
                            $('#vehicle-table').DataTable().destroy();
                            $('#vehicle-table tbody').html(data); // Update only the tbody section
                            $('#vehicle-table').DataTable(); // Initialize DataTable on the updated table
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                // Reload the table every 5 seconds
                setInterval(updateTable, 1000);
                updateTable();
                $('#add_vehicle').submit(function(e){
                    e.preventDefault();
                    var model = $('#model').val();
                    var plate = $('#plate_number').val();
                    var category = $('#dropdown').val();
                    var price = $('#price').val();
                    




                        $.ajax({
                            url: 'add_vehicle.php',
                            method: 'POST',
                            data: {
                                model: model,
                                plate: plate,
                                category: category,
                                price: price
                            },
                            success: function(response) {
                                // Handle the success response if needed
                                $('#response').html('<div class="alert alert-success">Payroll generated successfully!</div>');
                            },
                            error: function(xhr, status, error) {
                                // Handle the error if needed
                                console.error(error);
                            }
                        });
                    });
                    $('#vehicle-table').DataTable( {    
                    responsive: true
                });
            });
        </script>
    </body>
</html>