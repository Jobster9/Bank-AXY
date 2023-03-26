<?php
function GetNotifications(){
    $user_ID = $_SESSION['User_ID'];

    // Create a new PDO connection object
    include("../../DB config.php");
  
    // Find the branch the user belongs to
    $branchStmt = $pdo->prepare("SELECT Branch FROM Bank_Employees WHERE User_ID = :user_ID AND User_Role = 'Staff'");
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
  
    // Find the Audit_IDs for the User_IDs in the same branch
    $userIDsString = implode(",", array_map(function($id) use ($pdo) { return $pdo->quote($id); }, $userIDs));
    $auditIDString = $pdo->prepare("SELECT Audit_ID FROM Audit_Trail WHERE User_ID IN ($userIDsString)");
    $auditIDString->execute();
  
    $auditIDs = [];
    while ($row = $auditIDString->fetch(PDO::FETCH_ASSOC)) {
      $auditIDs[] = $row['Audit_ID'];
    }

    // Find the notifications for the correlated audit trails
    $auditIDString = implode(",", array_map(function($aid) use ($pdo) { return $pdo->quote($aid); }, $auditIDs));
    $notificationStmt = $pdo->prepare("SELECT Notification_Message FROM Notifications WHERE Audit_ID IN ($auditIDString)");
    $notificationStmt->execute();
  
    $rows_array = [];
    while ($row = $notificationStmt->fetch(PDO::FETCH_ASSOC)) {
      $rows_array[] = $row;
    }
  
    return $rows_array;




}

?>