<?php
include 'session.php';
include 'connection.php';
include 'error.php';

if(isset($_POST['submit'])){
  $barcodedate = $_POST['qrcode'];
  echo "<div id='wrapper'>";
echo "<div id='container'><h1>";
$str_arr = explode ("@#", $barcodedate);
print_r($str_arr);
if (empty($str_arr[1])) {
// echo " array has only one element";
?><script type="text/javascript" charset="utf-8">
 alert("This QrCode not Created by Our User Please varify");
 window.location.replace('qrcodereader.php');
 </script>
 <?php
}else {
  // echo "array has more than one element";
  $pattern = in.png;
  if (preg_match($pattern, $str_arr[5])) {
  $selectdata = "SELECT * FROM `qrcode` where folder_name ='".$str_arr[0]."'and infilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
}else {
  $pattern = out.png;
    if (preg_match($pattern, $str_arr[5])) {
    $selectdata = "SELECT * FROM `qrcode` where folder_name ='".$str_arr[0]."'and outfilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
}
}

  echo $selectdata;
  $result = $conn->query($selectdata);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  // echo "Inside while";
  if($row['status'] == 1){
    // echo "status is changing";
    $number = "+91".$row['number'];
    $text = "https://sample-wesite-hosting.online/production".str_replace( ".",'', $row['path'])."/".$row['outfilename'];
    echo $number;
    echo $text;
    $update_status = "UPDATE `qrcode` set status= 99 where folder_name ='".$str_arr[0]."'and infilename ='".$str_arr[5]."' and number='".$str_arr[6]."'";
  }else if ($row['status'] == 99) {
    ?><script type="text/javascript" charset="utf-8">
     alert("In QrCode Already Scanned Please Contact Admin");
     window.location.replace('qrcodereader.php');
     </script>
     <?php
  }else if ($row['status'] == 999) {
    ?><script type="text/javascript" charset="utf-8">
     alert("Out QrCode Already Scanned Please Contact Admin");
     window.location.replace('qrcodereader.php');
     </script>
     <?php
  } else{
    echo "status is not changing";
  }
    }
  }else {
    echo "This is Not Generated by Our Users";
  }
}
echo "</h1>";
  echo "</div>";
echo "</div>";
echo "<script>";
// echo "setTimeout(function(){";
  // echo "window.location.href = 'qrcodereader.php';";
    // echo " }, 30000);";
    // echo " }, 30);";
echo "</script>";
}else {

}
?>
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
