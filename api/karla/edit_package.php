<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['name'];
	$input[] = $_POST['cost'];

	if(API::checkEmpty($input)){
		$error = true;
		$error_message = "Request is missing required parameter(s)";
	}else $input = API::sanitize($link,$input);

	$query = "CALL EDIT_PACKAGE('$input[0]','$input[1]');";