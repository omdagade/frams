<?php

require_once("db.php");
?>



<!DOCTYPE html>
<html>

<head>
  <title>Frams</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
      <img src="img/bg.svg">
    </div>
    <div class="login-content">
      <form method="post" action="login.php">
        <img src="img/avatar.svg">
        <h2 class="title">Welcome</h2>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Username</h5>
            <input name="username" type="text" class="input">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <h5>Password</h5>
            <input name="pass" type="password" class="input">
          </div>
        </div>

        <input type="submit" id="loginsubmitbtn" class="btn" value="Login">
      </form>


    </div>
  </div>
  <script type="text/javascript" src="main.js"></script>
</body>

</html>