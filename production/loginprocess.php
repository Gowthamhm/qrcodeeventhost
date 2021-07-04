<?php
session_start();
include 'connection.php';
include 'error.php';
// Login db process page
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  // Query string to check the user exists in database or not
  $searchUser = "SELECT * FROM `users` WHERE username = '" . $username . "' and password ='" . $password . "'";
  $result = $conn->query($searchUser);
  if ($result) {
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        $dbrole = $row['role'];
      }
      if ($username == $dbusername && $password == $dbpassword) {
        $_SESSION['active_user'] = $dbusername;
        $_SESSION['role'] = $dbrole;
        ?>
        <script type="text/javascript" charset="utf-8">
          alert("Login Successfully ");
          window.location.replace('home.php');
        </script>
      <?php
      } else {
      ?><script type="text/javascript" charset="utf-8">
      alert("Check User and Password");
          window.location.replace('login.php');
        </script>
      <?php
      }
    } else {
      ?><script type="text/javascript" charset="utf-8">
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
