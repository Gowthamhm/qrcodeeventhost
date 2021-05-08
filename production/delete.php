<?php
include 'session.php';
include 'connection.php';
include 'error.php';

if(isset($_POST['delete'])){
  // echo $_POST['foldername'];
  $folder_name=$_POST['foldername'];
//   $checkFolder = "SELECT * FROM `folders` WHERE folder_name='".$folder_name."'";
//   // echo $checkFolder;
//   $checkResult = $conn->query($checkFolder);
//   if ($checkResult->num_rows > 0) {
//     while($row = $checkResult->fetch_assoc()) {
//       $slno = $row['sl_no'];
//   $dbcreator = $row['creator'];
//   $dbfoldername = $row['folder_name'];
//   // echo $slno.$dbcreator.$dbfoldername;
//   }
// }
  $delete = "DELETE from `folders` where folder_name='".$folder_name."';";
  // echo $delete;
   if($conn->query($delete) === TRUE) {
     // echo "Deleted data successfully\n";
     // mysql_close($conn);
     ?>
      <script type="text/javascript" charset="utf-8">
      alert("Data Deleted successfully");
      window.location.replace('home.php');
      // </script>
      <?php
   }else {
     die('Could not delete data: ' . mysql_error());
   }
}else {

}
?>
