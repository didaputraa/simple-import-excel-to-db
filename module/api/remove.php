<?php
include 'config.php';

$con->query("DELETE FROM produk WHERE id='$_GET[id]'");