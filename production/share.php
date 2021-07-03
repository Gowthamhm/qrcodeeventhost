<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

include 'connection.php';
include 'error.php';
include 'session.php';

if (isset($_POST['send'])) {
  $slno = $_POST['slno'];
  // echo "entered sl no ".$slno;
  if (stristr($slno, ',')) {
    $slnos = explode(',', $slno);
  } else {
    $slnos = [$slno];
  }

  // Your Account SID and Auth Token from twilio.com/console
  $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
  $auth_token = 'fa6b39d0d9dd3ec4c9f3531f7c6a82a1';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+17204087706";
  // echo "count ".count($slnos);
  for ($i = 0; $i < count($slnos); $i++) {
    $sl = $slnos[$i];
    $sql = "SELECT * FROM `qrcode` WHERE slno ='" . $sl . "'";
    $result = $conn->query($sql);
    // echo "no ".$result->num_rows;
    if ($result->num_rows > 0) {
      if ($row = $result->fetch_assoc()) {
        // echo "array split ".$sl;
        // echo "db value ".$row['slno'];
        ?><script type="text/javascript" charset="utf-8">
        alert(<?php echo $row['slno']?>);
      </script>
  <?php
        if ($row['slno'] == $sl) {
          // echo "entered inside if";
          ?><script type="text/javascript" charset="utf-8">
          alert(<?php echo $row['number']?>);
        </script>
    <?php
          $number = "+91" . $row['number'];
          $text = "https://sample-wesite-hosting.online/production" . str_replace(".", '', $row['path']) . "/" . $row['infilename'];
          if (strlen($number) == 13) {
            try{
              $client = new Client($account_sid, $auth_token);

             // $text = str_replace('<p>',' ',$text);
             // $text = str_replace('</p>',' ',$text);
             // $text = str_replace('&nbsp;',' ',$text);
             // $text = strip_tags($text);
             // $text = str_replace('&quot','"',$text);
             // $text = str_replace(';',' ',$text);
             $client->messages->create(
                 // Where to send a text message (your cell phone?)
                 $number,
                 array(
                     'from' => $twilio_number,
                     'body' => $text
                 )
             );
             $updatestatus =  "UPDATE `qrcode` SET `status`=1 WHERE `slno` = " . $sl;
             if ($conn->query($updatestatus) === TRUE) {
               ?><script type="text/javascript" charset="utf-8">
                 alert("Message Send Successfully");
               </script>
           <?php
             }
            }
            catch (Exception $e){
              ?><script type="text/javascript" charset="utf-8">
                // alert($e.get_code());
                alert($e."Message not send Succusfully");
                // window.location.replace('instancesms.php');
              </script>
              <?php
            }
            // $number = ["+91" . $row['number']];
            // $content = [
            //   'to' => array_values($number),
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
            // echo "result".$result;
            // if (curl_errno($ch)) {
            //   echo 'Curl error: ' . curl_error($ch);
            // } else {
              // echo "result".$result;
              // curl_close($ch);
            // }
          } else {
            ?><script type="text/javascript" charset="utf-8">
              alert("message not send Successfully");
            </script>
          <?php
          }
        } else {
          ?><script type="text/javascript" charset="utf-8">
            // alert("entered and db value not equal");
          </script>
      <?php
        }
      }
    } else {
      ?><script type="text/javascript" charset="utf-8">
        // alert("Please Select a Valid Number");
      </script>
  <?php
    }
  }
  ?><script type="text/javascript" charset="utf-8">
    window.location.replace('sendQrcode.php');
  </script>
<?php
}
?>
