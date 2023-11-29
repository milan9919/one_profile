<?php
include("config.php");

$_SESSION['userData'] = '';
$_SESSION['oauth_status'] = '';
unset($_SESSION['userData']);
unset($_SESSION['oauth_status']);

session_destroy();

header('Location: ' . SITE_URL);

?>
