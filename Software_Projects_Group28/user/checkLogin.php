
<?php
function verifyUsers () {
    session_start();
    if (!isset($_POST['User_ID']) or !isset($_POST['Password'])) {
        return;  // <-- return null;  
    }
    
    // Specify your database credentials here
    $host = 'ABDULNAZIR';
    $dbname = 'BankAXY';

    
    // Create a new PDO connection object
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    
    $stmt = $pdo->prepare('SELECT * FROM Bank_Employees WHERE User_ID=:User_ID AND Password=:Password');
    $stmt->bindParam(':User_ID', $_POST['User_ID'], PDO::PARAM_STR);
    $stmt->bindParam(':Password', $_POST['Password'], PDO::PARAM_STR);
    
    $_SESSION['User_ID'] = $_POST['User_ID'];
    $result = $stmt->execute();
    $rows_array = [];
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}

?>
