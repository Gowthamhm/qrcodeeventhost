<?php
include 'session.php';
include 'connection.php';
include 'error.php';
include './phpqrcode/qrlib.php';

  $folderName= mysqli_real_escape_string($conn,$_POST['foldername']);
// $create = $_POST['qrcreate'];

    $oText=$_POST['hiddentext'];
    $originText =strval($oText);
    $phoneNumber =mysqli_real_escape_string($conn,$_POST['number']);
    // echo $folderName,$originText,$create,$phoneNumber ;
// echo $_POST['hiddentext'];
// echo $originText;
    // echo $folderName."\n";
    // echo $originText."\n";
//     if (preg_match('/"([^"]+)"/',$originText, $m)) {
//       $qoutedText =$m[1];
//     // print $m[1];
// } else {
// $qoutedText =" ";
// }
// $input = "[modid=256]";
// preg_match('~=(.*?)]~', $input, $output);
// echo $output[1];
if(preg_match('~&quot;(.*?)&quot;~', $originText, $m)){
    // echo  $m[1]."\n";
    $qoutedText =$m[1];
    $qoutedText = str_replace( " ",'_', $qoutedText);
  } else {
    $qoutedText =" ";
  }
    // echo $phoneNumber."\n";

    // echo $qoutedText;
     $path = './resource/'.$folderName;
    // echo $path."\n";
    $infilename = $qoutedText.$phoneNumber."in.png";
    $outfilename = $qoutedText.$phoneNumber."out.png";
    $status = 0;
    $iText ="Welcome".$originText;
    $inText=strval($iText);
    $ouText ="Thank You".$originText;
    $outText=strval($ouText);
    // echo $infilename;
    // echo $outfilename;
    // echo $status;
    // echo $inText;
    // echo $outText;
    $createQr = "INSERT INTO `qrcode`(folder_name, text, Qoute, number, path, infilename , outfilename, status, intext, outtext) VALUES ('".$folderName."','".$originText."','".$qoutedText."','".$phoneNumber."','".$path."','".$infilename."','".$outfilename."',".$status.",'".$inText."',
      '".$outText."');";
    // echo $createQr;
    // echo $conn->query($createQr);

      if($conn->query($createQr) == TRUE){
        if (!file_exists($path)) {
          if (mkdir($path, 0777, true)) {
            $ecc = 'L';
            $pixel_Size = 10;
            QRcode::png($inText,$path.'/'.$infilename, $ecc, $pixel_Size);
            QRcode::png($outText,$path.'/'.$outfilename, $ecc, $pixel_Size);
            ?>
            <script type='text/javascript' charset='utf-8'>
             alert("QrCode Created in Folder Successfully and ");
             // window.location.replace('folder.php');
             </script>
             <?php
          }
        }else {
          $ecc = 'L';
          $pixel_Size = 10;
          QRcode::png($inText,$path.'/'.$infilename, $ecc, $pixel_Size);
          QRcode::png($outText,$path.'/'.$outfilename, $ecc, $pixel_Size);
          ?>
          <script type="text/javascript" charset="utf-8">
           alert("QrCode Create in Folder Successfully without creating folder");
           // window.location.replace('folder.php');
           </script>
           <?php
        }
    }else {
      ?>
<script type='text/javascript' charset='utf-8'>
       alert("Can't able to insert into db");
        // window.location.replace('folder.php');
       </script>
       <?php
    }

?>
