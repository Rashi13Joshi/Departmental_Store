<?php

include 'dbconfig.php';
// define variables and set to empty values
$email_log_Err = $pass_log_Err = "";

  if (empty($_POST["email"])) {
    $email_log_Err = "Email is required";
  } else {
    $email = $_POST["email"];
  }

  if (empty($_POST["password"])) {
    $pass_log_Err = "Password Required";
  } else {
    $password = $_POST["password"];
  }

?>