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
</style>
</head>
<body>
  <?php

  include 'dbconfig.php';

  if(isset($_POST['submit'])){

    if(isset($_SESSION['token'])){

    $token=$_SESSION['token'];
      $email=$_SESSION['email'];

    $newpassword=mysqli_real_escape_string($con,$_REQUEST['password']);
    $cnewpassword=mysqli_real_escape_string($con,$_REQUEST['cpassword']);

  //  $newpass=password_hash($newpassword, PASSWORD_BCRYPT);
    //$cnewpass=password_hash($cnewpassword, PASSWORD_BCRYPT);

      if($newpassword===$cnewpassword)
      {
        $update="UPDATE register SET password='$newpassword',cpassword='$cnewpassword' WHERE token='$token' AND email='$email' ";
        $iquery=mysqli_query($con,$update);

       if($iquery){
         $_SESSION['check_msg']="Password has been updated";
         header('location:Login.php');
        }else{
          $_SESSION['passmsg']="Password has not been updated";
          header('location:Reset_Password.php');
     }

      }
    else{
        $_SESSION['passmsg']="Password is not matching";
    }
  }else{
    echo "no token found";
  }

}
  ?>
  <div class="card bg-light">
  <article class="card-body mx-auto" style="max-width:400px;">
    <h4 class="card-title mt-3 text-center">Reset Password</h4>
    <p class="text-center">Enter new password</p>

    <p><?php
    if(isset($_SESSION['passmsg'])){
      echo $_SESSION['passmsg'];
    } else{
      echo $_SESSION['passmsg']="";
    } ?></p>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-lock"></i></span>
        </div>
        <input name="password" class="form-control" placeholder="Create password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required>
         <p class="font_size">(At least 1 Uppercase, 1 Lowercase, 1 Number, 1 Symbol, symbol allowed --> !@#$%^&*_=+- and Min 8 chars and Max 12 chars)</p>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-lock"></i></span>
        </div>
        <input name="cpassword" class="form-control" placeholder="Repeat password" required>
      </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
        <p class="text-center">Have an account?<a href="Login.php">Log in</a></p>
      </form>
      </div>

</body>
</html>
