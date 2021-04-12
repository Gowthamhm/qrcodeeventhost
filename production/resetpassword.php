<?php

include 'connection.php';
include 'error.php';


if (isset($_POST['otp'])) {
$username =mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password =mysqli_real_escape_string($conn,$_POST['newpassword']);
$number =mysqli_real_escape_string($conn,$_POST['number']);

$otp = mysqli_real_escape_string($conn,$_POST['otp']);
if ($_SESSION['otp'] == $otp) {
  $update = "UPDATE `users` SET `password`='".$password."' WHERE username='".$username."' and email_id='".$email."'";
    if($conn->query($update) === TRUE){
      ?><script type="text/javascript" charset="utf-8">
       alert("Updated Successfully Login using new Password");
       window.location.replace('login.php');
       </script>
       <?php
    }else {
      ?><script type="text/javascript" charset="utf-8">
       alert("Password  Not Updated Successfully Try Again");
       window.location.replace('login.php');
       </script>
       <?php
    }
}else {
  ?><script type="text/javascript" charset="utf-8">
   alert("Enter a valid OTP");
   window.location.replace('otpproccess.php');
   </script>
   <?php
}
}
?>
