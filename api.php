<?php

header("Content-Type: application/json; charset=UTF-8");
include('panel/magic.php');

function readJSON() {
	if(!isset($GLOBALS['mods'])) {
		$JSONfile = recode(file_get_contents('list/modlist.json'));
		$GLOBALS['mods'] = sortAlpha(json_decode($JSONfile));
	}
	return $GLOBALS['mods'];
}

function sortAlpha($jsonarray) {
	$names = array();
	$others = array();
	foreach($jsonarray as &$mod) {
		$names[] = str_replace('[','',
			str_replace(']','',
			str_replace('(','',
			str_replace(')','',
			strtolower($mod->name)
			))));
		if(isset($mod->other))
			$others[] = str_replace('[','',
				str_replace(']','',
				str_replace('(','',
				str_replace(')','',
				strtolower($mod->other)
				))));
		else
			$others[] = '';
	}

	array_multisort($names, SORT_ASC, $others, SORT_ASC, $jsonarray);
	
	return $jsonarray;
}

function parseAuthors($authors) {
	switch(count($authors)) {
		case 1:
			return $authors[0];
			break;
		case 2:
			return $authors[0] . ' and ' . $authors[1];
			break;
		default:
			$last = $authors[count($authors)-1];
			unset($authors[count($authors)-1]);
			return implode(', ', $authors) . ' and ' . $last;
	}
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
						echo '{"name":"400","other":"","link":"","desc":"No version has been requested","author":"GrygrFlzr","type":[],"dependencies":["version"],"versions":[]}';
					}
					break;
					
				case "json":
					if(isset($_GET['version'])) {
						if ($file = outputVersion($_GET['version'])) {
							echo $file;
						}
					} else {
						echo '{"name":"400","other":"","link":"","desc":"No version has been requested","author":"GrygrFlzr","type":[],"dependencies":["version"],"versions":[]}';
					}
					break;

				default:
					echo '{"name":"401","other":"","link":"","desc":"The request does not exist","author":"GrygrFlzr","type":[],"dependencies":["request"],"versions":[]}';
					break;
			}
		} else {
			echo '{"name":"402","other":"","link":"","desc":"A request is needed","author":"GrygrFlzr","type":[],"dependencies":["request"],"versions":[]}';
		}
	} else {
		echo '{"name":"403","other":"","link":"","desc":"Your API Key is invalid or has been removed","author":"GrygrFlzr","type":[],"dependencies":["API key"],"versions":[]}';
	}
} else {
	echo '{"name":"404","other":"","link":"","desc":"An API Key is required to access the database","author":"GrygrFlzr","type":[],"dependencies":["API key"],"versions":[]}';
}

function outputVersion($versions) {
	if(strpos($versions,'_') !== false) {
		$json = readJSON();
		$newjson = array();
		foreach($json as &$mod) {
			$mod->author = parseAuthors($mod->author);
			if(multimatch($versions,$mod->versions)) {
				if(!isset($mod->other)) {
					$newmod->name = $mod->name;
					$newmod->other = "";
					unset($mod->name);
					unset($mod->other);
					$mod = (object) array_merge((array) $newmod, (array) $mod);
					if(isset($mod->source))
						unset($mod->source);
				}
				$newjson[] = $mod;
			}
		}
		return str_replace('\\/','/',json_encode($newjson));
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
			$mod->author = parseAuthors($mod->author);
			if(in_array($version,$mod->versions)) {
				if(!isset($mod->other)) {
					$newmod = new stdClass();
					$newmod->name = $mod->name;
					$newmod->other = "";
					unset($mod->name);
					unset($mod->other);
					$mod = (object) array_merge((array) $newmod, (array) $mod);
					if(isset($mod->source))
						unset($mod->source);
				}
				$newjson[] = $mod;
			}
		}
		return str_replace('\\/','/',json_encode($newjson));
	}
	foreach($json as &$mod) {
		$mod->author = parseAuthors($mod->author);
		if(!isset($mod->other)) {
			$newmod = new stdClass();
			$newmod->name = $mod->name;
			$newmod->other = "";
			unset($mod->name);
			unset($mod->other);
			$mod = (object) array_merge((array) $newmod, (array) $mod);
			if(isset($mod->source))
				unset($mod->source);
		}
		$newjson[] = $mod;
	}
	return str_replace('\\/','/',json_encode($newjson));
}

function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}
?>
