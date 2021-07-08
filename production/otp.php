<?php
include 'connection.php';
include 'error.php';

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

session_start();
if (isset($_POST['reset'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['newpassword']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

  if ($password === $confirmPassword) {
    $searchUser = "SELECT * FROM `users` where username = '" . $username . "' and email_id='" . $email . "';";
    $result = $conn->query($searchUser);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $dbusername = $row['username'];
        $dbemail = $row['email_id'];
        $phone = $row['phone'];
      }
      if ($dbusername == $username && $dbemail == $email) {
        $fourRandomDigit = mt_rand(1000, 9999);
        $_SESSION['otp'] = $fourRandomDigit;
        $_SESSION['forgot_username'] = $username;
        $_SESSION['forgot_email'] = $email;
        $_SESSION['new_password'] = $password;
        $_SESSION['number'] = $phone;
        $account_sid = 'AC11111a46dcd23e4a639e77e6088b32c4';
        $auth_token = '684a02b1ebd99177ea76aaf5afd22cb2';
      $twilio_number = "+17204087706";
      try{
       $client = new Client($account_sid, $auth_token);
       $text= "Verification Message From {company name},\n OTP for reset your password of Username " . $dbusername . " is " . $fourRandomDigit;
      $phone = '+91'.$phone;
      if(strlen($phone) == 13){
        $client->messages->create(
            $phone,
            array(
                'from' => $twilio_number,
                'body' => $text
            )
        );
      }

      // }
    }catch (Exception $e){
      ?><script type="text/javascript" charset="utf-8">
        alert(<?php echo $e;?>);
        alert("Message not send Succusfully");
        window.location.replace('otp.php');
      </script>
      <?php
    }

       ?><script type="text/javascript" charset="utf-8">
            alert("OTP Sent Successfully");
            window.location.replace('otpproccess.php');
          </script>
        <?php
      } else {
        ?><script type="text/javascript" charset="utf-8">
          alert("Check the Username or Email Once");
          window.location.replace('forgot.php');
        </script>
      <?php
      }
    } else {
      ?><script type="text/javascript" charset="utf-8">
        alert("Check the Username or Email Once");
        window.location.replace('forgot.php');
      </script>
    <?php
    }
  } else {
    ?><script type="text/javascript" charset="utf-8">
      alert("Password and Confirm Password are not Equal!");
      window.location.replace('forgot.php');
    </script>
  <?php
  }
} else {
  ?><script type="text/javascript" charset="utf-8">
    window.location.replace('forgot.php');
  </script>
<?php
}
?>
