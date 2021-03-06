<?php
include 'connection.php';
include 'error.php';
include 'session.php';

if (isset($_GET['export'])) {
  if ($_GET['export'] == 'true') {
    $query = mysqli_query($conn, 'select * from qrcode'); // Get data from Database from demo table


    $delimiter = ",";
    $filename = "QrCode" . date('Ymd') . ".csv"; // Create file name

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('slno', 'folder_name', 'text', 'Qoute', 'number', 'path', 'infilename', 'outfilename', 'status', 'intext', 'outtext', 'inqrcodeurl', 'outqrcodeurl');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while ($row = $query->fetch_assoc()) {
      if ($row['status'] == 0) {
        $status = 'Not Shared Yet';
      } else if ($row['status'] == 1) {
        $status = 'In QrCode Shared';
      } else if ($row['status'] == 99) {
        $status = 'Out QrCode Shared';
      } else if ($row['status'] == 999) {
        $status = 'All Done';
      } else {
      $status = 'No Status';
      }
      $lineData = array($row['slno'], $row['folder_name'], $row['text'], $row['Qoute'], $row['number'], 'https://sample-wesite-hosting.online' . str_replace(".", "", $row['path']), $row['infilename'], $row['outfilename'],
       $status, $row['intext'], $row['outtext'], 'https://sample-wesite-hosting.online' . str_replace(".", "", $row['path']) . '/' . $row['infilename'], 'https://sample-wesite-hosting.online' . str_replace(".", "", $row['path']) . '/' . $row['outfilename']);
      fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
  } else {
?><script type="text/javascript" charset="utf-8">
      window.location.replace('home.php');
    </script>
  <?php
  }
} else {
  ?><script type="text/javascript" charset="utf-8">
    window.location.replace('home.php');
  </script>
<?php
}
?>
