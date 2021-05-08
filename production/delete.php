<?php
include 'session.php';
include 'connection.php';
include 'error.php';

if(isset($_POST['delete'])){
  // echo $_POST['foldername'];
  $delete = "DELETE from `qrcode` where folder_name='". $_POST['foldername']."'";
  $retval = mysql_query( $delete, $conn );

   if(! $retval ) {
      die('Could not delete data: ' . mysql_error());
   }else {
     echo "Deleted data successfully\n";
     mysql_close($conn);
     ?> <script type="text/javascript" charset="utf-8">
      alert("Data Deleted successfully");
      window.location.replace('home.php');
      </script>
      <?php
   }
}else {

}
?>
