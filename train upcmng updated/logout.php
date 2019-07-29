<?php
// Deleting a cookie
setcookie("username", "", time()-86400*30);
if($_COOKIE['username']=="")
	header('Location:./index.php');
?>