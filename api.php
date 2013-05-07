<?php

header("Content-Type: text/plain; charset=UTF-8");

function readJSON() {
	if(!isset($GLOBALS['mods'])) {
		$JSONfile = recode(file_get_contents('list/modlist.json'));
		$GLOBALS['mods'] = json_decode($JSONfile);
	}
	return $GLOBALS['mods'];
}

if(isset($_GET['request'])) {
	switch($_GET['request']) {
		case "hash":
			if(isset($_GET['version'])) {
				if ($file = outputVersion($_GET['version'])) {
					echo md5($file);
				}
			} else {
				echo "Version?";
			}
			break;
			
		case "json":
			if(isset($_GET['version'])) {
				if ($file = outputVersion($_GET['version'])) {
					echo $file;
				}
			} else {
				echo "Version?";
			}
			break;

		default:
			echo "Non-existent request";
			break;
	}
} else {
	echo "No request?";
}

function outputVersion($versions) {
	if(strpos($versions,'_') !== false) {
		$json = readJSON();
		$newjson = array();
		foreach($json as &$mod) {
			if(multimatch($versions,$mod->versions))
				$newjson[] = $mod;
		}
		return str_replace('\\/','/',json_encode($newjson));
	} else
		return outputVersionSingle($versions);
}

function multimatch($versions,$verArray) {
	$exversions = explode('_',$versions);
	foreach($exversions as &$currVer) {
		if(in_array($currVer,$verArray))
			return true;
	}
	return false;
}
function outputVersionSingle($version) {
	if($version == "1.5")
		$version = "1.5.0";
	$json = readJSON();
	$newjson = array();
	foreach($json as &$mod) {
		if(in_array($version,$mod->versions))
			$newjson[] = $mod;
	}
	return str_replace('\\/','/',json_encode($newjson));
}

function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}
?>
