<?php
// if(isset($_POST['sendsms'])){
// $text= $_POST['text'];
// $number = $_POST['numbers'];

$service_plan_id = "78125b9858494c72894913f48031923d";
$bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";

$send_from = "447537454577";
$recipient_phone_numbers = ",9483621844,8095642067" ; //May be several, separate with a comma `,`.
$message = "This test message will be sent to {$recipient_phone_numbers} from {$assigned_phone_number}";

// Check recipient_phone_numbers for multiple numbers and make it an array.
if(stristr($recipient_phone_numbers, ',')){
  $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
}else{
  $recipient_phone_numbers = [$recipient_phone_numbers];
}
for ($i=0; $i <count($recipient_phone_numbers) ; $i++) {
$number = $recipient_phone_numbers[$i];
$number = "+91".$number;
if(strlen($number)==13){
echo $number;
echo $message;
  // Set necessary fields to be JSON encoded
  $content = [
    'to' => $number,
    'from' => $send_from,
    'body' => $message
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
  } else {
      echo $result;
  }
  curl_close($ch);
}
}
// }
?>
