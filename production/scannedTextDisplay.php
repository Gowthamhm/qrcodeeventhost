<?php
include 'session.php';
include 'connection.php';
include 'error.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Text Message Display</title>
  </head>
  <style media="screen">
@import url(https://fonts.googleapis.com/css?family=Raleway:400,700,900,400italic,700italic,900italic);

*,
:before,
:after {
box-sizing: border-box;
}

body {
background-color: #fdf9fd;
color: #011a32;
font: 16px/1.25 'Raleway', sans-serif;
text-align: center;
}

#wrapper {
margin-left: auto;
margin-right: auto;
max-width: 80em;
}

#container {
display: flex;
flex-direction: column;
float: left;
justify-content: center;
min-height: 100vh;
padding: 1em;
width: 100%;
}

h1 {
animation: text-shadow 1.5s ease-in-out infinite;
font-size: 5em;
font-weight: 900;
line-height: 1;
}

h1:hover {
animation-play-state: paused;
}

a {
color: #024794;
}

a:hover {
text-decoration: none;
}

@keyframes text-shadow {
0% {
    transform: translateY(0);
    text-shadow:
        0 0 0 #0c2ffb,
        0 0 0 #2cfcfd,
        0 0 0 #fb203b,
        0 0 0 #fefc4b;
}

20% {
    transform: translateY(-1em);
    text-shadow:
        0 0.125em 0 #0c2ffb,
        0 0.25em 0 #2cfcfd,
        0 -0.125em 0 #fb203b,
        0 -0.25em 0 #fefc4b;
}

40% {
    transform: translateY(0.5em);
    text-shadow:
        0 -0.0625em 0 #0c2ffb,
        0 -0.125em 0 #2cfcfd,
        0 0.0625em 0 #fb203b,
        0 0.125em 0 #fefc4b;
}

60% {
    transform: translateY(-0.25em);
    text-shadow:
        0 0.03125em 0 #0c2ffb,
        0 0.0625em 0 #2cfcfd,
        0 -0.03125em 0 #fb203b,
        0 -0.0625em 0 #fefc4b;
}

80% {
    transform: translateY(0);
    text-shadow:
        0 0 0 #0c2ffb,
        0 0 0 #2cfcfd,
        0 0 0 #fb203b,
        0 0 0 #fefc4b;
}
}

@media (prefers-reduced-motion: reduce) {
* {
  animation: none !important;
  transition: none !important;
}
}
</style>
  <body>
<?php
if(isset($_POST['submit']))
{
  $barcodedata = $_POST['qrcode'];
  // echo $barcodedata;
  $str_arr = explode ("@#", $barcodedata);
  // print_r($str_arr);
  if(empty($str_arr[1])){
    echo "<script type='text/javascript' charset='utf-8'>";
   echo "alert('This QrCode not Created by Our User Please varify');";
   echo "window.location.replace('qrcodereader.php');";
   // echo "setTimeout(function(){ ";
   // echo " window.location.href = 'qrcodereader.php';";
   //  echo "    }, 3000);";
   echo "</script>";
   //  <script type="text/javascript" charset="utf-8">
   // alert("This QrCode not Created by Our User Please varify");
   // window.location.replace('qrcodereader.php');
   // </script>
 }else {
   // print_r($str_arr);
   $pattern = "/in.png/i";
if (preg_match($pattern, $str_arr[5])) {
$selectdata = "SELECT * FROM `qrcode` where folder_name ='".$str_arr[0]."'and infilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
$result = $conn->query($selectdata);
// echo $result->num_rows;
// echo $selectdata;
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row['status'] == 1){
          // echo $barcodedata;
          echo "<div id='wrapper'>";
          echo "<div id='container'><h1>";
          echo $barcodedata;
          echo "</h1>";
          echo "</div>";
          echo "</div>";
            $number = "+91".$row['number'];
            $text = "https://sample-wesite-hosting.online/production".str_replace( ".",'', $row['path'])."/".$row['outfilename'];
            $service_plan_id = "78125b9858494c72894913f48031923d";
            $bearer_token = "63045e8e65ae445b8b65d9f8b7a657cb";

            $send_from = "+447537454577";
            $recipient_phone_numbers = $number; //May be several, separate with a comma `,`.
$message = $text;
// Check recipient_phone_numbers for multiple numbers and make it an array.
if(stristr($recipient_phone_numbers, ',')){
  $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
}else{
  $recipient_phone_numbers = [$recipient_phone_numbers];
}

// Set necessary fields to be JSON encoded
$content = [
  'to' => array_values($recipient_phone_numbers),
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
    // echo $result;
      $update_status = "UPDATE `qrcode` set status= 99 where folder_name ='".$str_arr[0]."'and infilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
      if($conn->query($update_status) === TRUE){
        // <script type="text/javascript" charset="utf-8">
        //  alert("Out QrCode Send Successfully");
        //   window.location.replace('qrcodereader.php');
        //   // setTimeout(function(){
        //   //  window.location.href = 'qrcodereader.php';
        //   //      }, 3000);
        //  </script>
        echo "<script type='text/javascript' charset='utf-8'>";
        echo "alert('Out QrCode Send Successfully');";
        // echo "window.location.replace('qrcodereader.php');";
        echo "setTimeout(function(){ ";
        echo " window.location.href = 'qrcodereader.php';";
         echo "    }, 3000);";
        echo "</script>";
      }else {
      echo "<script type='text/javascript' charset='utf-8'>";
       echo "alert('Out QrCode Send Successfully but Can't able to update in DB Please scan once Again');";
       // echo "window.location.replace('qrcodereader.php');";
       echo "setTimeout(function(){ ";
       echo " window.location.href = 'qrcodereader.php';";
        echo "    }, 3000);";
       echo "</script>";
        // <!-- <script type="text/javascript" charset="utf-8">
        // alert("Out QrCode Send Successfully but Can't able to update in DB Please scan once Again");
        //  window.location.replace('qrcodereader.php');
        //  // setTimeout(function(){
        //  //  window.location.href = 'qrcodereader.php';
        //  //      }, 3000);
        //  </script> -->
      }
}
curl_close($ch);
            // echo $number.$text.$update_status;
        }else if($row['status'] == 99){
          echo "<script type='text/javascript' charset='utf-8'>";
           echo "alert('In Qrcode Is Already Scanned, Please Check Once');";
           echo "window.location.replace('qrcodereader.php');";
           // echo "setTimeout(function(){ ";
           // echo " window.location.href = 'qrcodereader.php';";
           //  echo "    }, 3000);";
           echo "</script>";
         //
         //  <script type="text/javascript" charset="utf-8">
         // alert("In Qrcode Is Already Scanned, Please Check Once");
         // window.location.replace('qrcodereader.php');
         // // setTimeout(function(){
         // //  window.location.href = 'qrcodereader.php';
         // //      }, 3000);
        }else if($row['status'] == 999){
          echo "<script type='text/javascript' charset='utf-8'>";
           echo "alert('In and Out Qrcode are Scanned, Varify Once Again');";
           echo "window.location.replace('qrcodereader.php');";
           // echo "setTimeout(function(){ ";
           // echo " window.location.href = 'qrcodereader.php';";
           //  echo "    }, 3000);";
           echo "</script>";
         //  <script type="text/javascript" charset="utf-8">
         // alert("In and Out Qrcode are Scanned, Varify Once Again");
         // window.location.replace('qrcodereader.php');
         // // setTimeout(function(){
         // //  window.location.href = 'qrcodereader.php';
         // //      }, 3000);
         // </script>
         }break;
      }
}
}else {
$pattern = "/out.png/i";
  if (preg_match($pattern, $str_arr[5])) {
  $selectdata = "SELECT * FROM `qrcode` where folder_name ='".$str_arr[0]."'and outfilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
  $result = $conn->query($selectdata);
  // echo $result->num_rows;
  if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row['status'] == 1){
            echo "<script type='text/javascript' charset='utf-8'>";
           echo "alert('Please Check Scanning OutQrCode Before InQrcode');";
           echo "window.location.replace('qrcodereader.php');";
           // echo "setTimeout(function(){ ";
           // echo " window.location.href = 'qrcodereader.php';";
           //  echo "    }, 3000);";
        echo "</script>";
          } else if($row['status'] == 99){
            $update_status = "UPDATE `qrcode` set status= 999 where folder_name ='".$str_arr[0]."'and outfilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
            if($conn->query($update_status) === TRUE){
              // echo $barcodedata;
              echo "<div id='wrapper'>";
              echo "<div id='container'><h1>";
              echo $barcodedata;
              echo "</h1>";
              echo "</div>";
              echo "</div>";
              echo "<script type='text/javascript' charset='utf-8'>";
             echo "alert('Status updated Successfully');";
             // echo "window.location.replace('qrcodereader.php');";
             echo "setTimeout(function(){ ";
             echo " window.location.href = 'qrcodereader.php';";
              echo "    }, 3000);";
          echo "</script>";
            // <script type="text/javascript" charset="utf-8">
            //    alert("Status updated Successfully");
            //     window.location.replace('qrcodereader.php');
            //     // setTimeout(function(){
            //     //  window.location.href = 'qrcodereader.php';
            //     //      }, 3000);
            //    </script>
            }else {
              echo "<script type='text/javascript' charset='utf-8'>";
             echo "alert('Can't able to Status updated Successfully');";
             // echo "window.location.replace('qrcodereader.php');";
             echo "setTimeout(function(){ ";
             echo " window.location.href = 'qrcodereader.php';";
              echo "    }, 3000);";
          echo "</script>";
              // <script type="text/javascript" charset="utf-8">
              // alert("Can't able to Status updated Successfully");
              //  window.location.replace('qrcodereader.php');
              //  // setTimeout(function(){
              //  //  window.location.href = 'qrcodereader.php';
              //  //      }, 3000);
              //  </script>
            }
          }
          else if($row['status'] == 999){
            echo "<script type='text/javascript' charset='utf-8'>";
           echo "alert('In and Out Qrcode are Scanned, Varify Once Again');";
           echo "window.location.replace('qrcodereader.php');";
           // echo "setTimeout(function(){ ";
           // echo " window.location.href = 'qrcodereader.php';";
           //  echo "    }, 3000);";
        echo "</script>";
           //  <script type="text/javascript" charset="utf-8">
           // alert("In and Out Qrcode are Scanned, Varify Once Again");
           // window.location.replace('qrcodereader.php');
           // // setTimeout(function(){
           // //  window.location.href = 'qrcodereader.php';
           // //      }, 3000);
           // </script>
          }
          break;
        }
      }
}
 }
 // echo "$selectdata";
}
}
 ?>
  </body>
</html>
