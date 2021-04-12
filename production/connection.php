<?php
 $servername = "localhost";
 $username = "u514971509_root";
 $password = "Gowthamhm001@";
 $dbname="u514971509_qrcode";

// $servername ="localhost";
// $username ="root";
// $password ="";
// $dbname ="qrcode";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  ?>
<script type='text/javascript' charset='utf-8'>
alert("Please Contact Admin with Error Message");
window.location.replace('login.php');
</script>
<?php
}else{
// echo "Connected successfully";
}
?>
