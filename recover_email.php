<?php

 session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
 <?php 

// database is added here
    include 'dbcon.php';

    // button is pressed or used as target
         if(isset($_POST['submit']))
        {
  
            $email =  mysqli_real_escape_string ($conn,$_POST['email']);
            
            $emailquery = " select  * from registrationcc  where email = '$email' ";
            $query = mysqli_query($conn,$emailquery);

// check if this line or mail exists more than 0 zero 
            $emailcount = mysqli_num_rows($query);

                    if($emailcount>0)
                        {

                           $userdata =  mysqli_fetch_array($query);

                           $username = $userdata['username'];
                           $token = $userdata['token'];


                          $subject = " Password Reset ";
                          $body = "Hi Mr. $username  Click here  to reset your Password  
                           http://localhost:8000/reset_password.php?token=$token "; /* token is used and got from $token  */
                           $sender_email = "From: sarbbsandhu555@gmail.com";  /* from which data is sent  */
            
                          //  In this  mail function is used to send mail and passed four parameters
                          //  $email get  data from front end and sent to that  
                           if(mail($email,$subject,$body,$sender_email))
                             {
                                $_SESSION['msg'] = "  Check your mail to reset your password  $email ";
                                header('location:login.php');

                              }else
                             {
                               echo " Email Sending Failed......... ";
                             }
                        }
                        else
                        {

                             echo " Unable to Find Email ";

                        }
                }
                
            
        
 ?>
                  <h1 style  = "text-align: center;"> Recover Your Account </h1>
                  <h6  style  = "text-align: center;"> Please Fill Your EMAIL-iD </h6>
            <div class = "first-middle" style = "text-align: center;">
                          
                            <br>

                        
                            <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST" class = "new" style = "text-align: center;margin: auto;">
                               
                               <div class="form-group row">
                                 <div class="col-3" style = "margin:auto">
                                   <input type="email" class="form-control"  name = "email"  placeholder="Email address"  required>
                                 </div>
                               </div>
                               
                        <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" name = "submit" class="btn btn-primary"> Sent Mail  </button>
                            <br>
                            <br>
                            <a href = "/" style = "color:black">  Have an account?  </a>    <a href = "/"> Login  </a> 
                        </div>
                        </div>
                    </form>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>