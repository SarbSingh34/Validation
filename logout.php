<?php

session_start();
header('location:login.php');

                               
    if(isset($_SESSION['msg']))
    {
    echo $_SESSION['msg'];
    }
    else
    {

    echo $_SESSION['msg'] = "You are Logged out . Please Login";

    }


?>