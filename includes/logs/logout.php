<?php
session_start();
if($_SESSION['uid']){
  session_destroy();
  header('location: ../../index.php');
}
?>