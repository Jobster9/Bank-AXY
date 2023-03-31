<?php  
include "GetDocuments.php";
$user = getDocuments ();
$i = $_GET['File_Location'];
session_start();
$User_ID = $_SESSION['User_ID'];

function AudiTrail($User_ID, $Document_Name){
    include("../../DB config.php");
    date_default_timezone_set('Europe/London');

    $stmt = $pdo->prepare('INSERT INTO Audit_Trail (User_ID, Document_Name, Audit_Date_Time, Audit_Action) VALUES (:User_ID, :Document_Name, :Audit_Date_Time, :Audit_Action)');
    
    $Action = "ACCESSED";
    $dateString = date('d/m/Y H:i');
    $date = DateTime::createFromFormat('d/m/Y H:i', $dateString);
    $formattedDate = $date->format('M j Y g:iA');

    $stmt->bindParam(':User_ID' ,$User_ID, PDO::PARAM_STR);
    $stmt->bindParam(':Document_Name' , $Document_Name, PDO::PARAM_STR);
    $stmt->bindParam(':Audit_Date_Time', $formattedDate, PDO::PARAM_STR);
    $stmt->bindParam(':Audit_Action', $Action, PDO::PARAM_STR);
    $stmt->execute();
} 
$Document_Name = $user[$i]['Document_Name'];
AudiTrail($User_ID, $Document_Name);
$filename =  $user[$i]['File_Location'];
header('content-Type: application/pdf');
echo $filename;
?>


