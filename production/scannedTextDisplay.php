<?php
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

include 'session.php';
include 'connection.php';
include 'error.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  if (isset($_POST['submit'])) {
    $barcodedata = $_POST['qrcode'];
    // print_r($barcodedata);
  // echo $barcodedata;
  $str_arr = explode("@#", $barcodedata);
  if (empty($str_arr[1])) {
    echo "<script type='text/javascript' charset='utf-8'>";
    echo "alert('This QrCode not Created by Our User Please varify');";
    echo "window.location.replace('qrcodereader.php');";
    echo "</script>";
  }else {
    $pattern = "/in.png/i";
    if (preg_match($pattern,$str_arr[5])) {
      $selectdata = "SELECT * FROM `qrcode` where folder_name ='" . $str_arr[0] . "'and infilename ='" . $str_arr['5'] . "' and number='" . $str_arr[6] . "'";
      $result = $conn->query($selectdata);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          if ($row['status'] == 1) {
            echo "<div id='wrapper'>";
            echo "<div id='container'><h1>";
            echo $str_arr[3];
            echo "</h1></div></div>";
            $number = "+91" . $row['number'];
            $text = "https://sample-wesite-hosting.online/production" . str_replace(".", '', $row['path']) . "/" . $row['outfilename'];
            // Your Account SID and Auth Token from twilio.com/console
            $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
            $auth_token = '6d63020664652b272bbc8dd1027a76b7';
            $twilio_number = "+17204087706";
            try {
              $client = new Client($account_sid, $auth_token);
              $client->messages->create(
                // Where to send a text message (your cell phone?)
                $number,
                array(
                  'from' => $twilio_number,
                  'body' => $text
                )
              );
              $update_status = "UPDATE `qrcode` set status= 99 where folder_name ='" . $str_arr[0] . "'and infilename ='" . $str_arr['5'] . "' and number='" . $str_arr[6] . "'";
              if ($conn->query($update_status) === TRUE) {
                $scannedinfo = "INSERT into `qrscannedinfo`(time,scannedby,folder_name,filename) values('" . time() . "','" . $_SESSION['active_user'] . "','" . $str_arr[0] . "','" . $str_arr['5'] . "');";
                if ($conn->query($scannedinfo) == TRUE) {
                  echo "<script type='text/javascript' charset='utf-8'>";
                  echo "alert('Out QrCode Send Successfully and info stored');";
                  echo "setTimeout(function(){ ";
                  echo " window.location.href = 'qrcodereader.php';";
                  echo "    }, 30000);";
                  echo "</script>";
                }else{
                  echo "<script type='text/javascript' charset='utf-8'>";
                  echo "alert('Out QrCode Send Successfully and info not stored');";
                  echo "setTimeout(function(){ ";
                  echo " window.location.href = 'qrcodereader.php';";
                  echo "    }, 30000);";
                  echo "</script>";                        
                }
              }else{
                echo "<script type='text/javascript' charset='utf-8'>";
                echo "alert('Out QrCode Send Successfully but Can't able to update in DB Please scan once Again');";
                echo "setTimeout(function(){ ";
                echo " window.location.href = 'qrcodereader.php';";
                echo "    }, 30000);";
                echo "</script>";
              }
            } catch (Exception $e){
              echo "<script type='text/javascript' charset='utf-8'>";
              echo "alert('Out QrCode Not Send Successfully, Please Scan Once Again');";
              echo "setTimeout(function(){ ";
              echo " window.location.href = 'qrcodereader.php';";
              echo "    }, 30000);";
              echo "</script>";
            }
          }
          else {
            echo "<script type='text/javascript' charset='utf-8'>";
            echo "alert('InQrCode Already Scanned if not contact Admin');";
            echo "setTimeout(function(){ ";
            echo " window.location.href = 'qrcodereader.php';";
            echo "    }, 0000);";
            echo "</script>";
          }
        }
      }else {
        echo "<script type='text/javascript' charset='utf-8'>";
        echo "alert('The QrCode not created by the System check once');";
        echo "setTimeout(function(){ ";
        echo " window.location.href = 'qrcodereader.php';";
        echo "    }, 0000);";
        echo "</script>";
      }
    } else {
      $pattern = "/out.png/i";
    if (preg_match($pattern,$str_arr[5])){
        // print_r($str_arr);
        $selectdata = "SELECT * FROM `qrcode` where folder_name ='" . $str_arr[0] . "'and outfilename ='" . $str_arr['5'] . "' and number='" . $str_arr[6] . "'";
        $result = $conn->query($selectdata);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($row['status'] == 99) {
              echo "<div id='wrapper'>";
              echo "<div id='container'><h1>";
              echo $str_arr[3];
              echo "</h1></div></div>";
              try {
                $update_status = "UPDATE `qrcode` set status= 999 where folder_name ='" . $str_arr[0] . "'and outfilename ='" . $str_arr['5'] . "' and number='" . $str_arr[6] . "'";
                if ($conn->query($update_status) === TRUE) {
                  $scannedinfo = "INSERT into `qrscannedinfo`(time,scannedby,folder_name,filename) values('" . time() . "','" . $_SESSION['active_user'] . "','" . $str_arr[0] . "','" . $str_arr['5'] . "');";
                  if ($conn->query($scannedinfo) == TRUE) {
                    echo "<script type='text/javascript' charset='utf-8'>";
                    echo "alert('Out QrCode Scanned Successfully and info stored');";
                    echo "setTimeout(function(){ ";
                    echo " window.location.href = 'qrcodereader.php';";
                    echo "    }, 30000);";
                    echo "</script>";
                  } else {
                    echo "<script type='text/javascript' charset='utf-8'>";
                    echo "alert('Out QrCode Scanned Successfully and info not stored');";
                    echo "setTimeout(function(){ ";
                    echo " window.location.href = 'qrcodereader.php';";
                    echo "    }, 30000);";
                    echo "</script>";
                  }
                } else {
                  echo "<script type='text/javascript' charset='utf-8'>";
                  echo "alert('Out QrCode Scanned Successfully but Can't able to update in DB Please scan once Again');";
                  echo "setTimeout(function(){ ";
                  echo " window.location.href = 'qrcodereader.php';";
                  echo "    }, 30000);";
                  echo "</script>";
                }
              } catch (Exception $e) {
                echo "<script type='text/javascript' charset='utf-8'>";
                echo "alert('Out QrCode Not Scanned Successfully, Please Scan Once Again');";
                echo "setTimeout(function(){ ";
                echo " window.location.href = 'qrcodereader.php';";
                echo "    }, 30000);";
                echo "</script>";
              }
            } else {
              echo "<script type='text/javascript' charset='utf-8'>";
              echo "alert('OutQrCode Already Scanned if not contact Admin');";
              echo "setTimeout(function(){ ";
              echo " window.location.href = 'qrcodereader.php';";
              echo "    }, 0000);";
              echo "</script>";
            }
          }
        } else {
          echo "<script type='text/javascript' charset='utf-8'>";
          echo "alert('The QrCode not created by the System check once');";
          echo "setTimeout(function(){ ";
          echo " window.location.href = 'qrcodereader.php';";
          echo "    }, 0000);";
          echo "</script>";
        }
      }else {
        echo "<script type='text/javascript' charset='utf-8'>";
        echo "alert('The QrCode not created by the System check once');";
        echo "setTimeout(function(){ ";
        echo " window.location.href = 'qrcodereader.php';";
        echo "    }, 0000);";
        echo "</script>";
      }
    }
    // echo "<script type='text/javascript' charset='utf-8'>";
    // // echo "alert('The QrCode not created by the System check once');";
    // echo "setTimeout(function(){ ";
    // echo " window.location.href = 'qrcodereader.php';";
    // echo "    }, 0000);";
    // echo "</script>";
  }
  // echo "<script type='text/javascript' charset='utf-8'>";
  // // echo "alert('The QrCode not created by the System check once');";
  // echo "setTimeout(function(){ ";
  // echo " window.location.href = 'qrcodereader.php';";
  // echo "    }, 0000);";
  // echo "</script>"; 
}else {
  echo "<script type='text/javascript' charset='utf-8'>";
  echo "alert('The QrCode not created by the System check once');";
  echo "setTimeout(function(){ ";
  echo " window.location.href = 'qrcodereader.php';";
  echo "    }, 0000);";
  echo "</script>";
}
?>
</body>

</html>