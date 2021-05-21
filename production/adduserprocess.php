<?php
session_start();
include 'connection.php';
include 'error.php';

if (isset($_POST['add'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $role ='user';
  // echo $username."\n".$email."\n".$phone."\n".$role;
  $insertuser = "INSERT INTO `users`(username,phone,email_id, role) VALUES('" . $username . "','" . $phone . "','" . $email . "','" . $role . "');";
  // echo $insertuser;
  if ($conn->query($insertuser) == TRUE) {
    ?>
          <script type='text/javascript' charset='utf-8'>
            alert("User Added Successfully");
            window.location.replace('addUser.php');
          </script>
        <?php
  }else{
    ?>
          <script type='text/javascript' charset='utf-8'>
            alert("User not Added Successfully");
            window.location.replace('addUser.php');
          </script>
        <?php
  }
}
?>
