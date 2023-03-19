<?php
include("header.php");
print_r($_FILES);
$fileTempName = $_FILES['uploaded-file']['tmp_name'];
print_r($fileTempName);

if (isset($_POST['submit'])) {
    $result = UploadDocument();
    if ($result) {
        echo "File uploaded successfully!";
    } else {
        echo "File not uploaded";
    }
}

function UploadDocument()
{
    include("../../DB config.php");
    // Get the form data
    $docName = $_POST['doc-name'];
    $docCategory = $_POST['doc-category'];
    $docCriticality = $_POST['doc-criticality'];
    print_r($docCategory);
    print_r($docCriticality);
    //Get the user data 
    $OwnerID = $_SESSION['User_ID'];

    // Get the uploaded file
    $file = $_FILES['uploaded-file'];
    $filetype = $_FILES['uploaded-file']['type'];
    $filesize = $_FILES['uploaded-file']['size'];
    $fileTempName = $_FILES['uploaded-file']['tmp_name'];


    if ($filetype !== 'application/pdf') {
        echo ("This filetype is not supported");
    }

    if ($filesize >= 1000000) {
        echo ("The filesize is too big");
        //this is greater than 1mb which for average PDF file is +100 pages
    }

    if ($_FILES['uploaded-file']['error'] !== UPLOAD_ERR_OK) {
        echo ("File upload error");
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
        echo "File uploaded successfully!";
        return true;
    } else {
        echo "File upload failed!";
        return false;
    }
}