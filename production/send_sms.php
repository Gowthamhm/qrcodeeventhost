<?php

if (isset($_POST['sendsms'])) {
  echo $_POST['numbers'];
  echo $_POST['text'];
}
?>
