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
  $auth_token = '684a02b1ebd99177ea76aaf5afd22cb2';

// A Twilio number you own with SMS capabilities
$twilio_number = "+17204087706";
try{
 $client = new Client($account_sid, $auth_token);

 $text = strip_tags($text);
$text = str_replace('&quot','"',$text);
$text = str_replace(';',' ',$text);
$text = "The Text Message sent from {company name},\n".$text;

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
  echo $e;
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
