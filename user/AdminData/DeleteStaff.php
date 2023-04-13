    <?php include "header.php";
    include("DeleteUserDetails.php");

    ?>
    <script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>


    <title>Delete Staff</title>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link rel="stylesheet" href="../../assets/css/UserDash.css">
    <link rel="stylesheet" href="../../assets/css/StaffStyle.css">
</head>

<body>

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
                                <?php if (isset($_GET['transfer'])): ?>
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-weight: bold;">
                                                                    Users documents have been successfully transferred.
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
<?php endif; ?>
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
                                    <div id="backButton" class="d-grid col-sm-6 mx-auto">
                                        <button onclick="document.location='ViewStaff.php'" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block">Go Back</button>

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

<?php
if (isset($_POST['submit'])) {

    $Documents = checkUsersDocuments($User_ID);

    if (isset($Documents)) {
        echo ("<script>location.href = 'DocumentTransfer.php?User_ID=" . $User_ID . "';</script>");
    } else {
        $result = deleteStaffMember($User_ID);
        if ($result) {
            echo ("<script>location.href = 'ViewStaff.php?deleted=true';</script>");
        }
    }
}
function checkUsersDocuments($User_ID)
{
    // Create a new PDO connection object
    include("../../DB config.php");
    $stmt = $pdo->prepare("SELECT Document_Name FROM dbo.Documents WHERE Owner_ID = ?");
    $stmt->bindParam(1, $User_ID, PDO::PARAM_STR);
    $stmt->execute();

    //Select all Documents tied to user
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $Documents[] = $result['Document_Name'];
    }
    return $Documents;

}

function deleteStaffMember($User_ID)
{
    // Create a new PDO connection object
    include("../../DB config.php");
    $stmt = $pdo->prepare("DELETE FROM dbo.Bank_Employees WHERE User_ID = ?");
    $stmt->bindParam(1, $User_ID, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
}

?>
    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });
    </script>

</body>

</html>