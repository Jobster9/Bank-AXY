<?php

function getUsers (){

    // Specify your database credentials here
    $host = 'ABDULNAZIR';
    $dbname = 'BankAXY';


    // Create a new PDO connection object
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");

    $stmt = $pdo->prepare('SELECT * FROM Documents');

    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}


?>
