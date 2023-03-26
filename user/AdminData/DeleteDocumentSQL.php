<?php 


function deny($Document_ID){


    include("../../DB config.php");
    $stmt = $pdo->prepare("DELETE FROM Documents_Deletion_Request WHERE Deletion_Request_ID=?");
    $result = $stmt->execute([$Document_ID]);


?>
<script type="text/javascript">
window.location.href = 'DeleteDocumentRequest.php';
</script>

<?php }

Function grant($Document_ID, $Document_Name){

    include("../../DB config.php");
    $stmt = $pdo->prepare("DELETE FROM Documents_Deletion_Request WHERE Deletion_Request_ID=?");
    $result = $stmt->execute([$Document_ID]);


    
    $stmt = $pdo->prepare("DELETE FROM Access_Control WHERE Document_Name = ?");
    $result = $stmt->execute([$Document_Name]);

    $stmt = $pdo->prepare("DELETE FROM Access_Control_Request WHERE Document_Name = ?");
    $result = $stmt->execute([$Document_Name]);


    $stmt = $pdo->prepare("DELETE FROM Documents WHERE Document_Name = ?");
    $result = $stmt->execute([$Document_Name]);
  


?>
  <script type="text/javascript">
window.location.href = 'DeleteDocumentRequest.php';
</script>


<?php
}
