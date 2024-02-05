<?php
require_once("db.php");
session_start();
if (!isset($_SESSION['loginid'])) {
  echo "<script>alert('PLZ LOGIN FIRST!!'); location.replace('./index.php')</script>";
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
      <?php
      $query = "select * from studentdetails where id='" . $_SESSION["loginid"] . "'";

      $res = mysqli_query($con, $query);

      while ($row = mysqli_fetch_array($res)) {
        echo '<a href="">' . $row["name"] . '</a>
        <a href="">' . $row["year"] . '</a>
      <a href="">' . $row["branch"] . '</a>
      
      <a href="logout.php"><strong>Logout</strong></a>
      ';
      }

      ?>
    </div>


    <div class="divmain">

      <?php
      $temparray = array();

      $res = mysqli_query($con, "select * from lectures");
      while ($row = mysqli_fetch_array($res)) {
        if ((array_key_exists($row["subject"], $temparray))) {

          $temparray[$row["subject"]] = $temparray[$row["subject"]] + 1;
        } else {
          $temparray[$row["subject"]] = 1;
        }
      }

      $student = array();
      $qry = "select * from " . $_SESSION["loginid"];

      $res = mysqli_query($con, $qry);
      while ($row = mysqli_fetch_array($res)) {
        if ((array_key_exists($row["subject"], $student))) {

          $student[$row["subject"]] = $student[$row["subject"]] + 1;
        } else {
          $student[$row["subject"]] = 1;
        }
      }
      $keys = array_keys($temparray);
      foreach ($keys as $key) {
        if ((array_key_exists($key, $student))) {
        } else {
          $student[$key] = 0;
        }
      }



      ?>

      <table class="table">
        <thead style="vertical-align: middle">
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Total Lectures</th>
            <th scope="col">Present</th>
            <th scope="col">Absent</th>
            <th scope="col">Percentage</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php

            foreach ($keys as $key) {

              $per = 100 - (($temparray[$key] - $student[$key]) * 100 / $temparray[$key]);

              echo '<th scope="row">' . $key . '</th>
          <td>' . $temparray[$key] . '</td>
          <td>' . $student[$key] . '</td>
          <td>' . $temparray[$key] - $student[$key] . '</td>
          <td><strong>' . $per . '%</strong></td>
        </tr>';
            }



            ?>

        </tbody>
      </table>
    </div>

  </div>







  <script src="js/script.js"></script>
</body>

</html>