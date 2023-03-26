<?php
function restore($Document_ID)
{
    include("../../DB config.php");
    $stmt1 = $pdo->prepare("INSERT INTO dbo.Documents SELECT * FROM dbo.Document_Archive WHERE Document_ID = :Document_ID");
    $stmt1->bindParam(':Document_ID', $Document_ID);
    $stmt1->execute();

    $stmt2 = $pdo->prepare("DELETE FROM dbo.Document_Archive WHERE Document_ID = :Document_ID");
    $stmt2->bindParam(':Document_ID', $Document_ID);
    $stmt2->execute();

    return true;
}
?>