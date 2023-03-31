<?php
include "config.php";
?>

<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo BANKNAME ?></title>
  <!-- Fonts from Google  -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- CSS Files for Index Page -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo"><img src="assets/img/Logo3.png" alt="" class="img-fluid"> &nbsp <?php echo BANKNAME ?></a>
  <!-- Navigation -->      
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="./user/login.php">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Body -->   
  <section id="hero" class="d-flex align-items-center">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Making document management easy.</h1>
          <h2>Project by Group 28</h2>
          <div class="heroBtn">
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/Bank-img1.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

</body>
</html>
<?php
include "footer.php";
?>