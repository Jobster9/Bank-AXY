<!DOCTYPE html>
<html lang="en">
<?php include "../config.php";
?>


<head>
    <title>Privacy and Policy</title>
  <!-- Fonts from Google  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- CSS Files for terms and privacypolicy -->
    <link href="..assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">


    <style>
        .img-round {
            height: 150px;
            width: 150px;
            border: 4px solid white;
            border-radius: 100%;
        }
    </style>


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
          <li>Privacy Policy</li>
        </ol>
      </div>
    </div>
  </section>

  <section class="inner-page">
    <div class="container">
      <h1>Privacy Policy</h1>
      <p>Last updated: March 31, 2023</p>
      <p>The present Privacy Policy elucidates Our established policies and procedures concerning the acquisition, utilization, and exposure of Your data while availing the Service, and also highlights Your privacy entitlements and the legal safeguards that uphold them.</p>
      <h2>Your Personal Data</h2>
      <p>The Company may use Personal Data for the following purposes:</p>
      <ul>
        <li>
          <p><strong>To provide and maintain our Service</strong>, including to monitor the usage of our Service.</p>
        </li>
        <li>
          <p><strong>To manage Your Account:</strong> to manage Your registration as a user of the Service. The Personal Data You provide can give You access to different functionalities of the Service that are available to You as a registered user.</p>
        </li>
        <li>
          <p><strong>For the performance of a contract:</strong> the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased or of any other contract with Us through the Service.</p>
        </li>
        <li>
          <p><strong>To contact You:</strong> To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application's push notifications regarding updates or informative communications related to the functionalities, products or contracted services, including the security updates, when necessary or reasonable for their implementation.</p>
        </li>
        <li>
          <p><strong>To provide You</strong> with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless You have opted not to receive such information.</p>
        </li>
        <li>
          <p><strong>To manage Your requests:</strong> To attend and manage Your requests to Us.</p>
        </li>
      </ul>
      <p>You are advised to review this Privacy Policy periodically for any changes.</p>
      <ul>
      </ul>
    </div>
  </section>
</main>
<?php
include "footer.php";
?>
</html>