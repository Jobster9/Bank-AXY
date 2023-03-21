<?php


function getLatestCreationDateTime() {
    include("../../DB config.php");
    $User_ID = $_GET['User_ID'];
    $stmt = $pdo->prepare("SELECT TOP 1 Creation_Date_Time FROM Documents WHERE Owner_ID = '$User_ID' ORDER BY CONVERT(DATETIME, Creation_Date_Time, 109) DESC");

    $result = $stmt->execute();

    $latest_creation_date_time = null;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $latest_creation_date_time = $row['Creation_Date_Time'];
    }

    return $latest_creation_date_time;
}










?>

