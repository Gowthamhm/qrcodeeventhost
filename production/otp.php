<?php
include 'connection.php';
include 'error.php';

if (isset($_POST['reset'])) {
$username =mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password =mysqli_real_escape_string($conn,$_POST['newpassword']);
$confirmPassword =mysqli_real_escape_string($conn,$_POST['confirmpassword']);

if ($password === $confirmPassword) {
  $searchUser="SELECT * FROM `users` where username = '".$username."' and email_id='".$email."';";
  // echo $searchUser;
   $result = $conn->query($searchUser);
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
  $dbusername = $row['username'];
  $dbemail =$row['email_id'];
  $phone = $row['phone'];
}
// echo $dbusername;
// echo $dbemail;
if($dbusername == $username && $dbemail == $email){
  $fourRandomDigit = mt_rand(1000,9999);
      // echo $fourRandomDigit;
      $_SESSION['otp'] = $fourRandomDigit;
      $_SESSION['forgot_username'] = $username;
      $_SESSION['forgot_email'] = $email;
      $_SESSION['new_password'] = $password;
      $_SESSION['number'] = $phone;
      $service_plan_id = "78125b9858494c72894913f48031923d";
$bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";

$send_from = "+447537454577";
$recipient_phone_numbers = "91".$phone; //May be several, separate with a comma `,`.
// $message = $text;
// "This test message will be sent to {$recipient_phone_numbers} from ";
// echo "$message";
// Check recipient_phone_numbers for multiple numbers and make it an array.
$text = " OTP for reset your password of Username ".$dbusername." is ".$fourRandomDigit;
if(stristr($recipient_phone_numbers, ',')){
  $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
}else{
  $recipient_phone_numbers = [$recipient_phone_numbers];
}

// Set necessary fields to be JSON encoded
$content = [
  'to' => array_values($recipient_phone_numbers),
  'from' => $send_from,
  'body' => $text
];

$data = json_encode($content);

$ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}else {
  curl_close($ch);
  ?><script type="text/javascript" charset="utf-8">
   alert("OTP Sent Successfully");
   window.location.replace('otpproccess.php');
   </script>
   <?php
    // echo $result;
}
}else {
  // echo "can't able to send SMS";
  ?><script type="text/javascript" charset="utf-8">
   alert("Check the Username or Email Once");
   window.location.replace('forgot.php');
   </script>
   <?php
}
}else {
   ?><script type="text/javascript" charset="utf-8">
    alert("Check the Username or Email Once");
    window.location.replace('forgot.php');
    </script>
    <?php
    // <script type="text/javascript" charset="utf-8">
    //  alert("Updated Successfully Login using new Password");
    //  window.location.replace('login.php');
    //  </script>
    //  <?php
}
}else {
  ?><script type="text/javascript" charset="utf-8">
   alert("Password and Confirm Password are not Equal!");
   window.location.replace('forgot.php');
   </script>
   <?php
}
}else{
  ?><script type="text/javascript" charset="utf-8">
   window.location.replace('forgot.php');
   </script>
   <?php
}
 ?>
