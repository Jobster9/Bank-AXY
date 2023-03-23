<?php


function getLatestCreationDateTime() {
    include("../../DB config.php");
    $User_ID = $_SESSION['User_ID'];
    $current_month = date('m');
    $current_year = date('Y');
    $last_month = date('m', strtotime('-1 month')); // get the month one month ago
    $last_year = date('Y', strtotime('-1 month')); // get the year one month ago

    // check if user is a staff member and their branch
    $user_stmt = $pdo->prepare("SELECT Branch FROM Bank_Employees WHERE User_ID = '$User_ID' AND User_Role = 'Staff'");
    $user_stmt->execute();

    // if the user is a staff member and belongs to a branch, check if Last_Active was more than a month ago
    if ($user_stmt->rowCount() > 0) {
        $branch_row = $user_stmt->fetch(PDO::FETCH_ASSOC);
        $branch = $branch_row['Branch'];

        $last_active_stmt = $pdo->prepare("SELECT User_ID FROM Bank_Employees WHERE User_ID = '$User_ID' AND Branch = '$branch' AND MONTH(Last_Active) = '$last_month' AND YEAR(Last_Active) = '$last_year'");
        $last_active_stmt->execute();

        // if the user was last active more than a month ago, return the User_ID
        if ($last_active_stmt->rowCount() > 0) {
            return $User_ID;
        }
    }

    // if the user was active within the last month, retrieve the number of documents
    $doc_stmt = $pdo->prepare("SELECT COUNT(*) AS num_docs FROM Documents WHERE Owner_ID = '$User_ID' AND MONTH(Creation_Date_Time) = '$current_month' AND YEAR(Creation_Date_Time) = '$current_year'");
    $doc_stmt->execute();

    $doc_row = $doc_stmt->fetch(PDO::FETCH_ASSOC);
    $num_docs = $doc_row['num_docs'];

    return $num_docs;
}



function monthlydocuments() {
include("../../DB config.php");

$userID = $_SESSION['User_ID'];

// Find the branch the user belongs to
$branchStmt = $pdo->prepare("SELECT Branch FROM Bank_Employees WHERE User_ID = :userID");
$branchStmt->bindParam(":userID", $userID);
$branchStmt->execute();

$row = $branchStmt->fetch(PDO::FETCH_ASSOC);
$branch = $row['Branch'];

// Find the number of staff members in the same branch
$staffCountStmt = $pdo->prepare("SELECT COUNT(*) AS staff_count FROM Bank_Employees WHERE Branch = :branch AND User_Role = 'Staff'");
$staffCountStmt->bindParam(":branch", $branch);
$staffCountStmt->execute();

$row = $staffCountStmt->fetch(PDO::FETCH_ASSOC);
$staffCount = $row['staff_count'];

return $staffCount;

}



function lowdocuments() {
  include("../../DB config.php");

  $userID = $_SESSION['User_ID'];

  // Find the branch the user belongs to
  $branchStmt = $pdo->prepare("SELECT Branch FROM Bank_Employees WHERE User_ID = :userID");
  $branchStmt->bindParam(":userID", $userID);
  $branchStmt->execute();

  $row = $branchStmt->fetch(PDO::FETCH_ASSOC);
  $branch = $row['Branch'];

  // Find the number of staff members in the same branch
  $staffStmt = $pdo->prepare("SELECT * FROM Bank_Employees WHERE Branch = :branch AND User_Role = 'Staff'");
  $staffStmt->bindParam(":branch", $branch);
  $staffStmt->execute();

  $countAccounts = 0;
  $countLoans = 0;
  $countMortgageAdvice = 0;

  // Loop through the staff members and count the ones with "Accounts", "Loans", or "Mortgage Advice" in their Department column
  while ($row = $staffStmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Department'] == 'Accounts') {
      $countAccounts++;
    }
    if ($row['Department'] == 'Loans') {
      $countLoans++;
    }
    if ($row['Department'] == 'Mortgage Advice') {
      $countMortgageAdvice++;
    }
  }

  return array($countAccounts, $countLoans, $countMortgageAdvice);
}
