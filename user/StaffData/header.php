<?php include("../../config.php");
session_start();

function GetUserID(){
    return $_SESSION['User_ID'];
}
function GetDepartment(){
    return $_SESSION['Department'];
}


if (!isset($_SESSION['User_ID'])) {
    session_destroy(); // Destroy the session
    header('Location: /BankAXY/user/login.php');
    exit;
}

echo '<script>
var timer = null;
document.addEventListener("mousemove", function() {
    if (timer) {
        clearTimeout(timer);
    }
    timer = setTimeout(function() {
        destroySession();
    }, 120000);
});

window.onbeforeunload = function() {
    destroySession();
};

function destroySession() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "/BankAXY/user/logout.php", true);
    xhttp.send();
    window.location.href = "/BankAXY/user/login.php";
}
</script>';


?>





<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<div id="wrapper ribbon ribbon-top-right">
    <div class="overlay"></div>
<link href="assets/img/favicon-32x32.png" rel="icon">

    <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0px;">
            <a class="sidebar-brand" href="../../index.php" style ="font-size: 25px">
                <span class="align-middle"><?php echo BANKNAME ?></span>

            </a>

            <ul class="navbar-nav align-self-stretch">

                <!-- <li class="sidebar-header">
                        Pages
                    </li> -->
                <li class="menuHover">

                    <a href="Dashboard.php" id="Dashboard" class="nav-link text-left " role="button" aria-haspopup="true" aria-expanded="false" style ="font-size: 23px">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>



                <li class="menuHover box-icon">
                    <a href="UploadDocuments.php" id="UploadDocuments" class="nav-link text-left" role="button" style ="font-size: 23px">
                        <i class="fas fa-file-upload"></i> Upload Documents
                    </a>
                </li>

                <li class="menuHover">
                    <a href="ViewDocuments.php" id="ViewDocuments" class="nav-link text-left" role="button" style ="font-size: 23px">
                        <i class="fas fa-file"></i> View Documents
                    </a>
                </li>

                <li class="menuHover">
                    <a class="nav-link text-left" role="button" href="<?php echo 'logout.php'; ?>" style ="font-size: 23px">
                        <i class="fas fa-door-open"></i> Logout
                    </a>
                </li>


            </ul>


        </div>


    </nav>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->








    <div id="page-content-wrapper">
<style>

body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  font-size: 16px;
  color: #000;

}

.container {
  max-width: 480px;
  margin: 0 auto;
  padding: 0 20px;
}

header {
  background-color: #1e0063;
  color: #fff;
  padding: 10px 0;
}

header h1 {
  font-size: 20px;
  text-align: center;
  margin: 0;
  padding: 0;
  line-height: 1.5;
}

</style>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Bismillahir Rahmanir Raheem' الرَّحِيْمِ الرَّحْمٰنِ اللهِ بِسْمِ</h1>
        </div>
    </header>
</body>
</html>



        <div id="content">

            <div class="container-fluid p-0 px-lg-0 px-md-0">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light my-navbar">




                    <!-- Sidebar Toggle (Topbar) -->
                    <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>


                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline navbar-search">
                        <div class="input-group">
                            <h1 id="bankBrand" style="font-size: 24px; color:blue" class="mt-2"><?php echo "As-salamu alaykum " . $_SESSION['User_ID'] ?></h1>


                            <!--  <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div> -->
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown  d-sm-none">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle" style="color: gray;">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <span class="indicator">4</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li> 
                    </ul>

                </nav>