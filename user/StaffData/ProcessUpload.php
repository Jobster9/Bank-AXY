<?php
include("header.php");

$fileTempName = $_FILES['uploaded-file']['tmp_name'];

$UploadMessage = "";
$FileError = "";
$TypeError = "";
$SizeError = "";
$SQLError = "";
$NameError = "";
$DuplicateNameError = "";
$UploadSuccess = true;

if (isset($_POST['submit'])) {

    // Get the uploaded file data
    $file = $_FILES['uploaded-file'];
    $filetype = $_FILES['uploaded-file']['type'];
    $filesize = $_FILES['uploaded-file']['size'];

    $DocName = $_POST['doc-name'];
    $Duplicate = checkDuplicate($DocName);
    $nameConvention = checkNameConvention($DocName);


    if ($filetype !== 'application/pdf') {
        $TypeError = "This filetype is not supported, ensure you are uploading a supported filetype.";
        $UploadSuccess = false;
    }
    if ($filesize >= 1000000) {
        $SizeError = "The filesize is too big, file cannot be greater than 1mb.";
        //this is greater than 1mb which for average PDF file is +100 pages
        $UploadSuccess = false;
    }
    if ($_FILES['uploaded-file']['error'] !== UPLOAD_ERR_OK) {
        $FileError = "File upload error.";
        $UploadSuccess = false;
    }
    if (!$nameConvention) {
        $UploadMessage = "File not uploaded";
        $NameError = "The Document name does not match the agreed convention. Please refer back to the guide.";
        $UploadSuccess = false;
    }
    if ($Duplicate) {
        $UploadMessage = "File not uploaded";
        $DuplicateNameError = "The Document name submitted is a duplicate name.";
        $UploadSuccess = false;
    }
    if ($UploadSuccess) {
        $result = UploadDocument($FileError, $TypeError, $SizeError, $DocName);
        if ($result) {
            $UploadMessage = "File uploaded successfully!";
        } else {
            $UploadMessage = "File not uploaded";
        }
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Transfer</title>

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



</head>

<body>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">Upload Status</h1>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title light mb-4 "></h5>



<div class="container">
  <div class="card">
    <div class="drop_box">
    <div> 
        <h2><?php echo $UploadMessage ?></h2>
        <?php if ($NameError != "") { ?><h4><br><?php echo $NameError ?></h4><?php } ?>
        <?php if ($DuplicateNameError != "") { ?><h4><br><?php echo $DuplicateNameError ?></h4><?php } ?>
        <?php if ($FileError != "") { ?><h4><br><?php echo $FileError ?></h4><?php } ?>
        <?php if ($TypeError != "") { ?><h4><br><?php echo $TypeError ?></h4><?php } ?>
        <?php if ($SizeError != "") { ?><h4><br><?php echo $SizeError ?></h4><?php } ?>
        <?php if ($SQLError != "") { ?><h4><br><?php echo $SQLError ?></h4><?php } ?>
</div>

<div id="backButton" class="d-grid col-sm-3 mx-auto">
    <button onclick="document.location='UploadDocuments.php'" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block" value="Go Back">Back</button>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../UserData/js/profileInfo.js"></script>


    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        }); 
</script>


</body>

</html>
<?php


function UploadDocument($FileError, $TypeError, $SizeError, $docName)
{
    include("../../DB config.php");
    // Get the rest of the form data
    $docCategory = $_POST['doc-category'];
    $docCriticality = $_POST['doc-criticality'];

    //Get the user data 
    $OwnerID = $_SESSION['User_ID'];

    $fileTempName = $_FILES['uploaded-file']['tmp_name'];

    // Read the file content
    $file_contents = file_get_contents($fileTempName);

    // Prepare the SQL statement
    $sql = "INSERT INTO dbo.Documents (Document_ID,Document_Name,Document_Type,Document_Criticality,Owner_ID,Creation_Date_Time,File_Location)
    VALUES (NEWID(), ?, ?, ?, ?, GETDATE(), ?)";
    // Bind the parameters to the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $docName, PDO::PARAM_STR);
    $stmt->bindParam(2, $docCategory, PDO::PARAM_STR);
    $stmt->bindParam(3, $docCriticality, PDO::PARAM_STR);
    $stmt->bindParam(4, $OwnerID, PDO::PARAM_STR);
    $stmt->bindParam(5, $file_contents, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    // Execute the statement
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        $error = $stmt->errorInfo();
        $SQLerror = "SQL error: " . $error[2];
        return false;
    }
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
function checkNameConvention($docName)
{
    $document_regex = "/^([A-Za-z])+-([A-Za-z])+-([0-9])+(['.pdf'])+$/";
    $nameCheck = preg_match($document_regex, $docName);

    return $nameCheck;
}