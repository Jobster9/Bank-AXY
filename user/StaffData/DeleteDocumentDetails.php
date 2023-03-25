<?php 
     // Create a new PDO connection object
    include("../../DB config.php");
    $Document_ID = $_GET['Document_ID'];
    $stmt = $pdo->prepare("SELECT * FROM Documents WHERE Document_ID = '$Document_ID'");

    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;




    
?>