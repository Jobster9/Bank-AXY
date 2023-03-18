<?php

function getChartDocs()
{

    // Specify your database credentials here
    include("../../DB config.php");

    $stmt = $pdo->prepare('SELECT * FROM Documents WHERE Owner_ID = :User_ID');
    $stmt->bindParam(':User_ID', $_SESSION['User_ID'], PDO::PARAM_STR);
    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}