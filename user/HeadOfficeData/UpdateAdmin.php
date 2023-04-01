<?php
include "header.php";
include "CreateAdminSQL.php";
$action = "";
$validated = false;
$updateButton = "Validate";
$User_ID = $_GET['User_ID'];
$User_FirstName_Error = $User_LastName_Error = $User_Email_Error = $User_Password_Error = $invalidMesg = "";
$allField = True;
$Admin = GetAdmin($User_ID);


if (isset($_POST['submit'])) {

    $strongPassword = passwordCheck($_POST["Password"]);

    if ($_POST["First_Name"] == "") {
        $User_ID_Error = "First Name is required";
        $allField = false;
    }

    if ($_POST["Last_Name"] == "") {
        $User_ID_Error = "Last Name is required";
        $allField = false;
    }

    if ($_POST["Email"] == "") {
        $User_ID_Error = "Email is required";
        $allField = false;
    }

    if ($_POST["Password"] == null) {
        $User_Password_Error = "Password is required";
        $allField = false;
    }
    if ($strongPassword == 0) {
        $User_Password_Error = "Password is not strong enough";
        $allField = false;
    }

    if ($allField) {
        $Firstname = $_POST["First_Name"];
        $Lastname = $_POST["Last_Name"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        if ($action = " ") {
            $result = updateAdminMember($Firstname, $Lastname, $Email, $Password, $User_ID);
            if ($result) {
                $action = "ViewAdmin.php?updated=true";
                $updateButton = "Update";
                $validated = true;
            }
        }


    }
}

function GetAdmin($User_ID)
{

    // Create a new PDO connection object
    include("../../DB config.php");

    $stmt = $pdo->prepare("SELECT * FROM Bank_Employees WHERE User_ID = '" . $User_ID . "'");

    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}


function updateAdminMember($Firstname, $Lastname, $Email, $Password, $User_ID)
{

    // Create a new PDO connection object
    include("../../DB config.php");

    $sql = "UPDATE Bank_employees SET First_Name=?, Last_Name=?, Email=?, Password=? WHERE User_ID=?";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$Firstname, $Lastname, $Email, $Password, $User_ID]);
    return $result;

}


?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>Update Admin</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../../assets/css/StaffStyle.css">

</head>

<body>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">Update Admin: <?php echo $Admin[0]['User_ID'] ?></h1>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4"></h5>
                                <h3 class="h3 mb-2 light" style="text-align: center;"><?php echo $User_ID ?></h3>

                            <form action="<?php echo $action ?>" method="POST">

                                <div class="form-group">
                                <label for="first_name" class="">First Name</label>
                                <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i <?php echo ($validated) ? "class= 'bx bx-check-shield' style='color:#50C878'" : "class= 'bx bx-right-arrow-alt' style='color:#FFCC00'"; ?>></i></span>
                                    <input type="text" <?php echo ($validated) ? "disabled" : ""; ?> name="First_Name" id="First_Name" class="form-control" value=<?php echo $Admin[0]['First_Name'] ?> required>
                                </div>
                                    <span class="text-danger"><p><?php echo $User_FirstName_Error; ?></p></span>
                                </div>
    

                                <div class="form-group">

                                <label for="last_name" class="">Last Name</label>
                                <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i <?php echo ($validated) ? "class= 'bx bx-check-shield' style='color:#50C878'" : "class= 'bx bx-right-arrow-alt' style='color:#FFCC00'"; ?>></i></span>                              
                                    <input type="text" <?php echo ($validated) ? "disabled" : ""; ?> name="Last_Name" id="Last_Name" class="form-control" value=<?php echo $Admin[0]['Last_Name'] ?> required>
                                </div>

                                    <span class="text-danger"><p><?php echo $User_LastName_Error; ?></h2></span>
                                </div>

                                <div class="form-group">

                                <label for="email" class="">Email</label>
                                <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i <?php echo ($validated) ? "class= 'bx bx-check-shield' style='color:#50C878'" : "class= 'bx bx-right-arrow-alt' style='color:#FFCC00'"; ?>></i></span>
                                    <input type="text" <?php echo ($validated) ? "disabled" : ""; ?> name="Email" id="Email" class="form-control" value=<?php echo $Admin[0]['Email'] ?> required>
                                </div>

                                    <span class="text-danger"><p><?php echo $User_Email_Error; ?></p></span>
                                </div>

                                <div class="form-group mb-4">

                                <label for="password" class="">Password</label>
                                <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i <?php echo ($validated) ? "class= 'bx bx-check-shield' style='color:#50C878'" : "class= 'bx bx-right-arrow-alt' style='color:#FFCC00'"; ?>></i></span>
                                    <input type="password" <?php echo ($validated) ? "disabled" : ""; ?> name="Password" id="password" class="form-control" value=<?php echo $Admin[0]['Password'] ?> required>
                                </div>
                                    <span class="text-danger"><p><?php echo $User_Password_Error; ?></p></span>
                                </div>
                                <input name="submit" id="update" class="d-grid gap-2 mt-5 col-sm-3 mx-auto btn1 btn-lg btn-block" type="submit" value="<?php echo $updateButton ?>">
                                <span class="text-danger"><h2><?php echo $invalidMesg; ?></h2></span>   
                            </form>
                            <div id="backButton" class="d-grid col-sm-3 mx-auto">
                                        <button onclick="document.location='ViewAdmin.php'" style="margin-top: 20%; margin-bottom: 25%;" class="btn1 btn-lg btn-block">Go Back</button>

                                    </div>
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