<?php
include 'connection.php';
include 'error.php';

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

session_start();
if (isset($_POST['reset'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['newpassword']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

  if ($password === $confirmPassword) {
    $searchUser = "SELECT * FROM `users` where username = '" . $username . "' and email_id='" . $email . "';";
    // echo $searchUser;
    $result = $conn->query($searchUser);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $dbusername = $row['username'];
        $dbemail = $row['email_id'];
        $phone = $row['phone'];
      }
      // echo $dbusername;
      // echo $dbemail;
      if ($dbusername == $username && $dbemail == $email) {
        $fourRandomDigit = mt_rand(1000, 9999);
        // echo $fourRandomDigit;
        $_SESSION['otp'] = $fourRandomDigit;
        $_SESSION['forgot_username'] = $username;
        $_SESSION['forgot_email'] = $email;
        $_SESSION['new_password'] = $password;
        $_SESSION['number'] = $phone;

        // if (stristr($number, ',')) {
        //   $number = explode(',', $number);
        // } else {
        //   $number = [$number];
        // }

        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
        $auth_token = '70afc0450391fadee1586c848756642b';
      // In production, these should be environment variables. E.g.:
      // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

      // A Twilio number you own with SMS capabilities
      $twilio_number = "+17204087706";
      try{
       $client = new Client($account_sid, $auth_token);
       $text=" OTP for reset your password of Username " . $dbusername . " is " . $fourRandomDigit;

      // $text = str_replace('<p>',' ',$text);
      // $text = str_replace('</p>',' ',$text);
      // $text = str_replace('&nbsp;',' ',$text);
      // $text = strip_tags($text);
      // $text = str_replace('&quot','"',$text);
      // $text = str_replace(';',' ',$text);

      // for($i=0;$i<count($number);$i++){
      //   // echo $number[$i];
      //   $number_to_send =  '+91'.$number[$i];

      // echo $number_to_send;
      $phone = '+91'.$phone;
      if(strlen($phone) == 13){
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            $phone,
            array(
                'from' => $twilio_number,
                'body' => $text
            )
        );
      }

      // }
    }catch (Exception $e){
      ?><script type="text/javascript" charset="utf-8">
        // alert($e.get_code());
        alert("Message not send Succusfully");
        window.location.replace('otp.php');
      </script>
      <?php
    }

        // $service_plan_id = "78125b9858494c72894913f48031923d";
        // $bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";

        // $send_from = "+447537454577";
        // $recipient_phone_numbers = "91" . $phone; //May be several, separate with a comma `,`.
        // $message = $text;
        // "This test message will be sent to {$recipient_phone_numbers} from ";
        // echo "$message";
        // Check recipient_phone_numbers for multiple numbers and make it an array.
        // $text = " OTP for reset your password of Username " . $dbusername . " is " . $fourRandomDigit;
        // if (stristr($recipient_phone_numbers, ',')) {
        //   $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
        // } else {
        //   $recipient_phone_numbers = [$recipient_phone_numbers];
        // }

        // Set necessary fields to be JSON encoded
        // $content = [
        //   'to' => array_values($recipient_phone_numbers),
        //   'from' => $send_from,
        //   'body' => $text
        // ];
        //
        // $data = json_encode($content);
        //
        // $ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
        // curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //
        // $result = curl_exec($ch);
        //
        // if (curl_errno($ch)) {
        //   echo 'Curl error: ' . curl_error($ch);
        // } else {
        //   curl_close($ch);
        //
?><script type="text/javascript" charset="utf-8">
            alert("OTP Sent Successfully");
            window.location.replace('otpproccess.php');
          </script>
        <?php
          // echo $result;
        // }
      } else {
        // echo "can't able to send SMS";
        ?><script type="text/javascript" charset="utf-8">
          alert("Check the Username or Email Once");
          window.location.replace('forgot.php');
        </script>
      <?php
      }
    } else {
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
  } else {
    ?><script type="text/javascript" charset="utf-8">
      alert("Password and Confirm Password are not Equal!");
      window.location.replace('forgot.php');
    </script>
  <?php
  }
} else {
  ?><script type="text/javascript" charset="utf-8">
    window.location.replace('forgot.php');
  </script>
<?php
}
?>
