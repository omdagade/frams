<?php

session_start();
unset($_SESSION["loginid"]);

echo "<script>location.replace('./index.php')</script>";
