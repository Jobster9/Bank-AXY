<?php

function Update ($name, $type, $criticality){

    // Specify your database credentials here
    include("../../DB config.php");

    $stmt = $pdo->prepare('UPDATE Documents SET '); //need finished

    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}


?>
