 <?php
 // Include the bundled autoload from the Twilio PHP Helper Library
 require __DIR__ . '/production/twilio/src/Twilio/autoload.php';
 use Twilio\Rest\Client;
 // Your Account SID and Auth Token from twilio.com/console
 $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
 $auth_token = '4066a3f5b52af59442d56e3f5859fe15';
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
