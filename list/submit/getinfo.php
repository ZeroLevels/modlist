<?php
header("Content-Type: application/json; charset=UTF-8");
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

function readJSON() {
	if(!isset($GLOBALS['mods'])) {
		$JSONfile = recode(file_get_contents('../modlist.json'));
		$GLOBALS['mods'] = json_decode($JSONfile);
	}
	return $GLOBALS['mods'];
}

function findModFromName($name) {
	$mods = readJSON();
	$match = false;
	foreach ($mods as &$mod) {
		if(strtolower($mod->name) == trim(strtolower($name))) {
			return json_encode($mod);
			$match = true;
			break;
		}
	}
	if(!$match) {
		return json_encode(false);
	}
}

function checkAuthor($name) {
	$namelist = explode(',',$name);
	$mods = readJSON();
	$authorList = array();
	foreach($namelist as &$currName) {
		$break = false;
		$currName = trim($currName);
		foreach ($mods as &$mod) {
			foreach($mod->author as &$currAuthor) {
				if(strtolower($currAuthor) == strtolower($currName)) {
					$authorList[] = $currAuthor;
					$break = true;
					break;
				}
				if($break)
					break;
			}
			if($break)
				break;
		}
		if(empty($authorList)) {
			return json_encode(false);
		}
	}
	return json_encode(implode(', ',$authorList));
}

if(isset($_GET['request']) && isset($_GET['value'])) {
	switch($_GET['request']) {
		case "name":
			echo findModFromName(urldecode($_GET['value']));
			break;
		case "author":
			echo checkAuthor(urldecode($_GET['value']));
			break;
	}
}
?>