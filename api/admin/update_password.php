<?php
	defined('AUTH') or die;

	$input[] = $_POST['username'];
	$input[] = $_POST['password'];
	$check = true;

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "UPDATE users SET password = MD5('$input[1]') WHERE username = '$input[0]';";
?>
