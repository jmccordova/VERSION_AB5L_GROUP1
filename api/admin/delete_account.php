<?php
	defined('AUTH') or die;
	$input[] = $_POST['username'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "DELETE FROM users WHERE username = '$input[0]';";
?>
