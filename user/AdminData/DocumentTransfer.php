<?php include "header.php";
include("DeleteUserDetails.php");
$User_ID = $_GET['User_ID'];
$Branch = $rows_array[0]["Branch"];
$Department = $rows_array[0]["Department"];

$Documents = checkUsersDocuments($User_ID);
$DepartmentMembers = GetDepartmentMembers($Branch, $Department);
$UserPosition = array_search($User_ID, array_column($DepartmentMembers, 'User_ID'));
unset($DepartmentMembers[$UserPosition]);
$UpdatedMembers = array_values($DepartmentMembers);
$indexValue = 0;

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
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">Transfer <?php echo $User_ID ?>'s Documents</h1>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>
                                <h3 class="h3 mb-4 light" style="text-align: center;">This user owns documents</h3>
    <p style="text-align: center;"> Before you can delete this user, their document ownership must be transferred.<br> Please select another department member for each document listed</p>
                                    <form method="post">
                                        
                   <small><h3 class="h3 mb-0 light" style="text-align: center;">Name: <?php echo $rows_array[0]["First_Name"], " ", $rows_array[0]["Last_Name"] ?></h3><small> 
                   <small><h3 class="h3 mb-0 light" style="text-align: center;">Last Active: <?php echo $rows_array[0]["Last_Active"] ?></h3><small> 
                   <small><h3 class="h3 mb-0 light" style="text-align: center;">Branch: <?php echo $rows_array[0]["Branch"] ?></h3><small> 
                   <small><h3 class="h3 mb-0 light" style="text-align: center;">Department: <?php echo $rows_array[0]["Department"] ?></h3><small> 
                    <?php foreach ($Documents as $documentName) { ?>
                                            <div class="input-group-prepend mb-4 mt-2 col-md-8 mx-auto">
                                            <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i><?php echo $documentName ?></span>
                                            <select class="form-control" name="transferdocnumber[<?php echo $indexValue ?>]" placeholder="select new owner">
                                            <?php for ($i = 0; $i < count($UpdatedMembers); $i++) { ?>
                                                                                                                                                                                        <option value="<?php echo $UpdatedMembers[$i]["User_ID"] ?>"><?php echo $UpdatedMembers[$i]["User_ID"], ": ", $UpdatedMembers[$i]["First_Name"], " ", $UpdatedMembers[$i]["Last_Name"] ?></option>                                                              
                                            <?php } ?>
                                            </select>
                                            </div>
                                        <?php $indexValue++;
                    } ?>
                                    <div id="deleteButton" class="d-grid col-sm-6 mx-auto">
                                        <button type="submit" name="submit" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block"> Transfer</button>
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

    $result = TransferDocuments($Documents);
    if ($result) {
        echo ("<script>location.href = 'DeleteStaff.php?transfer=true&User_ID=" . $User_ID . "';</script>");
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

function GetDepartmentMembers($branch, $department)
{

    // Create a new PDO connection object
    include("../../DB config.php");
    $stmt = $pdo->prepare("SELECT User_ID,First_Name,Last_Name FROM dbo.Bank_Employees WHERE Branch = ? AND Department = ?");
    $stmt->bindParam(1, $branch, PDO::PARAM_STR);
    $stmt->bindParam(2, $department, PDO::PARAM_STR);
    $stmt->execute();

    //Select all Documents tied to user
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $DepartmentMembers[] = $result;
    }
    return $DepartmentMembers;

}

function TransferDocuments($Documents)
{

    // Create a new PDO connection object
    include("../../DB config.php");

    for ($i = 0; $i < count($Documents); $i++) {

        $stmt = $pdo->prepare("UPDATE Documents SET Owner_ID = ? WHERE Document_Name = ?");
        $stmt->bindParam(1, $_POST['transferdocnumber'][$i], PDO::PARAM_STR);
        $stmt->bindParam(2, $Documents[$i], PDO::PARAM_STR);
        $result = $stmt->execute();
        if (!$result) {
            $error = $stmt->errorInfo();
            echo "Error transferring document {$Documents[$i]}: {$error[2]}";
            return false;
        }
    }
    return true;

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