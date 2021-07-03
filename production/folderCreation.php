<?php
include 'connection.php';
include 'session.php';
include 'error.php';

if (isset($_POST['create'])) {
  $foldername = mysqli_real_escape_string($conn, $_POST['folder']);
  $foldername = str_replace(" ", '-', $foldername);
  $creator = mysqli_real_escape_string($conn, $_POST['username']);
  $date = date("Y-m-d");
  $time = date("h:i:sa");
  // echo $foldername,$creator,$time,$date;
  $checkFolder = "SELECT * FROM `folders` WHERE folder_name='" . $foldername . "'";
  // echo $checkFolder;
  $checkResult = $conn->query($checkFolder);
  if ($checkResult->num_rows > 0) {
    while ($row = $checkResult->fetch_assoc()) {
      $dbcreator = $row['creator'];
      $dbfoldername = $row['folder_name'];
    }
    if ($dbcreator === $creator) {
      $_SESSION['folder_name'] = $foldername;
?><script type="text/javascript" charset="utf-8">
        alert("Already Folder is Created");
        window.location.replace('folder.php');
      </script>
      <?php
    }
  } else {
    $inserNewFolder = "INSERT INTO `folders`(`folder_name`, `creator`, `Date`, `Time`) VALUES ('" . $foldername . "','" . $creator . "','" . $date . "','" . $time . "')";
    // echo $inserNewFolder;
    $path = './resource/' . $foldername;
    // echo $path;
    if ($conn->query($inserNewFolder) === TRUE) {
      if (!file_exists($path)) {
        if (mkdir($path, 0777, true)) {
      ?><script type="text/javascript" charset="utf-8">
            alert("Folder Created Successfully ");
            window.location.replace('home.php');
          </script>
        <?php
        } else {
        ?><script type="text/javascript" charset="utf-8">
            alert("Can't able to Create Folder Successfully ");
            window.location.replace('home.php');
          </script>
        <?php
        }
      } else {
        ?><script type="text/javascript" charset="utf-8">
          alert("Folder Already Present ");
          window.location.replace('folder.php');
        </script>
      <?php
      }
    } else {
      ?><script type="text/javascript" charset="utf-8">
        alert("Can't able to insert into DB");
        window.location.replace('home.php');
      </script>
<?php
    }
  }
} else {
}

?>