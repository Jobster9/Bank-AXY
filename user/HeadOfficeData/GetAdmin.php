<?php

function getUsers (){

    // Create a new PDO connection object
    include("../../DB config.php");

    $stmt = $pdo->prepare("SELECT * FROM Bank_Employees WHERE User_Role = 'Admin'");

    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}


?>
