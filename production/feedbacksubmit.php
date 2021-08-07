<?php
include 'connection.php';
include 'error.php';
// feedback db process page
if (isset($_POST['feedback'])) {
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $rating = mysqli_real_escape_string($conn, $_POST['rating']);
  $feedback = mysqli_real_escape_string($conn, $_POST['text']);
  $eventname = mysqli_real_escape_string($conn, $_POST['event']);
  $fileURL = mysqli_real_escape_string($conn, $_POST['links']);
  //   echo $firstname,$lastname,$email,$phone,$rating,$feedback;
  if (preg_match('/^\d{10}$/', $phone)) {
    $feedback = "INSERT INTO `feedback`(firstname,lastname,email,rating,feedback,phone,eventname,fileURL) VALUES
    ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $rating . "','" . $feedback . "','" . $phone . "','" . $eventname . "','" . $fileURL . "');";
    if ($conn->query($feedback) == TRUE) {
    ?>
      <script type="text/javascript" charset="utf-8">
        alert("FeedBack Submited");
        window.location.replace('feedbacksuccus.php');
      </script>
    <?php
    } else {
    ?>
      <script type="text/javascript" charset="utf-8">
        alert("FeedBack not Submited");
        window.location.replace('feedback.php');
      </script>
    <?php
    }
  } else {
    ?>
    <script type="text/javascript" charset="utf-8">
      alert("FeedBack not Submited, Please select a Valid Number. Contact number length should be 10 ");
      window.location.replace('feedback.php');
    </script>
  <?php
  }
} else {
  ?>
  <script type="text/javascript" charset="utf-8">
    alert("number is invalid");
    window.location.replace('feedback.php');
  </script>
<?php
}
