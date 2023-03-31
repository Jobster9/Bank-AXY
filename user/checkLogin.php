<?php

function verifyUsers()
{
    include("../DB config.php");
    session_start();
    if (!isset($_POST['User_ID']) or !isset($_POST['Password'])) {
        return; // <-- return null;  
    }


    $stmt = $pdo->prepare('SELECT User_ID, Password, User_Role, Email, Department FROM Bank_Employees WHERE User_ID=:User_ID');
    $stmt->bindParam(':User_ID', $_POST['User_ID'], PDO::PARAM_STR);


    $_SESSION['User_ID'] = $_POST['User_ID'];
    $result = $stmt->execute();

    $rows_array = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows_array[] = $row;
    }

    return $rows_array;
}

?>


