<?php
include_once("../config.php");
session_start();
$Authentication = $_SESSION['Auth_Code'];
$User_ID = $_SESSION['User_ID'];
$Role = $_SESSION['User_Role'];
echo $Authentication . " This is authentication code (remove this for client just here so we can log in)";
$AuthError = "";

if (isset($_POST['submit'])) {
if ($Authentication == $_POST["AuthCode"]){

            if ($Role == "Staff") {
                header("Location: ../user/StaffData/Dashboard.php?User_ID=" . $User_ID);
            }
            if ($Role == "Admin") {
                header("Location: ../user/AdminData/Dashboard.php?User_ID=" . $User_ID);
            }
            if ($Role == "Head Office") {
                header("Location: ../user/HeadOfficeData/Dashboard.php?User_ID=" . $User_ID);
            }
        } else {

            $AuthError = "Incorrect authentication code";
        }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <style>
        .swal-button {
            padding: 7px 19px;
            border-radius: 2px;
            background: linear-gradient(to right, #0032A0, #CC0000);
            font-size: 12px;
            color: white;
        }
        .swal-button:hover {
            opacity: 0.8;
            background-color: transparent;
        }
    </style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
var timeoutID;

// Start the timer on page load
function startTimer() {
  timeoutID = window.setTimeout(redirectToIndex, 300000); // 5 minutes = 300,000 milliseconds
}

// Redirect to the index page
function redirectToIndex() {
  window.location.href = "http://localhost/BankAXY/index.php";
}

// Start the timer when the page has finished loading
window.addEventListener("load", startTimer);
</script>



</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="../assets/img/PageImage/loginImage.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <p><?php echo BANKNAME ?></p>                             
                            </div>
                            <p class="login-card-description">Please enter the authentication code sent to your email</p>
                            <form method="POST">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p style="color: red;"> *<?php echo $_GET['error'] ?> ! </p>
                                <?php } ?>
                                <div class="form-group">
                                    <input type="text" name="AuthCode" id="AuthCode" class="form-control" placeholder="Authentication Code" required>
                                    <p id="alert1" style="color: red;"></p>
                                </div>
                                <div class="form-group mb-4">
                                </div>
                                <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Submit">
                                <span class="text-danger"><h2><?php echo $AuthError; ?></h2></span>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        <?php if (isset($_GET['error'])) { ?>
        swal({
            title: "Account Alert!",
            text: "<?php echo $_GET['error'] ?>",
            icon: "error",
        });
        <?php } ?>
    </script>
</body>
</html>