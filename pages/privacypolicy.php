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
</head>
<body>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            color: #000;
            margin: 0;
        }
        /* Header */
        #header {
            background-color: #00247d;
            color: #fff;
            padding: 20px 0;
        }
        #header .logo {
            font-weight: 600;
            font-size: 32px;
            color: #fff;
            margin: 0;
        }
        #header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        #header nav li {
            margin-left: 30px;
        }
        #header nav li:first-child {
            margin-left: 0;
        }
        #header nav a {
            color: #fff;
            text-decoration: none;
        }
        #header nav a:hover {
            color: #ddd;
        }
        /* Breadcrumbs */
/* Add this CSS to remove gap between navbar and breadcrumbs and set background color to white */
.breadcrumbs {
  background-color: #fff;
  margin-top: 0;
  padding: 10px 0;
}

/* Add this CSS to center the logo and navbar items in the header */
#header {
  display: flex;
  justify-content: center;
  align-items: center;
}

#header .logo {
  margin-right: auto;
}

#header #navbar {
  margin-left: auto;
}

/* Add this CSS to make the home and login buttons side by side on the right-hand side of the header */
#header #navbar ul {
  display: flex;
  justify-content: flex-end;
}

#header #navbar ul li {
  margin-left: 20px;
}

#header #navbar ul li:first-child {
  margin-left: 0;
}

        .breadcrumbs ol {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .breadcrumbs li {
            display: inline-block;
            margin-right: 10px;
        }
        .breadcrumbs li:last-child {
            margin-right: 0;
        }
        .breadcrumbs li a {
            color: #000;
            text-decoration: none;
        }
        .breadcrumbs li a:hover {
            color: #999;
        }
        /* Privacy Policy */
        .inner-page {
            background-color: white;
            padding: 30px;
        }
        .inner-page h1 {
            color: #00247d;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .inner-page h2 {
            color: #00247d;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .inner-page p {
            margin-bottom: 20px;
        }
        .inner-page ul {
            margin-bottom: 20px;
        }
        .inner-page li {
            margin-bottom: 10px;
        }
    </style>
    <!--  Header  -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="../"><?php echo BANKNAME ?></a></h1>

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
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
            <h3><?php echo BANKNAME ?></h3>
          </div>
    <div class="container">
      <div class="copyright-wrap d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
            &copy; Copyright <strong><span><?php echo BANKNAME ?></span></strong>. All Rights Reserved
          </div>
        </div>
      </div>
  </footer>
  
</html>