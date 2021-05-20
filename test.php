 <?php
 // Include the bundled autoload from the Twilio PHP Helper Library
 // C:\xampp\htdocs\qrcodeeventhost\production\twilio-php-main
 // require __DIR__ . '/production/twilio-php-main/src/Twilio/autoload.php';
 // require __DIR__ . '/vendor/autoload.php';
 use Twilio\Rest\Client;
 // Your Account SID and Auth Token from twilio.com/console
 $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
 $auth_token = '70afc0450391fadee1586c848756642b';
 // In production, these should be environment variables. E.g.:
 // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
 // A Twilio number you own with SMS capabilities
$twilio_number = "+17204087706";
 $client = new Client($account_sid, $auth_token);
 $client->messages->create(
     // Where to send a text message (your cell phone?)
     '+919483621844',
     array(
         'from' => $twilio_number,
         'body' => 'I sent this message in under 10 minutes!'
     )
 );
