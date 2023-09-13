<?php
session_start();
$_SESSION["session_username"] = "";
$_SESSION["session_password"] = "";

$cookieName = "cookie_username";
$cookieValue = "";
$cookieTime = time() - (60 * 60);
setcookie($cookieName, $cookieValue, $cookieTime, "/");

$cookieName = "cookie_password";
$cookieValue = "";
$cookieTime = time() - (60 * 60);
setcookie($cookieName, $cookieValue, $cookieTime, "/");
session_destroy();
header("location: ../index.php");

?>