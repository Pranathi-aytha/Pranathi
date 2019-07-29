<?php
$cookie_name = $_COOKIE['username'];
echo $cookie_name;
// empty value and expiration one hour before
 setcookie("username", '', time() -(86400 * 30), "/");
header('Location: index.php');
?>




