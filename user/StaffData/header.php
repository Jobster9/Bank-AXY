<?php include("../../config.php");

session_start();



function GetUserID()
{
    return $_SESSION['User_ID'];
}
function GetDepartment()
{
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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="wrapper ribbon ribbon-top-right">
    <div class="overlay"></div>

<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>


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





<style>
    #ayo {
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
  color: #FFCC00;  
}
</style>


    <div id="page-content-wrapper">

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="ayo">
            <h1>Bismillahir Rahmanir Raheem' الرَّحِيْمِ الرَّحْمٰنِ اللهِ بِسْمِ</h1>
        </div>            
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
<style>
    /* Position the form using absolute positioning */
    .navbar-search {
        position: absolute;
        top: 0;
        left: 900px; /* Change this value to adjust the horizontal position */
        transform: translate(-50%, 0);
        width: 300px; /* Change this value to adjust the width of the form */
    }

    /* Adjust the spacing around the h1 element */
    #bankBrand {
        margin: 0 10px; /* Change this value to adjust the spacing */
    }

    /* Change the font size and color of the h1 element */
    #bankBrand {
        font-size: 24px;
        color: blue;
    }
</style>

                        <div class="input-group">
                            <h1 id="bankBrand" style="font-size: 24px; color:blue" class="mt-6"><?php echo "As-salamu alaykum " . $_SESSION['User_ID'] ?></h1>
                        </div>
      


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

                    </ul>

                </nav>