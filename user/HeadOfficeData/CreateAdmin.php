    <?php include "header.php";
    include "CreateAdminSQL.php"; ?>
    <script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Create Admin</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">



    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../../assets/css/StaffStyle.css">


<?php
$errorfname = $errorlname = $erroremail = $errorpwd = $errorbranch = $errordep = $duplicateEmail = "";
$allFields = "yes";
$adminCreation = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $Duplicate = checkDuplicateEmail($email);
    $strongPassword = passwordCheck($_POST['password']);
    if ($_POST['fname'] == "") {
        $errorfname = "*First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['lname'] == "") {
        $errorlname = "*Last name is mandatory";
        $allFields = "no";
    }
    if ($_POST['email'] == "") {
        $erroremail = "*Email is mandatory";
        $allFields = "no";
    }
    if ($Duplicate) {
        $erroremail = "*This email already exists";
        $allFields = "no";
    }
    if ($_POST['password'] == "") {
        $errorpwd = "*Password is mandatory";
        $allFields = "no";
    }
    if ($_POST['branch'] == "") {
        $errorbranch = "*Branch is mandatory";
        $allFields = "no";
    }
    if ($_POST['department'] == "") {
        $errordep = "*Department is mandatory";
        $allFields = "no";
    }
    if ($strongPassword == 0) {
        $errorpwd = "*Password is not strong enough";
        $allFields = "no";
    }

    if ($allFields == "yes") {

        CreateAdmin();
        $adminCreation = true;
    }

}

?>

</head>

<body>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">Create Admin:</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>
                                <?php if ($adminCreation): ?>
                                                                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-weight: bold;">
                                                                                The Admin member has been successfully created.
                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
<?php endif; ?>
                                <form method="post">
                                <div style="margin-left: 15%; margin-right: 15%; margin-top:10%;">
                                    <div class="input-group mt-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
                                        </div>
                                        <input name="fname" type="text" id="AccountNo" class="form-control gray_bg light" aria-label="Default" placeholder="First Name:" aria-describedby="inputGroup-sizing-default">
                                        <span id="info" hidden class="input-group-append bg-white border-left-0">
                                            <span class="input-group-text bg-transparent">
                                                <i class='bx bx-info-circle' style="color: #FFCC00;"></i>
                                            </span>
                                        </span>

                                    </div>  
                                    <p id="errorpwd" style="color: #FFCC00;"></p>
                                        <span class="text-danger"><?php echo $errorfname; ?></span>

                                    <div class="input-group mb-1 mt-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
                                        </div>
                                        <input name="lname" type="tel" class="form-control gray_bg light" aria-label="Default" placeholder="Last Name:" aria-describedby="inputGroup-sizing-default">

                                    </div>
                                    <p id="errorpwd" style="color: #FFCC00;"></p>
                                        <span class="text-danger"><?php echo $errorlname; ?></span>

                                    <div class="input-group mb-1 mt-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
                                        </div>
                                        <input name="email" type="tel" class="form-control gray_bg light" aria-label="Default" placeholder="Email:" aria-describedby="inputGroup-sizing-default">

                                    </div>
                                    <p id="errorpwd" style="color: #FFCC00;"></p>
                                        <span class="text-danger"><?php echo $erroremail; ?></span>                                    
                                    <div class="input-group mb-1 mt-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
                                        </div>
                                         
                                        <input name="password" type="password" class="form-control gray_bg light" aria-label="Default" placeholder="Password:" aria-describedby="inputGroup-sizing-default">


                                          
                                    </div>
                                    <p id="errorpwd" style="color: #FFCC00;"></p>

    <span class="text-danger"><?php echo $errorpwd; ?></span>



                                    <div class="input-group mb-1 mt-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
                                    </div>
                                    <select name="branch" class="form-control gray_bg light" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                        <option value="">Select branch</option>
                                        <option value="<?php echo HEAD_OFFICE ?>">Kuala Lumpur</option>
                                        <option value="<?php echo EAST_BRANCH ?>">Kuching</option>
                                    </select>

                                    </div>
                                    <p id="errorpwd" style="color: #FFCC00;"></p>
                                    <span class="text-danger"><?php echo $errorbranch; ?></span>
                                    <!-- Amount -->
                                    <div class="input-group mb-1 mt-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
                                    </div>
                                    <select name="department" class="form-control gray_bg light" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                        <option value="">Select department</option>
                                        <option value="<?php echo ACCOUNTS_DEP ?>">Accounts</option>
                                        <option value="<?php echo ADMIN_DEP ?>">Administration</option>
                                        <option value="<?php echo LOANS_DEP ?>">Loans</option>
                                        <option value="<?php echo MORTGAGES_DEP ?>">Mortgage Advice</option>
                                    </select>

                                    </div>
                                    <p id="errorpwd" style="color: #FFCC00;"></p>
                                    <span class="text-danger"><?php echo $errordep; ?></span>
                                    <div id="Pay" class="d-grid gap-2 mt-5 col-sm-6 mx-auto">






                                    <div id="Pay" class="d-grid gap-2 mt-5 col-sm-6 mx-auto">
                                        <input name="submit" type="submit" style="margin-top: 20%; margin-bottom: 25%;" class="btn1 btn-lg btn-block"></input>

                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>



                </div>


            </div>

        </div>

        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
            <div class="modal-dialog loadingModal modal-lg">
                <div class="modal-content" style="width: 50px; height:50px; background: transparent;">
                    <span class="fas fa-spinner fa-pulse fa-3x" style="color:white"></span>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Page Content -->




    <!-- Wraper Ends Here -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../UserData/js/profileInfo.js"></script>
    <script src="../UserData/js/transfer.js"></script>


    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });
    </script>

</body>

</html>