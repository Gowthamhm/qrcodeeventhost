<?php
// session file to maintain session
session_start();
 if (!isset($_SESSION['active_user']) && !isset($_SESSION['role'])) {
  echo '<script type="text/javascript">';
  echo 'window.location.href="logout.php";';
  echo '</script>';
} else {

}
