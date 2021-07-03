<?php
session_start();
include 'connection.php';
include 'error.php';

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $searchUser = "SELECT * FROM `users` WHERE username = '" . $username . "' and password ='" . $password . "'";
  // $searchUser = "SELECT * FROM `USERS` WHERE username = '".$username."' and password ='".$password."'";
  // echo $searchUser;
  $result = $conn->query($searchUser);
  // echo $result;
  if ($result) {
    if ($result->num_rows > 0) {
      // echo "inside if result";
      while ($row = $result->fetch_assoc()) {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        $dbrole = $row['role'];
        // echo $dbusername, $dbpassword;
      }
      if ($username == $dbusername && $password == $dbpassword) {
        $_SESSION['active_user'] = $dbusername;
        $_SESSION['role'] = $dbrole;
?><script type="text/javascript" charset="utf-8">
          alert("Login Successfully ");
          window.location.replace('home.php');
        </script>
      <?php
      } else {
      ?><script type="text/javascript" charset="utf-8">
          // alert("Login Successfully ");
          window.location.replace('login.php');
        </script>
      <?php
      }
    } else {
      ?><script type="text/javascript" charset="utf-8">
        // alert("result is empty");
        window.location.replace("login.php");
      </script>
    <?php
    }
  } else {
    ?><script type="text/javascript" charset="utf-8">
      alert("Please Contact Admin to Register ");
      window.location.replace("login.php");
    </script>
  <?php
  }
} else {
  ?>
  <script type='text/javascript' charset='utf-8'>
    window.location.replace('login.php');
  </script>
<?php
}

?>
