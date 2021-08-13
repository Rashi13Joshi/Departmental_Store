<?php
session_start();

include 'dbconfig.php';

if(isset($_GET['token'])){

  $token=$_GET['token'];

  $update="UPDATE register SET status='active' WHERE token='$token' ";

  $query=mysqli_query($con,$update);

  if($query){
  if(isset($_SESSION['msg']))  {
    $_SESSION['msg']="Account activated successfully";
    header('location:Login.php');
  }else{
    $_SESSION['msg']="You are logged out";
    header('location:Login.php');
  }
}else{
  $_SESSION['msg']="Account not activated";
  header('location:Register.php');
}
}
?>
