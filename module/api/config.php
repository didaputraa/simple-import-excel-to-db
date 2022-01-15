<?php
try {
	
	$con = new mysqli('localhost', 'root', '', 'testing_native1');

	if ($con->connect_error) {
		
		throw new Exception($con->error);
	}
	
} catch (Exception $e) {
	
	exit($e->getMessage());
}