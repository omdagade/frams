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

$defaulter = array();
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
      <a href="sendemail.php">Send Email</a>
      <a href="logout.php"><strong>Logout</strong></a>

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

      $rest = mysqli_query($con, "show tables");
      while ($resto = mysqli_fetch_row($rest)) {
        if ($resto[0] != "lectures" and $resto[0] != "studentdetails") {

          $student = array();
          $usename = $resto[0];
          $qry = "select * from " . $usename;

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


          $count = 0;
          $summ = 0;
          foreach ($keys as $key) {
            $per = 100 - (($temparray[$key] - $student[$key]) * 100 / $temparray[$key]);
            $count = $count + 1;
            $summ = $summ + $per;
          }

          if ($summ / $count < 75) {
            $defaulter[$usename] = $summ / $count;
          }
        }
      }
      ?>

      <table class="table">
        <thead style="vertical-align: middle">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Branch</th>
            <th scope="col">Year</th>
            <th scope="col">Percentage</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $emailarray = array();
            $defkeys = array_keys($defaulter);
            foreach ($defkeys as $defkey) {
              $resti = mysqli_query($con, "select * from studentdetails where id='" . $defkey . "'");

              while ($ret = mysqli_fetch_array($resti)) {
                $emailarray[$ret["email"]] = $defaulter[$ret["id"]];
                echo '<th scope="row">' . $ret["name"] . '</th>
          <td>' . $ret["branch"] . '</td>
          <td>' . $ret["year"] . '</td>
          <td><strong>' . $defaulter[$ret["id"]] . '%</strong></td>
        </tr>';
              }
            }






            $_SESSION["defaulteremail"] = $emailarray;

            ?>

        </tbody>
      </table>
    </div>



  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>