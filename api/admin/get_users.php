<?php
	defined('AUTH') or die;
	$query = "SELECT username,userType FROM users WHERE userType!='Admin';";
?>
