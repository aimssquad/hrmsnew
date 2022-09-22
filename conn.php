<?php
	//$conn = new mysqli('10.128.0.9', 'abbas', 'Abbas@1995', 'hrms');
	$conn = new mysqli('localhost', 'root', '', 'hrms');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>
