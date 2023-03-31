<?php
include "../config.php";
?>
<head>
    <title><?php echo $title ?></title>
  <!-- Fonts from Google  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- CSS Files for terms and privacypolicy -->
    <link href="..assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!--  Header  -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="../"><?php echo BANKNAME ?></a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="../user/login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>