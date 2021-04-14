<?php
if(isset($_POST['sendsms'])){
  echo $_POST['text'];
  echo $_POST['numbers'];
}
// $service_plan_id = "your_service_plan_id";
// $bearer_token = "your_api_token";
//
// $send_from = "your_assigned_number";
// $recipient_phone_numbers = "recipient_phone_numbers"; //May be several, separate with a comma `,`.
// $message = "This test message will be sent to {$recipient_phone_numbers} from {$assigned_phone_number}";
//
// // Check recipient_phone_numbers for multiple numbers and make it an array.
// if(stristr($recipient_phone_numbers, ',')){
//   $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
// }else{
//   $recipient_phone_numbers = [$recipient_phone_numbers];
// }
//
// // Set necessary fields to be JSON encoded
// $content = [
//   'to' => array_values($recipient_phone_numbers),
//   'from' => $send_from,
//   'body' => $message
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
// if(curl_errno($ch)) {
//     echo 'Curl error: ' . curl_error($ch);
// } else {
//     echo $result;
// }
// curl_close($ch);
?>
