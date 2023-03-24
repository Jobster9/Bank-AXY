<?php
function getAuditTrails() {
  $user_ID = $_SESSION['User_ID'];

  // Create a new PDO connection object
  include("../../DB config.php");

  // Find the branch the user belongs to
  $branchStmt = $pdo->prepare("SELECT Branch FROM Bank_Employees WHERE User_ID = :user_ID");
  $branchStmt->bindParam(":user_ID", $user_ID);
  $branchStmt->execute();

  $row = $branchStmt->fetch(PDO::FETCH_ASSOC);
  $branch = $row['Branch'];

  // Find the User_IDs of all employees who work in the same branch
  $userIDsStmt = $pdo->prepare("SELECT User_ID FROM Bank_Employees WHERE Branch = :branch");
  $userIDsStmt->bindParam(":branch", $branch);
  $userIDsStmt->execute();

  $userIDs = [];
  while ($row = $userIDsStmt->fetch(PDO::FETCH_ASSOC)) {
    $userIDs[] = $row['User_ID'];
  }

  // Find the audit trails for the User_IDs in the same branch
  $userIDsString = implode(",", array_map(function($id) use ($pdo) { return $pdo->quote($id); }, $userIDs));
  $auditTrailStmt = $pdo->prepare("SELECT * FROM Audit_Trail WHERE User_ID IN ($userIDsString)");
  $auditTrailStmt->execute();

  $rows_array = [];
  while ($row = $auditTrailStmt->fetch(PDO::FETCH_ASSOC)) {
    $rows_array[] = $row;
  }

  return $rows_array;
}


function getBranch() {
  $user_ID = $_SESSION['User_ID'];

  // Create a new PDO connection object
  include("../../DB config.php");

  // Find the branch the user belongs to
  $branchStmt = $pdo->prepare("SELECT Branch FROM Bank_Employees WHERE User_ID = :user_ID");
  $branchStmt->bindParam(":user_ID", $user_ID);
  $branchStmt->execute();

  $row = $branchStmt->fetch(PDO::FETCH_ASSOC);
  $branch = $row['Branch'];

  // Echo the branch

  return $branch;

}




?>

