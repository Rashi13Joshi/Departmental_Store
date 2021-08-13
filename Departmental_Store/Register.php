<?php
session_start();
?>

<html>
<head>
 <title>Register</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>

html{
    scroll-behaviour : smooth;
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

.error{
  color:red;
  font-size:1vw;
}
</style>
</head>
<body>
  <?php

  include 'dbconfig.php';
  include 'register_config.php';

  if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($con,$_REQUEST['username']);
    $email=mysqli_real_escape_string($con,$_REQUEST['email']);
    $password=mysqli_real_escape_string($con,$_REQUEST['password']);
    $cpassword=mysqli_real_escape_string($con,$_REQUEST['cpassword']);


    $pass=password_hash($password, PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

    $token= bin2hex(random_bytes(15));

    $emailquery="SELECT * FROM register where email='$email'";
    $query=mysqli_query($con,$emailquery);

    $emailcount=mysqli_num_rows($query);

    if($emailcount>0)
    {
      ?>
       <script>alert("email already exists");</script>
      <?php
    }
    else{
      if($password===$cpassword)
      {
        $insertquery="INSERT INTO register(username,email,password,cpassword,token,status) VALUES ('$username','$email','$password','$cpassword','$token','inactive')";
        $iquery=mysqli_query($con,$insertquery);

       if($iquery){

        $subject="Email Activation ";
        $body="Hi, $username. Click here to activate your account  http://localhost/Departmental_Store/Verify.php?token=$token";
        $headers="From: rashijoshi1999913@gmail.com";

        if(mail($email,$subject,$body,$headers)){
            $_SESSION['check_msg']="Check your mail to activate your account $email";
            header("location:Login.php");
          }
          else{
            echo "Email sending failed";
          }

        }else{
          ?>
           <script>alert("Insertion unsuccessful");</script>
          <?php
     }

      }
    else{
      ?>
       <script>alert("Password is not matching!!");</script>
      <?php
    }
  }}
  ?>
  <div class="card bg-light">
  <article class="card-body mx-auto" style="max-width:400px;">
    <h4 class="card-title mt-3 text-center">Create Account</h4>
    <p class="text-center">Get started with your free account</p>
    <p>
     <!-- <a href="" class="btn btn-block btn-gmail"><i class="fa fa fa-google"></i>
        Login via Gmail</a>
      <a href="" class="btn btn-block btn-facebook"><i class="fa fa fa-facebook-f"></i>
      Login via facebook</a>
    </p>
    <p class="divider-text">
      <span class="bg-light">OR</span>
    </p>-->


    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-user"></i></span>
        </div>
        <input name="username" class="form-control" placeholder="Full Name *" type="text" required>
        <span class="error"><?php echo $nameErr;?></span>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-envelope"></i></span>
        </div>
        <input name="email" class="form-control" placeholder="Email ID *" type="text" required>
        <span class="error"><?php echo $emailErr;?></span>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-lock"></i></span>
        </div>
        <input name="password" class="form-control" placeholder="Create password *" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required>
         <p class="font_size">(At least 1 Uppercase, 1 Lowercase, 1 Number, 1 Symbol, symbol allowed --> !@#$%^&*_=+- and Min 8 chars and Max 12 chars)</p>
         <span class="error"><?php echo $passErr;?></span>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-lock"></i></span>
        </div>
        <input name="cpassword" class="form-control" placeholder="Repeat password *" required>
        <span class="error"><?php echo $cpassErr;?></span>
      </div>

      <!--  <input type="hidden"  name="user_type" value="user" required>-->

        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
        </div>
        <p class="text-center">Have an account?<a href="Login.php">Log in</a></p>
      </form>
      </div>

</body>
</html>
