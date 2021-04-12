<?php
include 'connection.php';
include 'error.php';
include 'session.php';

if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($conn, 'select * from qrcode'); // Get data from Database from demo table


    $delimiter = ",";
    $filename = "QrCode" . date('Ymd') . ".csv"; // Create file name

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('slno','folder_name','text','Qoute','number','path','infilename','outfilename','status','intext','outtext');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){

        $lineData = array($row['slno'],$row['folder_name'],$row['text'],$row['Qoute'],$row['number'],'https://qr-code-event.000webhostapp.com'.str_replace(".","",$row['path']),$row['infilename'],$row['outfilename'],$row['status'],$row['intext'],$row['outtext']);
        fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);

 }else {
   ?><script type="text/javascript" charset="utf-8">
    window.location.replace('home.php');
    </script>
    <?php
 }
}else {
  ?><script type="text/javascript" charset="utf-8">
   window.location.replace('home.php');
   </script>
   <?php
}
?>
