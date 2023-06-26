<?php 
include('../backend/db_connect.php');
include('../backend/employee_login.php');
if (!isset($_SESSION['idrive_id'])) {
    header("Location: employee_login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="../css/side_panel_admin.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="topnav" class="pl-3 pr-4">
    <button class="openbtn" onclick="openNav()">☰</button>  
    <div class="profile-container">
        <div class="dropdown show">
            <?php
                $query = "SELECT * FROM employee_picture WHERE idrive_id = :id LIMIT 1";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':id', $_SESSION['idrive_id']);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($data) {
            ?>          
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleProfileDropdown()">
                <img src="../employee_photos/<?php echo $data['filename']; ?>" style="height:75px; width:75px; border-radius:50%;" alt="Employee Picture">
                <span><?php echo $_SESSION['name']; ?></span>          
            <?php } ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="admin.php?page=logout"><div class="d-flex justify-content-between"><span>Log Out</span><i class="fa-solid fa-right-from-bracket"></div></i></a>
            </div>
        </div>
    </div>
</div>
<div id="mySidepanel" class="sidepanel">
    <div class="logo-container">
        <div class="row d-flex justify-content-start">
            <div class="row pl-3" style="position:relative;">
                <div class="col-5">
                    <div class="img-container">
                        <img src="../img/i-drive-logo.png" alt="">
                    </div>
                </div>
                <div class="col-7 pt-3 float-left">
                    <span id="iDrive_name">iDrive</span>
                </div>
            </div>
        </div>
    </div>
    <div class="pr-3">
        <div class="account-name-container pl-3 mt-2" id="account-name">
            <h5>ADMIN</h5>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div id="buttons-container">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="admin.php?page=admin_calendar">
                        <button class="d-flex justify-content-around">
                            <div class="d-flex justify-content-around"><div><i class="fa-solid fa-calendar me-3"></i></div><div><span>SCHEDULE</span></div></div>
                        </button>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="admin.php?page=vehicles">
                        <button class="d-flex justify-content-around">
                            <div class="d-flex justify-content-around"><div><i class="fa-solid fa-car me-3"></i></div><div><span>VEHICLES</span></div></div>
                        </button>
                    </a>
                </li>
                <li class="list-group-item" id="management_dropdown">
                    <div class="dropdown">
                        <button class="dropbtn d-flex justify-content-around" onclick="toggleDropdown()">
                        <div class="d-flex justify-content-around"><div><i class="fa-solid fa-coins me-3"></i></div><div><span>FINANCE</span></div></div>
                        </button>
                        <div class="dropdown-content">
                        <a href="admin.php?page=payroll">Payroll</a>
                        <!-- <a href="super_admin.php?page=vehicles">Car</a> -->
                        </div>
                    </div>
                </li>
                <!-- <li class="list-group-item"> <a href="super_admin.php?page=employee_attendance"><button class="d-flex justify-content-around"><div class="photos-container"><img src="../photos/approval.png" alt="" style="height:50px; width:auto; float:left;"></div><span>For Approval</span></button></a></li> -->
            </ul>
        </div>
    </div>
</div>
<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
  if(window.innerWidth <= 600){
    document.querySelector('main').style.marginLeft = "0";
  }else{
    document.querySelector('main').style.marginLeft = "250px";
  }
  localStorage.setItem('sidePanelOpen', 'true');
}
function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
    document.querySelector('main').style.marginLeft = "0";
}
function toggleDropdown() {
    var dropdownContent = document.querySelector("#management_dropdown .dropdown-content");
    dropdownContent.classList.toggle("show");
}
function toggleProfileDropdown() {
    var dropdownContent = document.querySelector(".profile-container .dropdown-menu");
    dropdownContent.classList.toggle("show");
}

</script>
   
</body>
</html> 
