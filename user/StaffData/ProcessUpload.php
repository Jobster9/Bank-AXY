<?php
include("header.php");

$fileTempName = $_FILES['uploaded-file']['tmp_name'];

$UploadMessage = "";
$FileError = "";
$TypeError = "";
$SizeError = "";
if (isset($_POST['submit'])) {
    $result = UploadDocument($FileError, $TypeError, $SizeError);
    if ($result) {
        $UploadMessage = "File uploaded successfully!";
    } else {
        $UploadMessage = "File not uploaded";
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

    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/animations.css">
    <link rel="stylesheet" href="../../assets/vendor/boxicons/css/transformations.css">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../assets/css/UserDash.css">

    <style>
        .btn-pay {
            background-image: linear-gradient(to right, #010066 0%, #CC0001 100%);
            color: #fdfdfd;
            font-weight: bold;
            box-shadow: 0 0 0.875rem 0 rgb(33 37 41 / 5%);
            border-radius: 30px;
        }

        .btn-pay:hover {
            background-image: linear-gradient(to right, #0b2b58 0%, #cc0000 100%);

        }

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
  font-size: 18px;
  font-weight: 400;
  color: #2e2e2e;
}

.drop_box p {
  margin-top: 10px;
  margin-bottom: 20px;
  font-size: 15px;
  color: #a3a3a3;
}

.btn {
  text-decoration: none;
  background-color: #cc0000;
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


    </style>

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
    <header> 
    <div style="text-align-center"> 
        <h2><?php echo $UploadMessage ?></h2>
        <h2 style=""><?php echo $FileError ?></h2>
        <h2 style=""><?php echo $TypeError ?></h2>
        <h2 style=""><?php echo $SizeError ?></h2>
      </header>   
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
function UploadDocument($FileError, $TypeError, $SizeError)
{
    include("../../DB config.php");
    // Get the form data
    $docName = $_POST['doc-name'];
    $docCategory = $_POST['doc-category'];
    $docCriticality = $_POST['doc-criticality'];

    //Get the user data 
    $OwnerID = $_SESSION['User_ID'];

    // Get the uploaded file
    $file = $_FILES['uploaded-file'];
    $filetype = $_FILES['uploaded-file']['type'];
    $filesize = $_FILES['uploaded-file']['size'];
    $fileTempName = $_FILES['uploaded-file']['tmp_name'];


    if ($filetype !== 'application/pdf') {
        $TypeError = "This filetype is not supported";
    }

    if ($filesize >= 1000000) {
        $SizeError = "The filesize is too big";
        //this is greater than 1mb which for average PDF file is +100 pages
    }

    if ($_FILES['uploaded-file']['error'] !== UPLOAD_ERR_OK) {
        $FileError = "File upload error";
    }
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
        return false;
    }
}