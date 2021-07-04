<?php
include 'session.php';
include 'connection.php';
include 'error.php';

if (isset($_POST['delete'])) {
  // echo $_POST['foldername'];
  $folder_name = $_POST['foldername'];
  $deletefolder = "DELETE from `folders` where folder_name='" . $folder_name . "'";
  // echo $delete;
  $deleteqrcode = "DELETE from `qrcode` where folder_name='" . $folder_name . "'";
  if ($conn->query($deletefolder) === TRUE) {
    if ($conn->query($deleteqrcode) === TRUE) {
      // echo "Deleted data successfully\n";
      // mysql_close($conn);
?>
      <script type="text/javascript" charset="utf-8">
        alert("Folder and qrcode Deleted successfully");
        window.location.replace('home.php');
        // 
      </script>
<?php
    }
  } else {
    // die('Could not delete data: ' . mysql_error());
    echo "<script type='text/javascript' charset='utf-8'>";
    echo " alert('Folder Not Deleted successfully');";
    echo "window.location.replace('folder.php');";
    echo " </script>";
  }
} else {
}
?>