<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/tablegen.php');
header("Content-Type: application/json; charset=UTF-8");

if(!isset($_GET['q']))
	echo "[]";
else {
	$query = $_GET['q'];
	echo json_encode(listAllMods($query));
}