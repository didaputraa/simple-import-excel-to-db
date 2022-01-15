<?php
include 'config.php';
$tmp  = [];
$sql = $con->query("SELECT p.*,c.nama as category_name FROM produk p,category c WHERE p.category_id = c.id")or die($con->error);

header('Content-Type:application/json');

while($data = $sql->fetch_object()) {
	$tmp[] = $data;
}
echo json_encode($tmp);