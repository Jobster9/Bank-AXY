<?php
error_reporting(E_ERROR);
include_once("../config.php");
include_once("checkLogin.php");
$recaptcha_response = $_POST['g-recaptcha-response'];
$secret_key = '6LfWeRQlAAAAANkUBSkSLlVPzGzZDwySUzbpoxpl';
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$recaptcha_response);
$response_data = json_decode($response);

function updateLastActive($Last_Active, $User_ID)
{
    include("../DB config.php");

    $sql = "UPDATE Bank_employees SET Last_Active=? WHERE User_ID=?";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$Last_Active, $User_ID]);

}

Function EmailAuthentication($Email){

    $AuthCode = rand(10000, 99999);
 
    $to_email = $Email; //email that you want to send to
    $subject = "Bank AXY Authentication Code";
    $body = "Your Authentication code is " . $AuthCode;
    $headers = "From: Bank AXY";
         
    mail($to_email, $subject, $body, $headers);

 return $AuthCode;

}

$User_ID_Error = $User_Password_Error = $invalidMesg = "";
$allField = True;

    if (isset($_POST['submit'])) {
        if($response_data->success){        

            $array_User = verifyUsers();
            if (!empty($array_User)) {

            if(password_verify($_POST['Password'], $array_User[0]['Password'])) { //This one will verify

             
                $User_ID = $array_User[0]["User_ID"];
                $Role = $array_User[0]["User_Role"];
                $Department = $array_User[0]["Department"];


                date_default_timezone_set('Europe/London');

                $Last_Active = date('d/m/Y H:i');

                updateLastActive($Last_Active ,$User_ID);

                $AuthCode = EmailAuthentication($array_User[0]["Email"]);

                $_SESSION['Auth_Code'] = $AuthCode;
                $_SESSION['User_Role'] = $Role;
                $_SESSION['Department'] = $Department;

                header("Location: LoginAuthentication.php");

            } else{
            $invalidMesg = "Invalid User ID or Password!";
            }} else{
                $invalidMesg = "Invalid User ID or Password!";

            }
    }
else{
            $invalidMesg = "Verification not completed!";    
}    
}

?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login</title>
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
                            <p class="login-card-description">Sign into your account</p>

                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="User_ID" id="Username" class="form-control" placeholder="Username" required>
                                    <span class="text-danger"><h2><?php echo $User_ID_Error; ?></h2></span>
                                    <p id="alert1" style="color: red;"></p>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="Password" id="password" class="form-control" placeholder="***********" required>
                                    <span class="text-danger"><h2><?php echo $User_Password_Error; ?></h2></span>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LfWeRQlAAAAAK97iBXQTSYfVe8wEBSx8tq2bDph"></div>
                                <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                                <span class="text-danger"><h2><?php echo $invalidMesg; ?></h2></span>   
                            </form>
                            <nav class="login-card-footer-nav">
                                <p><h13>By logging in you agree to the Terms of use and Privacy  Policy.</h13></p>
                                <a href="../pages/terms.php">Terms of use.</a>
                                <a href="../pages/privacypolicy.php">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/showHidePass.js"></script>

    <script>
        $(document).ready(function() {
            $('input[type=\'password\']').showHidePassword();
        });
    </script>
</body>
</html>