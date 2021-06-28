<?php
  session_start();

  unset($_SESSION['loggedin']);
  unset($_SESSION['sessionname']);
  unset($_SESSION['id']);
  session_destroy();

  header("location:registration.php");
?>