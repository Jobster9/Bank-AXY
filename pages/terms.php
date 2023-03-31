<!DOCTYPE html>
<html lang="en">
<?php include "../config.php";
?>

<head>
    <title>Terms</title>
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

<main id="main">

  <!--  Breadcrumbs  -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <ol>
          <li><a href="../">Home</a></li>
          <li>Terms and Condition</li>
        </ol>
      </div>
    </div>
  </section>

  <section class="inner-page">
    <div class="container">
      <h2><strong>Terms and Conditions</strong></h2>
      <p>Welcome to <?php echo BANKNAME ?>!</p>
      <p>These terms and conditions outline the rules and regulations for the use of <?php echo BANKNAME ?>'s Website, located at <?php echo BANKNAME ?>.com.</p>
      <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use <?php echo BANKNAME ?> if you do not agree to take all of the terms and conditions stated on this page.</p>
      <h3><strong>Cookies</strong></h3>
      <p>We employ the use of cookies. By accessing <?php echo BANKNAME ?>, you agreed to use cookies in agreement with the <?php echo BANKNAME ?>'s Privacy Policy. </p>
      <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
      <h3><strong>Information Use</strong></h3> 
      <p>We use the personal information collected from you for the purpose of providing the EDRMS service. We may also use this information to communicate with you, provide customer support, and to improve the quality of our service.</p>
      <h3><strong>Information Collection</strong></h3>
      <p>We may collect personal information from you when you use our EDRMS. This information may include your name, email address, contact information, username, and other relevant information necessary to provide the EDRMS service.</p>
      <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
    </div>
  </section>
</main>
<?php
include "footer.php";
?>
</html>