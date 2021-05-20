<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

include 'connection.php';
include 'error.php';
include 'session.php';
if (isset($_POST['sendsms'])) {
  $number = $_POST['numbers'];
  $text = $_POST['text'];
  if (stristr($number, ',')) {
    $number = explode(',', $number);
  } else {
    $number = [$number];
  }

  // Your Account SID and Auth Token from twilio.com/console
  $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
  $auth_token = '70afc0450391fadee1586c848756642b';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+17204087706";
try{
 $client = new Client($account_sid, $auth_token);

// $text = str_replace('<p>',' ',$text);
// $text = str_replace('</p>',' ',$text);
// $text = str_replace('&quot','"',$text);
// $text = str_replace('&nbsp;',' ',$text);
// $text = str_replace(';',' ',$text);
$text = strip_tags($text);

for($i=0;$i<count($number);$i++){
  // echo $number[$i];
  $number_to_send =  '+91'.$number[$i];
// echo $number_to_send;
if(strlen($number_to_send) == 13){
  $client->messages->create(
      // Where to send a text message (your cell phone?)
      $number_to_send,
      array(
          'from' => $twilio_number,
          'body' => $text
      )
  );
}
}
}catch (Exception $e){
  ?><script type="text/javascript" charset="utf-8">
    // alert($e.get_code());
    alert("Message not send Succusfully");
    window.location.replace('instancesms.php');
  </script>
  <?php
}
?><script type="text/javascript" charset="utf-8">
  alert("Message Sent Succusfully");
  window.location.replace('instancesms.php');
</script>
<?php
}

// $client->messages->create(
//     // Where to send a text message (your cell phone?)
//     '+919483621844',
//     array(
//         'from' => $twilio_number,
//         'body' => 'I sent this message in under 10 minutes!'
//     )
// );
// echo "$text";
//
// $client = new Client($account_sid, $auth_token);
// for($i=0;$i<count($number);$i++){
//   $client->messages->create(
//       // Where to send a text message (your cell phone?)
//       $number[$i],
//       array(
//           'from' => $twilio_number,
//           'body' => $text
//       )
//   );
// }

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
?>
