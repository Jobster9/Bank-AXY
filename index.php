<?php
include "config.php";
?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo BANKNAME ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon-32x32.png" rel="icon">
  <link href="assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/Index.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo"><img src="assets/img/Logo3.png" alt="" class="img-fluid"> &nbsp <?php echo BANKNAME ?></a>
      <!-- <h1 class="logo"><a href="index.html"><?php echo BANKNAME ?></a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>

          <li><a class="getstarted scrollto" href="./user/login.php">&nbsp Login &nbsp</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Making document management easy.</h1>
          <h2>Project by Group 28</h2>
          <div class="heroBtn">

          </div>

        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/Bank-img1.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">


  </main>

  
</body>
</html>
<?php
include "footer.php";
?>