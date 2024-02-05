<?php
require_once("db.php");
session_start();
if (!isset($_SESSION['loginid'])) {
  echo "<script>alert('PLZ LOGIN FIRST!!'); location.replace('./index.php')</script>";
} else {
  if ($_SESSION["loginid"] != "admin") {
    echo "<script>alert('PLZ LOGIN FIRST!!'); location.replace('./index.php')</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frams</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="mainscreen">
    <div id="sidebar">
      <img src="img/avatar.svg" alt="Profile Icon" class="profile-icon">

      <a href="">Admin</a>
      <a href="admin.php">Home</a>
      <a href="defaulterlist.php">Defaulter List</a>
      <a href="logout.php"><strong>Logout</strong></a>

    </div>


    <div class="divmain">
      <?php

      $qry = "show tables";
      $res = mysqli_query($con, $qry);
      while ($row = mysqli_fetch_array($res)) {
        $query = "select * from studentdetails where id='" . $row[0] . "'";
        $result = mysqli_query($con, $query);
        while ($om = mysqli_fetch_array($result)) {
          echo '<div class="accordion accordion-flush stdlist" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"><strong>
           ' . $om["name"] . '
            </strong></button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><a href="adetails.php?sname=' . urlencode($om["id"]) . '">View Attendance</a></div>
          </div>
        </div>
      </div>';
        }
      } ?>
    </div>



  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>