<?php

$Document_ID = $_GET['Document_ID'];
$Document_Name = $_GET['Document_Name'];
$Document_Name = substr($Document_Name, 0, -10);

include("../../DB config.php");



$stmt = $pdo->prepare("INSERT INTO Documents  SELECT Document_ID, ?, Document_Type, Document_Criticality, Owner_ID, Creation_Date_Time, File_Location FROM Document_Archive WHERE Document_ID=?");
$stmt->bindParam(':Document_ID', $Document_ID);
$stmt->execute([$Document_Name, $Document_ID]);


    $stmt = $pdo->prepare("DELETE FROM Document_Archive WHERE Document_ID=?");
    $stmt->execute([$Document_ID]);




?>
  <script type="text/javascript">
window.location.href = 'Archived_Documents.php';
</script>

