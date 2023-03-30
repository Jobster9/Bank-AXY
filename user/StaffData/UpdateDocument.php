<?php include "header.php";
include "GetDocuments.php";

$uname = $_SESSION['User_ID'];
$user = getDocuments();
$errorMessage = "";
$i = $_GET['File_Location'];
$DuplicateNameError = "";


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

    <title>Update Documents</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/animations.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/transformations.css">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Body & Dash sheets-->
    <link rel="stylesheet" href="../../assets/css/UserDash.css">


    <style>

.card {
    background-image: radial-gradient(circle farthest-corner at 48.9% 4.2%, rgba(216,216,220,255) 0%, rgba(255,255,255,255) 100.2%);
}
.card h3 {
  font-size: 22px;
  font-weight: 600;
  
}
/* The Modal (background) */
.customodal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
}

/* Modal Content (Image) */
.customodal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.customodal-content,
#caption {
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

/* The Close Button */
.closebtn {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.closebtn:hover,
.closebtn:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}

.loadingModal {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20%;
}

.drop_box {
  margin: 10px 0;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border: 3px dotted #a3a3a3;
  border-radius: 5px;
}
.drop_box h4 {
  font-size: 16px;
  font-weight: 400;
  color: #2e2e2e;
}

.drop_box p {
  margin-top: 10px;
  margin-bottom: 20px;
  font-size: 12px;
  color: #a3a3a3;
}

.btn {
  text-decoration: none;
  background-color: #0032A0;
  color: #ffffff;
  padding: 10px 20px;
  border: none;
  outline: none;
  transition: 0.3s;
}

.btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
}
.form input {
  margin: 10px 0;
  width: 100%;
  background-color: #e2e2e2;
  border: none;
  outline: none;
  padding: 12px 20px;
  border-radius: 4px;
}

form { 
margin: 0 auto; 
width:800px;
}


.styled-table thead tr {
    background-color: #0032A0;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}


.styled-table tbody tr {
    border-bottom: 1px solid #0032A0;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: white;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #0032A0;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: black;
}
.styled-table {
    margin: 25px auto;
}

.error-message {
    font-weight: bold;
    color: #c7290a;
    font-size:18px;
}

</style>

<?php

$allField = true;


if (isset($_POST['submit'])) {
    $name = $_POST["DocumentName"];
    //$Duplicate = checkDuplicate($name);

    if ($_POST["DocumentName"] == "") {

        $allField = false;
    }

    if ($_POST["DocumentType"] == null) {

        $allField = false;
    }

    if ($_POST["DocumentCriticality"] == null) {

        $allField = false;
    }
    /*if ($Duplicate) {
    $UploadMessage = "File not updated";
    $DuplicateNameError = "The Document name submitted was a duplicate name.";
    $allField = false;
    }*/

    if ($allField == true) {

        $type = $_POST["DocumentType"];
        $criticality = $_POST["DocumentCriticality"];
        $Document_ID = $_GET['Document_ID'];

        $result = updateDocument($name, $type, $criticality, $Document_ID);
        if ($result) {
            echo ("<script>location.href = 'ViewDocuments.php?updated=true';</script>");
        }
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
                    <h1 class="h3 mb-0 light" style="text-align: center;">Update Document here:</h1>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>
                                
<table class="styled-table">
    <thead>
        <tr>
            <th>Document Name</th>
            <th>Document Type</th>
            <th>Document Criticality</th>
            <th>Owner ID</th>
            <th>Creation Date & Time</th>          
        </tr>
    </thead>
    <tbody>

        <tr class="active-row">
            <td><?php echo $user[$i]['Document_Name'] ?></td>
            <td><?php echo $user[$i]['Document_Type'] ?></td>
            <td><?php echo $user[$i]['Document_Criticality'] ?></td>
            <td><?php echo $user[$i]['Owner_ID'] ?></td>
            <td><?php echo $user[$i]['Creation_Date_Time'] ?></td>


        </tr>
    </tbody>
</table>

<form class="styled-table" Method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">Document Name</label>
    <input type="text" class="form-control" name="DocumentName" value="<?php echo $user[$i]['Document_Name'] ?>">
    <?php if ($DuplicateNameError != "") { ?><p class="error-message"><br><?php echo $DuplicateNameError ?></p><?php } ?>
  </div>  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Document Type</label>
    <select class="form-control" name="DocumentType"    >
        <option selected="selected"><?php echo $user[$i]['Document_Type'] ?></option>
        <option value="<?php echo LOANS_DEP ?>">Loans</option>
      <option value="<?php echo MORTGAGES_DEP ?>">Mortgages</option>
      <option value="<?php echo ADMIN_DEP ?>">Administration</option>
      <option value="<?php echo ACCOUNTS_DEP ?>">Accounts</option>
    </select>
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1">Document Criticality</label>
    <select class="form-control" name="DocumentCriticality">
    <option selected="selected"><?php echo $user[$i]['Document_Criticality'] ?></option>
      <option value="<?php echo CRIT_HIGH ?>">High</option>
      <option value="<?php echo CRIT_MEDIUM ?>">Medium</option>
      <option value="<?php echo CRIT_LOW ?>">Low</option>
    </select>
  </div>  
  <div id="UpdateButton" class="d-grid col-sm-5 mx-auto">
  <input name="submit" type="submit" value="Update" style="margin-top: 5%; margin-bottom: 5%;" class="btn btn-lg btn-block"></input>
</div>
</form>
<div id="backButton" class="d-grid col-sm-3 mx-auto">
                                        <button onclick="document.location='ViewDocuments.php'" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block">Back</button>

                                    </div>


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

    <?php include "footer.php" ?>


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
    <?php
    function updateDocument($name, $type, $criticality, $Document_ID)
    {

        // Create a new PDO connection object
        include("../../DB config.php");

        $sql = "UPDATE Documents SET Document_Name=?, Document_Type=?, Document_Criticality=? WHERE Document_ID=?";

        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $type, $criticality, $Document_ID]);

        if (!$result) {
            $error = $stmt->errorInfo();
            $errorMessage = "SQL error: " . $error[2];
        }
        return $result;

    }

    function checkDuplicate($docName)
    {

        // Create a new PDO connection object
        include("../../DB config.php");

        $sql = "SELECT Document_Name FROM dbo.Documents WHERE Document_Name = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $docName, PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            $row = $stmt->fetch();
            if ($row) {
                $row['Document_Name'];
                return true;
            } else {
                return false;
            }
        }
    }

    ?>

</body>

</html>