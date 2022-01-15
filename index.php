<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Untitled</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="asset/bundle/style.css" />
	<script src="asset/jquery/jquery-3.4.1.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt-3">
		<div class="row" id="app">
		<?php
		if(isset($_GET['act'])){
			include "module/{$_GET['act']}.php";
		} else {
			include "module/view.php";
		}
		?>
		</div>
	</div>
</body>
</html>
