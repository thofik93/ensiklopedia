<?php
	require_once 'config.php';
	
	$conn = mysqli_connect($host, $user, $pass, $db);
	if (mysqli_connect_error()) {
		die('Failed Connect To Database ' . mysqli_error());
	}

?>
