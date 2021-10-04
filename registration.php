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

  if(isset($_POST['submit']))

    {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $email =  mysqli_real_escape_string ($conn,$_POST['email']);
      $mobile = mysqli_real_escape_string ( $conn,$_POST['mobile']);
      $password = mysqli_real_escape_string ($conn,$_POST['password']);
      $cpassword =  mysqli_real_escape_string($conn,$_POST['cpassword']);
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
                            <form action = "" method = "POST"class = "new" style = "text-align: center;margin: auto;">
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
                                  <input type="mobile" class="form-control"   name = "mobile"  placeholder="Phone number" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-3" style = "margin:auto">
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