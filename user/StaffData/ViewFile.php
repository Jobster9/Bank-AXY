<?php  
include "GetDocuments.php";
$user = getUsers ();

$i = $_GET['File_Location'];

?>




<?php 

$filename =  $user[$i]['File_Location'];

header('content-Type: application/pdf');

echo $filename

?>


