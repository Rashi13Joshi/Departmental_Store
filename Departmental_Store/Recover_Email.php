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

    $email=mysqli_real_escape_string($con,$_POST['email']);

    $emailquery="SELECT * FROM register where email='$email'";
    $query=mysqli_query($con,$emailquery);

    $emailcount=mysqli_num_rows($query);

    if($emailcount){

     $userdata= mysqli_fetch_array($query);

     $username=$userdata['username'];
     $token=$userdata['token'];
     $email_user=$userdata['email'];

      $subject="Password Reset";
      $body="Hi, $username. Click here to reset your password  http://localhost/Library_(P2)/reset_password.php?token=$token";
      $headers="From: rashijoshi1999913@gmail.com";

      if(mail($email,$subject,$body,$headers)){
          $_SESSION['check_msg']="Check your mail to reset your password $email";
          $_SESSION['token']=$token;
          $_SESSION['email'] = $email_user;
          header("location:login.php");
        }
        else{
          echo "Email sending failed";
        }

    }else{
      echo "No such Email ID found!!";
    }



      }

  ?>
  <div class="card bg-light">
  <article class="card-body mx-auto" style="max-width:400px;">
    <h4 class="card-title mt-3 text-center">Recover your account</h4>
    <p class="text-center">Please enter your Email ID registered with the account</p>
    <p>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa fa-envelope"></i></span>
        </div>
        <input name="email" class="form-control" placeholder="Email ID" type="text" required>
      </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
        <p class="text-center">Have an account?<a href="login.php">Log in</a></p>
      </form>
      </div>

</body>
</html>
