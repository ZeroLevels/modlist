<?php

header("Content-Type: text/plain; charset=UTF-8");

if(isset($_GET['request'])) {
	switch($_GET['request']) {
		case "hash":
			if(isset($_GET['version'])) {
				if ($location = getVersion($_GET['version'])) {
					echo md5(outputVersion($_GET['version'], $location));
				}
			} else {
				echo "Version?";
			}
			break;
			
		case "json":
			if(isset($_GET['version'])) {
				if ($location = getVersion($_GET['version'])) {
					echo outputVersion($_GET['version'], $location);
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

function getVersion($version) {
	switch($version) {
		case "1.5.0":
		case "1.5":
		case "1.5.1":
		case "1.5.2":
			return 'list/1.5/1.5.json';
			break;
		case "1.4.7":
		case "1.4.6":
		case "1.4.7_1.4.6":
		case "1.4.6_1.4.7":
			return 'list/1.4/1.4.6_1.4.7.json';
			break;
		case "1.4.5":
		case "1.4.4":
		case "1.4.5_1.4.4":
		case "1.4.4_1.4.5":
			return 'list/1.4/1.4.4_1.4.5.json';
			break;
		case "1.4.2":
			return 'list/1.4/1.4.2.json';
			break;
		default:
			return false;
			break;
	}
}

function outputVersion($versions, $location) {
	if(strpos($versions,'_') !== false) {
		$file = recode(file_get_contents($location));
		$json = json_decode($file);
		$newjson = array();
		foreach($json as &$mod) {
			if(multimatch($versions,$mod->versions))
				$newjson[] = $mod;
		}
		return str_replace('\\/','/',json_encode($newjson));
	} else
		return outputVersionSingle($versions, $location);
}

function multimatch($versions,$verArray) {
	$exversions = explode('_',$versions);
	foreach($exversions as &$currVer) {
		if(in_array($currVer,$verArray))
			return true;
	}
	return false;
}
function outputVersionSingle($version, $location) {
	if($version == "1.5")
		$version = "1.5.0";
	$file = recode(file_get_contents($location));
	$json = json_decode($file);
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
