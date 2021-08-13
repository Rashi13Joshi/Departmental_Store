

<html>
<head>
 <title>Login</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <style>

   
.error{
  color:red;
  font-size:1vw;
}

 .btn-gmail{
   background-color: red;
   border-radius: 5px;
   color:#fff;
 }

 .btn-facebook{
   background-color: blue;
   border-radius: 5px;
   color:#fff;
 }

 .fa-google{
   padding-right: 10px;
 }

 .fa-facebook{
   padding-right: 10px;
 }

 .divider-text{
   position: relative;
   text-align: center;
   margin-top: 15px;
   margin-bottom: 15px;
 }

 .divider-text span{
   padding: 7px;
   font-size: 12px;
   position: relative;
   z-index:2;
 }

 .divider-text : after{
   content:"";
   position: absolute;
   width: 100%;
   border-bottom: 1px solid #ddd;
   top:55%;
   left:0;
   z-index: 1;
 }

 .font_size{
   font-size: 10px;
 }
 </style>
</head>
<body>
  <?php

  include 'dbconfig.php';
  include 'login_config.php';

  if(isset($_POST['submit'])){
    $email=trim($_REQUEST['email']);
    $password=trim($_REQUEST['password']);

    $email_search="SELECT * FROM register WHERE email='$email' AND status='active' ";
    $query=mysqli_query($con, $email_search);

    $email_count=mysqli_num_rows($query);

    if($email_count){
      $email_pass=mysqli_fetch_assoc($query);

        $dbpass=$email_pass['password'];


    //  $pass_decode=password_verify($password,$dbpass);

      if($password===$dbpass){
      $_SESSION['user_id']=$email_pass['user_id'];
    //  $_SESSION['user_type']=$email_pass['user_type'];

       header("location:Account.php?user_id=".urlencode($_SESSION['user_id']));
      }else{
        ?><script>alert("Password Incorrect");</script><?php
      }}
      else{
        ?><script>alert("Invalid Email");</script><?php
      }
  }
  ?>
  <div class="card bg-light">
  <article class="card-body mx-auto" style="max-width:400px;">
    <h4 class="card-title mt-3 text-center">Create Account</h4>
    <p class="text-center">Get started with your free account</p>
    <p>
      <!--<a href="" class="btn btn-block btn-gmail"><i class="fa fa fa-google"></i>
        Login via Gmail</a>
      <a href="" class="btn btn-block btn-facebook"><i class="fa fa fa-facebook-f"></i>
      Login via facebook</a>
    </p>
    <p class="divider-text">
      <span class="bg-light">OR</span>
    </p>-->

    <div>
      <p class="bg-success text-white px-4" style="border-radius:30px;"><?php
      if(isset($_SESSION['check_msg'])){
      echo $_SESSION['check_msg'];
      }else{
        echo $_SESSION['check_msg']="You are logged out. Please login again";
      }
       ?></p>
    </div>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-envelope"></i></span>
        </div>
        <input name="email" class="form-control" placeholder="Email ID" type="text" required>
        <span class="error"><?php echo $email_log_Err;?></span>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-lock"></i></span>
        </div>
        <input name="password" class="form-control" placeholder="Enter password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required>
         <p class="font_size">(At least 1 Uppercase, 1 Lowercase, 1 Number, 1 Symbol, symbol allowed --> !@#$%^&*_=+- and Min 8 chars and Max 12 chars)</p>
         <span class="error"><?php echo $pass_log_Err;?></span>
      </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <p class="text-center"><a href="Recover_Email.php">Forgot Password?</a></p>
        <p class="text-center">Don't have an account?<a href="Register.php">Sign up here</a></p>
      </form>
      </div>

</body>
</html>
