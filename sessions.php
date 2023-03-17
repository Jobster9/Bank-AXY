<?php

function checkSession ($path) {


    $expireAfter = 30; //value is in minutes

    if(isset($_SESSION['last_action'])){
        

        $secondsInactive = time() - $_SESSION['last_action'];
        
        $expireAfterSeconds = $expireAfter * 60;
        
        if($secondsInactive >= $expireAfterSeconds){
            session_unset();
            session_destroy();
            header("Location:".$path);//return to the login page
        }
    }
    $_SESSION['last_action'] = time(); //this variable is set for the very first time upon login
    $url=$_SERVER['REQUEST_URI'];//to obtain the current page
    $timeOut = ($expireAfter*10)+1; //1 second after the max session allowed. 
    header("Refresh: $timeOut; URL=$url"); //refresh the screen
}
?>