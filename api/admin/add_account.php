<?php
	defined('AUTH') or die;
	$input[] = $_POST['username'];
	$input[] = $_POST['password'];
	$input[] = $_POST['role'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "INSERT INTO users VALUES('$input[0]',MD5('$input[1]'),'$input[2]');";
?>
