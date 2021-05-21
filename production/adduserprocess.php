<?php
session_start();
include 'connection.php';
include 'error.php';

if (isset($_POST['add'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $role ='user';
  echo $username.'\n'.$email.'\n'.$phone.'\n'.$role;
}
?>
