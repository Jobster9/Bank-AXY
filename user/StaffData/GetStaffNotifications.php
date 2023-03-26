<?php

//$NotificationsArray = GetNotifications();
//SendNotifications($NotificationsArray);
function GetNotifications()
{
  $user_ID = $_SESSION['User_ID'];
  // testing user - $user_ID = "GC001_118";

  // Create a new PDO connection object
  include("../../DB config.php");

  // Find the Audit_IDs for the User_ID
  $auditIDString = $pdo->prepare("SELECT Audit_ID FROM Audit_Trail WHERE User_ID = :user_ID");
  $auditIDString->bindParam(":user_ID", $user_ID);
  $auditIDString->execute();

  $auditIDs = [];
  while ($row = $auditIDString->fetch(PDO::FETCH_ASSOC)) {
    $auditIDs[] = $row['Audit_ID'];
  }

  // Find the notifications for the correlated audit trails
  if (!empty($auditIDs)) {
    $auditIDString = implode(",", $auditIDs);
    $notificationStmt = $pdo->prepare("SELECT Notification_Message FROM Notifications WHERE Audit_ID IN ($auditIDString)");
    $notificationStmt->execute();

    $rows_array = [];
    while ($row = $notificationStmt->fetch(PDO::FETCH_ASSOC)) {
      $rows_array[] = $row;
    }

    return $rows_array;

  }
}

function SendNotifications($NotificationsArray)
{
  $user_ID = $_SESSION['User_ID'];
  // testing user - $user_ID = "GC001_118";

  // Create a new PDO connection object
  include("../../DB config.php");

  //Count No of rows
  $userStmt = $pdo->prepare("SELECT COUNT(*) FROM Bank_Employees WHERE User_ID = :user_ID");
  $userStmt->bindParam(":user_ID", $user_ID);
  $userStmt->execute();

  $rowCount = $userStmt->fetchColumn();

  if ($rowCount == 1) {
    // Prepare a new query to retrieve the email and branch for the user ID
    $userEmailStmt = $pdo->prepare("SELECT Email, Branch FROM Bank_Employees WHERE User_ID = :user_ID");
    $userEmailStmt->bindParam(":user_ID", $user_ID);
    $userEmailStmt->execute();

    // Fetch the result set and assign the values to separate variables
    $result = $userEmailStmt->fetch(PDO::FETCH_ASSOC);
    $staffEmail = $result['Email'];
    $branch = $result['Branch'];
  } else {
    echo "Too many records found";
  }


  //Count No of admin rows
  $adminStmt = $pdo->prepare("SELECT COUNT(*) FROM Bank_Employees WHERE Branch = :branch AND User_Role = 'Admin'");
  $adminStmt->bindParam(":branch", $branch);
  $adminStmt->execute();

  $rowCount = $adminStmt->fetchColumn();

  if ($rowCount > 0) {
    // Initialize an empty array to store the email addresses
    $adminEmails = array();

    // Prepare a new query to retrieve the email addresses
    $adminEmailStmt = $pdo->prepare("SELECT Email FROM Bank_Employees WHERE Branch = :branch AND User_Role = 'Admin'");
    $adminEmailStmt->bindParam(":branch", $branch);
    $adminEmailStmt->execute();

    // Loop through the result set and add each email to the array
    while ($result = $adminEmailStmt->fetch(PDO::FETCH_ASSOC)) {
      $adminEmails[] = $result['Email'];
    }

    // If there is only one email address, assign it to a separate variable
    if (count($adminEmails) == 1) {
      $adminEmail = $adminEmails[0];
    }
  }

  //send the notification message to relevant email addresses

  $staffEmail;
  $adminEmail; //OR $adminEmails[]

  //notification to be sent
  $latest_notification = end($NotificationsArray);

}





//Implementing dynamic notification popups -----
function CheckReadStatus($NotificationsArray)
{

}

function AssignNotifications($NotificationsArray)
{

  array_map(function ($element) {
    return array($element, $element == 'read');
  }, $NotificationsArray);

}
?>