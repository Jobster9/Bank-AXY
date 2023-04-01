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