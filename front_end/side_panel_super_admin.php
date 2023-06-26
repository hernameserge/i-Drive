<?php 
include('../backend/employee_login.php');
if (!isset($_SESSION['idrive_id'])) {
    header("Location: employee_login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="../css/side_panel_super_admin.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
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
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleProfileDropdown()">
                <img src="https://play-lh.googleusercontent.com/A6y8kFPu6iiFg7RSkGxyNspjOBmeaD3oAOip5dqQvXASnZp-Vg65jigJJLHr5mOEOryx" alt="" style="height:75px; width:75px; border-radius:50%;">
                SUPER ADMIN
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="super_admin.php?page=logout"><div class="d-flex justify-content-between"><span>Log Out</span><i class="fa-solid fa-right-from-bracket"></div></i></a>
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
            <h5>SUPER ADMIN</h5>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div id="buttons-container">
            <ul class="list-group">
                <li class="list-group-item"><a href="super_admin.php?page=employees"><button class="d-flex justify-content-around"><img src="../photos/staff.png" alt=""><span>EMPLOYEES</span></button></a></li>
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
