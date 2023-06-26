<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .card-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row d-flex justify-content-center">
                    <div class="card w-100">
                        <div class="card-body" id="cards-container">
                            <!--What would be ajaxed-->

                            <!--end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateCardsContainer() {
            $.ajax({
                url: 'announcement_ajax.php',
                method: 'POST',
                data: {},
                success: function(data) {
                    $('#cards-container').html(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function(){
            updateCardsContainer();
            setInterval(updateCardsContainer, 1000);
        });
    </script>
</body>
</html>
