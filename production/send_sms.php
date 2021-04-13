<?php
include 'connection.php';
include 'error.php';
include 'session.php';
if (isset($_POST['sendsms'])) {
$number = mysqli_real_escape_string($conn,$_POST['numbers']);
$text = mysqli_real_escape_string($conn,$_POST['text']);

$service_plan_id = "78125b9858494c72894913f48031923d";
$bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";

$send_from = "+447537454577";
// $recipient_phone_numbers = "91".$phone; //May be several, separate with a comma `,`.
// $message = $text;
// "This test message will be sent to {$recipient_phone_numbers} from ";
// echo "$message";
// Check recipient_phone_numbers for multiple numbers and make it an array.
// $text = " OTP for reset your password of Username ".$dbusername." is ".$fourRandomDigit;
if(stristr($recipient_phone_numbers, ',')){
$recipient_phone_numbers = explode(',', $number);
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
alert("Text Sent Successfully");
window.location.replace('instancesms.php');
</script>
<?php
// echo $result;
}
}
?>
