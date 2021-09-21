<?php

session_start();

include 'dbcon.php';


// With $Get is used to get the  value of token &  With isset it is checked  
if(isset($_GET['token']))
{

  $token = $_GET['token']; /* value is get and putted in variable */
  $updatequery = "update  registrationcc set status = 'active' where token = '$token'"; /* Update with  Query  in database  */
  $query = mysqli_query($conn,$updatequery); /* Query is fired */

    if($query)
    {
       if(isset($_SESSION['msg']))
       {
        $_SESSION['msg'] = "Account Updated Successfully ";
        header('location:login.php');

       }else
       {
         
        $_SESSION['msg'] = " You are Logged Out   ";
        header('location:login.php');

       }
    }
    else
    {
        $_SESSION['msg'] = " Account not  Updated ";
        header('location:index.php');
        
    }


}else
{



}


?>