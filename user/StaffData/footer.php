<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php

include("GetStaffNotifications.php");
$Notifications = GetNotifications();
if (!empty($Notifications)) {
    $notif = SendNotifications($Notifications);
    print_r($notif);
}
?>