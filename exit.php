<?php
  require "standartDB.php";
  
  unset($_SESSION['logged_user']);
  header("Location: /main.php")
?>
