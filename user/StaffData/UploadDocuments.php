    <?php include "header.php" ?>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Upload Documents</title>

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
    <div class="container-fluid px-lg-4 dark_bg light">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="d-sm-flex align-items-center mb-4" style="justify-content:center;">
                    <h1 class="h3 mb-0 light" style="text-align: center;">Upload Document</h1>
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
            <h4>Select File here</h4>
      <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
  <div style="margin-left: 15%; margin-right: 15%; margin-top: 10%;">
      <form method="post" enctype="multipart/form-data" action="ProcessUpload.php">
  <div class="form-group mb-1 mt-5">
<input type="file" class="form-control-file" accept=".doc,.docx,.pdf" id="file-upload" name="uploaded-file" onchange="showInputs()" required>
  </div>
  <div class="form-group mb-1 mt-5" id="doc-name-group" style="display:none">
  <p>Please ensure the filename follows the standardized convention: 
    <br>"CustomerName-Category-DocumentNumber.pdf".
    <br> If you are unsure about the convention, please refer to the <a>guide</a>.
                                    <a href="guide.pdf#toolbar=0" target="_blank" rel="noopener noreferrer">Document Naming Convention</a>
  </p>
    <label for="doc-name">Document Name:</label>
    <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
        <input type="text" class="form-control" id="doc-name" name="doc-name" placeholder="Document Name" required>
  </div>
  </div>
  <div class="form-group" id="doc-category-group" style="display:none">
    <label for="doc-category">Document Category:</label>
    <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
    <select class="form-control" id="doc-category" name="doc-category">
      <option value="<?php echo LOANS_DEP ?>">Loans</option>
      <option value="<?php echo MORTGAGES_DEP ?>">Mortgages</option>
      <option value="<?php echo ADMIN_DEP ?>">Administration</option>
      <option value="<?php echo ACCOUNTS_DEP ?>">Accounts</option>
    </select>
</div>
</div>
<div class="form-group" id="doc-criticality-group" style="display:none">
    <label for="doc-category">Document Criticality:</label>
    <div class="input-group-prepend">
        <span class="input-group-text gray_bg light" id="inputGroup-sizing-default"><i class='bx bx-right-arrow-alt' style='color:#FFCC00'></i></span>
    <select class="form-control" id="doc-criticality" name="doc-criticality">
      <option value="<?php echo CRIT_HIGH ?>">High</option>
      <option value="<?php echo CRIT_MEDIUM ?>">Medium</option>
      <option value="<?php echo CRIT_LOW ?>">Low</option>
    </select>
</div>
<div id="backButton" class="d-grid col-sm-4 mx-auto">
    <button  name="submit" type="submit" style="margin-top: 20%; margin-bottom: 25%;" class="btn btn-lg btn-block">Upload File</button>
        </div>
  </div>
</form>
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

    <?php include "footer.php" ?>

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

function showInputs() {
  var fileUpload = document.getElementById("file-upload");
  var docNameGroup = document.getElementById("doc-name-group");
  var docCategoryGroup = document.getElementById("doc-category-group");
  var docCriticalityGroup = document.getElementById("doc-criticality-group");
  
  if (fileUpload.value) {
    docNameGroup.style.display = "block";
    docCategoryGroup.style.display = "block";
    docCriticalityGroup.style.display = "block";

    var fileName = fileUpload.value.split("\\").pop();
    var docNameInput = document.getElementById("doc-name");
    docNameInput.value = fileName;
  }
}
</script>

</body>

</html>

