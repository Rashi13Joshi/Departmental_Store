<?php
include 'dbconfig.php';
// define variables and set to empty values
$nameErr = $emailErr = $passErr = $cpassErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
  }

  if (empty($_POST["password"])) {
    $passErr = "Password Required";
  } else {
    $password = $_POST["password"];
  }

  if (empty($_POST["cpassword"])) {
    $cpassErr = "Confirm Password required";
  } else {
    $cpassword = $_POST["cpassword"];
  }
}
?>