<?php
include 'connection.php';
include 'error.php';
include 'session.php';
if (isset($_POST['sendsms'])) {
  $number = $_POST['numbers'];
  $text = $_POST['text'];
  // $service_plan_id = "78125b9858494c72894913f48031923d";
  // $bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";
  //
  // $send_from = "+447537454577";
  // $recipient_phone_numbers = $number; //May be several, separate with a comma `,`.
  // // $message = $text;
  // // "This test message will be sent to {$recipient_phone_numbers} from ";
  // // echo "$message";
  // // Check recipient_phone_numbers for multiple numbers and make it an array.
  // // $text = " OTP for reset your password of Username ".$dbusername." is ".$fourRandomDigit;
  // if (stristr($recipient_phone_numbers, ',')) {
  //   $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
  // } else {
  //   $recipient_phone_numbers = [$recipient_phone_numbers];
  // }
  // // echo $recipient_phone_numbers;
  // for ($i = 0; $i < count($recipient_phone_numbers); $i++) {
  //   $recipient_phone_number = "+91" . $recipient_phone_numbers[$i];
  //   if (strlen($recipient_phone_number) == 13) {
  //     $recipient_phone_number = ["+91" . $recipient_phone_numbers[$i]];
  //     $text = strip_tags($text);
  //     $content = [
  //       'to' => array_values($recipient_phone_number),
  //       'from' => $send_from,
  //       'body' => $text
  //     ];
  //
  //     $data = json_encode($content);
  //
  //     $ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
  //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  //     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
  //     curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
  //     curl_setopt($ch, CURLOPT_POST, true);
  //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //
  //     $result = curl_exec($ch);
  //
  //     if (curl_errno($ch)) {
  //       echo 'Curl error: ' . curl_error($ch);
  //     } else {
  //       curl_close($ch);
?>
<!-- <script type="text/javascript" charset="utf-8">
          alert("message  send Successfully");
        </script> -->
      <?php
        // echo "result".$result;
    //   }
    // } else {
      ?>
      <!-- <script type="text/javascript" charset="utf-8">
        alert("message not send Successfully");
      </script> -->
  <?php
    // }
  // }
  ?>
  <!-- <script type="text/javascript" charset="utf-8">
    window.location.replace('instancesms.php');
  </script> -->
<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
$auth_token = '7d10e6525a0193bce77b73ffb03a71c6';
// In production, these should be environment variables. E.g.:

// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+17204087706";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    $number,
    array(
        'from' => $twilio_number,
        'body' => $text
    )
);

}
?>
