<?php
require_once("db.php");
?>

<ul class="list-group">
  <?php

  $res = mysqli_query($con, "show tables");
  while ($row = mysqli_fetch_row($res)) {
    if ($row[0] != "lectures") {
      echo '<a><li class="list-group-item">' . $row[0] . '</li></a>';
    }
  }
  ?>


</ul>