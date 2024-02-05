<?php
require_once("db.php");
session_start();
$username = $_POST['username'];
$pass = $_POST['pass'];

$loginquery = "select * from studentdetails where id='" . $username . "' and password='" . $pass . "'";
$resultquery = mysqli_query($con, $loginquery);
$rest = mysqli_num_rows($resultquery);
if ($username == "admin" and $pass == "admin") {
  echo "<script>location.replace('./admin.php')</script>";
  $_SESSION['loginid'] = $username;
} else {
  if ($rest == 1) {
    echo "<script>location.replace('./home.php')</script>";
    $_SESSION['checklogindetail'] = true;
    $_SESSION['loginid'] = $username;
  } else {
    echo "<script>location.replace('./index.php'); alert('Invalid Credentials'); </script>";
  }
}
