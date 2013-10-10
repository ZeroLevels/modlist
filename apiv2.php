<?php

header("Content-Type: application/json; charset=UTF-8");
include('panel/magic.php');

function readJSON() {
	if(!isset($GLOBALS['mods'])) {
		$JSONfile = recode(file_get_contents('resources/data/modlist.json'));
		$GLOBALS['mods'] = sortAlpha(json_decode($JSONfile));
	}
	return $GLOBALS['mods'];
}

function filtersort($data) {
	return PREG_REPLACE("/[^0-9a-zA-Z]/i", '', $data);
}

function sortAlpha($jsonarray) {
	$names = array();
	$others = array();
	foreach($jsonarray as &$mod) {
		$names[] = filtersort(
			strtolower($mod->name)
			);
		if(isset($mod->other))
			$others[] = filtersort(
				strtolower($mod->other)
				);
		else
			$others[] = '';
	}

	array_multisort($names, SORT_ASC, $others, SORT_ASC, $jsonarray);
	
	return $jsonarray;
}

if(isset($_GET['key']) && $_GET['key'] != "") {
	if(accessAPI($_GET['key'])) {
		if(isset($_GET['request']) && $_GET['request'] != "") {
			switch($_GET['request']) {
				case "hash":
					if(isset($_GET['version'])) {
						if ($file = outputVersion($_GET['version'])) {
							echo md5($file);
						}
					} else {
						echo '{"name":"400","link":"","desc":"No version has been requested","author":["GrygrFlzr"],"type":[],"dependencies":["version"],"versions":[]}';
					}
					break;
					
				case "json":
					if(isset($_GET['version'])) {
						if ($file = outputVersion($_GET['version'])) {
							echo $file;
						}
					} else {
						echo '{"name":"400","link":"","desc":"No version has been requested","author":["GrygrFlzr"],"type":[],"dependencies":["version"],"versions":[]}';
					}
					break;

				default:
					echo '{"name":"401","link":"","desc":"The request does not exist","author":["GrygrFlzr"],"type":[],"dependencies":["request"],"versions":[]}';
					break;
			}
		} else {
			echo '{"name":"402","link":"","desc":"A request is needed","author":["GrygrFlzr"],"type":[],"dependencies":["request"],"versions":[]}';
		}
	} else {
		echo '{"name":"403","link":"","desc":"Your API Key is invalid or has been removed","author":["GrygrFlzr"],"type":[],"dependencies":["API key"],"versions":[]}';
	}
} else {
	echo '{"name":"404","link":"","desc":"An API Key is required to access the database","author":["GrygrFlzr"],"type":[],"dependencies":["API key"],"versions":[]}';
}

function outputVersion($versions) {
	if(strpos($versions,'_') !== false) {
		$json = readJSON();
		$newjson = array();
		foreach($json as &$mod) {
			if(multimatch($versions,$mod->versions))
				$newjson[] = $mod;
		}
		return json_encode($newjson,JSON_UNESCAPED_SLASHES);
	} else
		return outputVersionSingle($versions);
}

function multimatch($versions,$verArray) {
	$exversions = explode('_',$versions);
	foreach($exversions as &$currVer) {
		if(in_array($currVer,$verArray) || $currVer == "all")
			return true;
	}
	return false;
}
function outputVersionSingle($version) {
	if($version == "1.5")
		$version = "1.5.0";
	$json = readJSON();
	if($version != "all") {
		$newjson = array();
		foreach($json as &$mod) {
			if(in_array($version,$mod->versions))
				$newjson[] = $mod;
		}
		return json_encode($newjson,JSON_UNESCAPED_SLASHES);
	}
	return json_encode($json,JSON_UNESCAPED_SLASHES);
}

function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}
?>
