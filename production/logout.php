<?php
session_start();

// Unset all of the session variables
// 
$_SESSION = array();

unset($_SESSION);
session_unset();
session_destroy();
echo '<script type="text/javascript">';
echo 'window.location.href="login.php";';
echo '</script>';
exit;
