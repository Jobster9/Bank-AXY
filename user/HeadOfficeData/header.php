<?php include "../../config.php";
session_start();


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
                    <a href="ViewAdmin.php" id="ViewStaff" class="nav-link text-left" role="button" style ="font-size: 23px">
                        <i class="fas fa-users"></i> View Admin
                    </a>
                </li>

                <li class="menuHover">
                    <a href="CreateAdmin.php" id="CreateStaff" class="nav-link text-left" role="button" style ="font-size: 23px">
                        <i class="fas fa-user-plus"></i> Create Admin
                    </a>
                </li>

                <li class="menuHover">
                    <a href="AuditTrail.php" id="AuditTrail" class="nav-link text-left" role="button" style ="font-size: 23px">
                        <i class="far fa-clipboard"></i> Audit Trails
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






    <div id="page-content-wrapper">
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: #FFCC00;




        }
    </style>
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

<form class="d-none d-sm-inline-block form-inline navbar-search">
    <div class="input-group">
        <h1 id="bankBrand" style="font-size: 24px; color:blue" class="mt-2"><?php echo "As-salamu alaykum " . $_SESSION['User_ID'] ?></h1>
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

</ul>

                    <!-- Topbar Search -->

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

