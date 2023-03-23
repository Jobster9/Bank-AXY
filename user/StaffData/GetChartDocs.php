<?php


function getLatestCreationDateTime() {
    include("../../DB config.php");
    $User_ID = $_SESSION['User_ID'];
    $stmt = $pdo->prepare("SELECT TOP 1 Creation_Date_Time FROM Documents WHERE Owner_ID = '$User_ID' ORDER BY CONVERT(DATETIME, Creation_Date_Time, 109) DESC");

    $result = $stmt->execute();

    $latest_creation_date_time = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $latest_creation_date_time = $row['Creation_Date_Time'];
    }

    return $latest_creation_date_time;
}


function monthlydocuments() {
    include("../../DB config.php");
    $User_ID = $_SESSION['User_ID'];
    $current_month = date('m');
    $current_year = date('Y');
    $stmt = $pdo->prepare("SELECT COUNT(*) AS num_docs FROM Documents WHERE Owner_ID = '$User_ID' AND MONTH(Creation_Date_Time) = '$current_month' AND YEAR(Creation_Date_Time) = '$current_year'");

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num_docs = $row['num_docs'];

    return $num_docs;
}


function lowdocuments() {
    include("../../DB config.php");
    $User_ID = $_SESSION['User_ID'];
    $current_month = date('m');
    $current_year = date('Y');
    $stmt = $pdo->prepare("
        SELECT COUNT(*) AS num_docs 
        FROM Documents 
        WHERE Owner_ID = '$User_ID' 
        AND Document_Criticality = 'Low'
        AND MONTH(Creation_Date_Time) = '$current_month' 
        AND YEAR(Creation_Date_Time) = '$current_year' 
    ");

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num_docs = $row['num_docs'];

    return $num_docs;
}

function mediumdocuments() {
    include("../../DB config.php");
    $User_ID = $_SESSION['User_ID'];
    $current_month = date('m');
    $current_year = date('Y');
    $stmt = $pdo->prepare("
        SELECT COUNT(*) AS num_docs 
        FROM Documents 
        WHERE Owner_ID = '$User_ID' 
        AND Document_Criticality = 'Medium'
        AND MONTH(Creation_Date_Time) = '$current_month' 
        AND YEAR(Creation_Date_Time) = '$current_year' 
    ");

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num_docs = $row['num_docs'];

    return $num_docs;
}

function highdocuments() {
    include("../../DB config.php");
    $User_ID = $_SESSION['User_ID'];
    $current_month = date('m');
    $current_year = date('Y');
    $stmt = $pdo->prepare("
        SELECT COUNT(*) AS num_docs 
        FROM Documents 
        WHERE Owner_ID = '$User_ID' 
        AND Document_Criticality = 'High'
        AND MONTH(Creation_Date_Time) = '$current_month' 
        AND YEAR(Creation_Date_Time) = '$current_year' 
    ");

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num_docs = $row['num_docs'];

    return $num_docs;
}

?>

