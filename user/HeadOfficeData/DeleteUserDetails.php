<?php
// Create a new PDO connection object
include("../../DB config.php");
$User_ID = $_GET['User_ID'];
$stmt = $pdo->prepare("SELECT * FROM Bank_Employees WHERE User_ID = '$User_ID'");

$result = $stmt->execute();

$rows_array = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rows_array[] = $row;
}

return $rows_array;

function deleteStaffMember($User_ID)
{
    // Create a new PDO connection object
    include("../../DB config.php");
    $stmt = $pdo->prepare("DELETE FROM dbo.Bank_Employees WHERE User_ID = ?");
    $stmt->bindParam(1, $User_ID, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
}
?>
