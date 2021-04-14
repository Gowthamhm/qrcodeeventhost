<?php

include 'connection.php';
include 'error.php';
include 'session.php';

if (isset($_POST['send'])) {
 $slno = $_POST['slno'];


 if(stristr($slno, ',')){
   $slnos = explode(',', $slno);
 }else{
   $slnos = [$slno];
 }

$service_plan_id = "78125b9858494c72894913f48031923d";
$bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";

$send_from = "+447537454577";

for ($i=0; $i < count($slnos) ; $i++) {
$slno = $slnos[$i];
$sql ="SELECT * FROM `qrcode` where slno=".$slno;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $number = ["+91".$row['number']];
      $text = "http://qrcodeevent-com.preview-domain.com/production/".str_replace( ".",' ', $row['path'])."/".$row['infilename'];
      if (strlen($number==13)) {
        $content = [
          'to' => $number,
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
           alert("message  send Successfully");
           </script>
           <?php
        }
      }
      else {
        ?><script type="text/javascript" charset="utf-8">
         alert("message not send Successfully");
         </script>
         <?php
      }
  }
}
else {
  ?><script type="text/javascript" charset="utf-8">
   alert("Please Select a Valid Number");
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
