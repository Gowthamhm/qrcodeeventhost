<?php
session_start();
if(!isset($_SESSION['otp'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href="otp.php";';
  echo '</script>';
}else{
  
}
?>
