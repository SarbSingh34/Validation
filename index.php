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
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email =  mysqli_real_escape_string ($conn,$_POST['email']);
            $mobile = mysqli_real_escape_string ( $conn,$_POST['mobile']);
            $password = mysqli_real_escape_string ($conn,$_POST['password']);
            $cpassword =  mysqli_real_escape_string($conn,$_POST['cpassword']);

  // password is encyrpted here 
            $pass = password_hash($password,PASSWORD_BCRYPT);
            $cpass = password_hash($password,PASSWORD_BCRYPT);

            // here token is created for every diff. email id verification
            // bin2hex convert digit from binary to hex 
            // random bytes are  used to generate random string length of 15(mentioned)
            $token = bin2hex(random_bytes(15));

 // this query is used to first select if same mail id 
 //  in second line check this in database  
            $emailquery = " select  * from registrationcc  where email = '$email' ";
            $query = mysqli_query($conn,$emailquery);

// check if this line or mail exists more than 0 zero 
            $emailcount = mysqli_num_rows($query);

            if($emailcount>0)
            {
               echo " email already exists ";
            }
            else
            {
                if($password === $cpassword)
                {

                   $insertquery = "insert into registrationcc (username,email,mobile,password,cpassword,token,status) values('$username','$email','$mobile','$pass','$cpass','$token','inactive')";
                   
                   $iquery = mysqli_query($conn,$insertquery);

                    if($iquery)
                        {
                         
                          $subject = "Email Activation";
                          $body = "Hi Mr. $username  Click here  too activate your Account 
                           http://localhost:8000/activate.php?token=$token "; /* token is used and got from $token  */
                           $sender_email = "From: sarbbsandhu555@gmail.com";  /* from which data is sent  */
            
                          //  In this  mail function is used to send mail and passed four parameters
                          //  $email get  data from front end and sent to that  
                           if(mail($email,$subject,$body,$sender_email))
                             {
                                $_SESSION['msg'] = "  Check your mail to activate your account $email ";
                                header('location:login.php');

                              }else
                             {
                               echo " Email Sending Failed......... ";
                             }

                           ?>
                            <script>
                                alert(" Insertion   Done in database ");
                            </script>
                          <?php
                        }else
                        {
                          ?>
                            <script>
                                alert(" Insertion  error ");
                            </script>
                          <?php
                        }


                }
                else
                {

                    echo "password don't match";

                } 
            }
        }
 ?>
                  <h1 style  = "text-align: center;"> Create Account </h1>
                  <h6  style  = "text-align: center;"> Get Started with your free Account </h6>
            <div class = "first-middle" style = "text-align: center;">
                               <button type="button" class="btn btn-danger btn-md"> Login via Gmail </button> 
                            <br>
                            <br>
                               <button type="button" class="btn btn-primary btn-md"> Login via facebook </button>

                            <br>
                            <br>

                            <span> -----------  OR ---------  </span>
                            <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST" class = "new" style = "text-align: center;margin: auto;">
                               <div class="form-group row">
                                  <div class="col-3" style = "margin:auto">
                                   <input type="username" class="form-control" name = "username" placeholder="Fullname" required>
                                  </div>
                              </div>
                               <div class="form-group row">
                                 <div class="col-3" style = "margin:auto">
                                   <input type="email" class="form-control"  name = "email"  placeholder="Email address"  required>
                                 </div>
                               </div>
                               <div class="form-group row">
                                <div class="col-3" style = "margin:auto">
                                  <input type="mobile" class = "form-control"   name = "mobile"  placeholder="Phone number" required>
                                </div>
                              </div>
                              <div class = "form-group row">
                                <div class = "col-3" style = "margin:auto">
                                  <input type="password" class="form-control"  name = "password"  placeholder="Create Password " required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-3" style = "margin:auto">
                                  <input type="password" class="form-control"   name = "cpassword"  placeholder="Repeat Password"  required>
                                </div>
                              </div>
                        
                        <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" name = "submit" class="btn btn-primary"> Create Account  </button>
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