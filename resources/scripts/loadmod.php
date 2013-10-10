<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/tablegen.php');
header("Content-Type: application/json; charset=UTF-8");

if(!isset($_GET['name']) || !isset($_GET['author']))
	echo "[]";
else {
	$name = $_GET['name'];
	$author = $_GET['author'];
	echo json_encode(loadMod($name,$author),JSON_UNESCAPED_SLASHES);
}