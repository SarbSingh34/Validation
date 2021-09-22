<?php

    session_start();
// Session is Destroyed 
    session_destroy();

    // Used for Timeout of cookie after specific Period  
    setcookie('emailcookie','',time()-86400);
    setcookie('passwordcookie','',time()-86400);

    header('location:login.php');
   
?>