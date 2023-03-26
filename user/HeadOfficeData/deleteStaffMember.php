<?php
// rest of your code here
function deleteStaffMember($User_ID)
{
// Create a new PDO connection object
	include("../../DB config.php");
	$stmt = $pdo->prepare("DELETE FROM dbo.Bank_Employees WHERE User_ID = ?");
	$stmt->bindParam(1, $User_ID, PDO::PARAM_STR);
    $stmt->execute();

    $stmt = $pdo->prepare("DELETE FROM dbo.Documents WHERE Owner_ID = ?");
    $stmt->bindParam(1, $User_ID, PDO::PARAM_STR);

	$result = $stmt->execute();
	return $result;    

}







?>