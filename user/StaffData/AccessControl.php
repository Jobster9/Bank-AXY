<?php

function GetAccessControl ($user_id, $document_id){

    // Create a new PDO connection object
    include("../../DB config.php");

    $stmt = $pdo->prepare('SELECT * FROM Access_Control WHERE User_ID = :user_id AND Document_ID = :document_id');

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->bindParam(':document_id', $document_id, PDO::PARAM_STR);



    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}

function GetRequestAccessControl ($user_id, $document_id){

    // Create a new PDO connection object
    include("../../DB config.php");

    $stmt = $pdo->prepare('SELECT * FROM Access_Control_Request WHERE User_ID = :user_id AND Document_ID = :document_id');

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->bindParam(':document_id', $document_id, PDO::PARAM_STR);



    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}


?>
