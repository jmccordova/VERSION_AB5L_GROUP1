<?php
	defined('AUTH') or die;
	$query = "SELECT sender, COUNT(*) as score FROM programs WHERE status='Correct' GROUP BY sender";
?>
