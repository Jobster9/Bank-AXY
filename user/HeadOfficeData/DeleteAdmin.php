<?php
ob_start(); // start output buffering
include("header.php");
// Create a new PDO connection object
include("DeleteUserDetails.php");



if (isset($_POST['submit'])) {

    $result = deleteStaffMember($User_ID);
    if ($result) {
        echo ("<script>location.href = 'ViewAdmin.php?deleted=true';</script>");
    }
}



?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Delete Staff</title>

<!-- Favicons -->
<link href="../../assets/img/favicon-32x32.png" rel="icon">
<link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

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
                <h1 class="h3 mb-0 light" style="text-align: center;">Confirm Deletion of: <?php echo $User_ID ?></h1>
            </div>
        </div>






        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title light mb-4 "></h5>

                <h3 class="h3 mb-4 light" style="text-align: center;">User ID: <?php echo $rows_array[0]["User_ID"] ?></h3> 
<p style="text-align: center;"> Please confirm you want to delete & archive this user.</p>

                                    <form method="post">
               <small><h3 class="h3 mb-0 light" style="text-align: center;">First Name: <?php echo $rows_array[0]["First_Name"] ?></h3><small> 
               <small><h3 class="h3 mb-0 light" style="text-align: center;">Last Name: <?php echo $rows_array[0]["Last_Name"] ?></h3><small> 
               <small><h3 class="h3 mb-0 light" style="text-align: center;">Email: <?php echo $rows_array[0]["Email"] ?></h3><small> 
               <small><h3 class="h3 mb-0 light" style="text-align: center;">Last Active: <?php echo $rows_array[0]["Last_Active"] ?></h3><small> 
               <small><h3 class="h3 mb-0 light" style="text-align: center;">Branch: <?php echo $rows_array[0]["Branch"] ?></h3><small> 
               <small><h3 class="h3 mb-0 light" style="text-align: center;">Department: <?php echo $rows_array[0]["Department"] ?></h3><small> 

                                <div id="deleteButton" class="d-grid col-sm-6 mx-auto">
                                    <button type="submit" name="submit" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block">Delete</button>
                                    
                                </div>
                                </div>
                                
                                </form>
                                <div id="backButton" class="d-grid col-sm-4 mx-auto">
                                    <button onclick="document.location='ViewAdmin.php'" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block">Back</button>

                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-sm-2"></div>



            </div>


        </div>

    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $('#bar').click(function() {
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

    });
</script>

</body>

</html>