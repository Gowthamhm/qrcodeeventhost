<?php
session_start();
 if (!isset($_SESSION['active_user'])) {
  echo '<script type="text/javascript">';
  echo 'window.location.href="logout.php";';
  echo '</script>';
} else {

}
