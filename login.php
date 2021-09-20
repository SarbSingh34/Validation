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

       include 'dbcon.php';

        if(isset($_POST['submit']))
        {

             $email = $_POST['email'];
             $password = $_POST['password'];
           

// This line is used for selecting mail 
// second line is used for refelcting query in database
            $email_check = " select * from registration where email = '$email' ";
            $query = mysqli_query($conn,$email_check);

// This is used for checking that mail is present in rows or  not ? 
            $email_count = mysqli_num_rows($query);

            // check if mail is present 
            if($email_count)
            {
// In present row in which mail is passed anad try to fetch some data 
              $email_pass = mysqli_fetch_assoc($query);
// In this checked mail's password is fetched only 
              $db_pass = $email_pass['password'];

//  In this password is decoded 
// $password - password enter at time
// $db_pass - password already stored at database 
              $pass_decode = password_verify($password,$db_pass);

            if($pass_decode)
               {
                  echo "Login Successful";
               }
               else
               {
                  echo " password Incorrect ";
               }
            }
            else
            {   
              echo " Invalid Email ";  
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
                                   <input type="email" class="form-control"  name = "email"  placeholder="Email address"  required>
                                 </div>
                               </div>
                             
                              <div class="form-group row">
                                <div class="col-3" style = "margin:auto">
                                  <input type="password" class="form-control"   name = "cpassword"  placeholder="Repeat Password"  required>
                                </div>
                              </div>
                        
                        <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" name = "submit" class="btn btn-primary"> Login Now  </button>
                            <br>
                            <br>
                            <a href = "/" style = "color:black"> Don't  Have an account?  </a>    <a href = "/"> Signup here   </a> 
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