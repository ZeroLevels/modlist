<?php
/* JSON -> Table Parser Code
 * Written by GrygrFlzr
 */
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

function readJSON() {
	if(!isset($GLOBALS['mods'])) {
		$JSONfile = recode(file_get_contents('../modlist.json'));
		$GLOBALS['mods'] = json_decode($JSONfile);
		$GLOBALS['mods'] = sortAlpha($GLOBALS['mods']);
	}
	return $GLOBALS['mods'];
}

function findVersion($version, $verArray) {
	$found = false;
	$exVer = explode('_',$version);
	foreach($exVer as &$currVersion) {
		if(in_array($currVersion, $verArray)) {
			$found = true;
			break;
		}
	}
	return $found;
}

function sortAlpha($jsonarray) {
	$names = array();
	foreach($jsonarray as &$mod) {
		$names[] = str_replace('[','',
			str_replace(']','',
			strtolower($mod->name . $mod->other)
			));
	}

	array_multisort($names, SORT_ASC, $jsonarray);
	
	return $jsonarray;
}

function apiList($version) {
	if(!isset($GLOBALS['apilist'])) {
		$mods = readJSON();
		$apilist = array(array());
		foreach($mods as &$mod) { //first iteration - grab all APIs
			if(trim($mod->name) != "" && 
				(strpos(strtolower($mod->other), "(api)") !== false ||
				strtolower($mod->other) == "(dependency)" ||
				strpos(trim($mod->name), 'API') !== false) &&
				findVersion($version,$mod->versions)) {
				$currCount = count($apilist);
				$apilist[$currCount]["name"] = trim($mod->name);
				$apilist[$currCount]["link"] = trim($mod->link);
				$apilist[$currCount]["desc"] = trim(strip_tags($mod->desc));
				
				if(strtolower($mod->other) != "(dependency)")
					$apilist[$currCount]["api"] = true;
			}
		}
			
		for($i=0;$i<count($apilist);$i++) { //remove invalid APIs
			if($apilist[$i]["name"] == "")
				unset($apilist[$i]);
		}
		$GLOBALS['apilist'] = $apilist;
	}
	return $GLOBALS['apilist'];
}

function showAPI($version) {
	$apilist = apiList($version);
	$listing = array();
	foreach($apilist as &$api) {
		if(isset($api["api"]) && $api["api"] == true)
			$listing[] = '<a href="'.$api["link"].'" title="'.$api["desc"].'" target="blank">'.$api["name"].'</a>';
	}
	if(empty($listing)) {	//FALLBACK!
		foreach($apilist as &$api) {
			$listing[] = '<a href="'.$api["link"].'" title="'.$api["desc"].'" target="blank">'.$api["name"].'</a>';
		}
	}
	echo implode(' | ', $listing);
}

function beginTable() {
	echo '<th style="min-width:262px">Mod Name<br/><input type="text" id="searchnames" placeholder="Type to search" class="search" /></th>';
	echo '<th style="min-width: 50px; max-width:51px">Info</th>';
	echo '<th>Author<br/><input type="text" id="searchauthors" placeholder="Type to search" class="search" /></th>';
	echo '<th>Availability</th>';
	echo '<th>Compatibility with Forge<br/>'.
		'<select id="searchcompatible" class="search">'.
		'<option value="all">--</option>'.
		'<option value="fc">Forge Compatible</option>'.
		'<option value="fr">Forge Required</option>'.
		'<option value="nfc">Not Forge Compatible</option>'.
		'</select>'.
		'</th>';
}

function jsonTable($version) {
	$mods = readJSON();
	$apilist = apiList($version);
	$modcount = 0;
	foreach($mods as &$mod) { //second iteration - output table
		if(findVersion($version,$mod->versions)) {
			echo '<tr>';
			
			echo '<td><a href="'.
				$mod->link.'" target="blank">'.
				$mod->name.'</a>';
			if($mod->other != "") {
				echo ' '.$mod->other;
			}
			echo '</td>';
			
			$otherDepends = array();
			
			foreach($mod->dependencies as &$dependency) {
				if(strpos($dependency, 'Modloader') !== false || 
				strpos($dependency, 'Forge') !== false) {} else
					$otherDepends[] = $dependency;
			}
			
			echo '<td class="desctt';
			if(count($otherDepends) > 0) {
				echo ' d';
			}
			foreach($mod->dependencies as &$dependency) {
				if(strpos($dependency, 'Modloader') !== false) {
					echo ' ml';
					break;
				} elseif(strpos($dependency, 'Not Forge') !== false) {
					echo ' other';
					break;
				}
			}
			echo '">';
			
			if($mod->desc != "")
				echo '<span class="tt">'.$mod->desc .'</br></br><big class="d bc">Dependencies:</big><ul><li>';
			else
				echo '<span class="tt"><big class="d bc">Dependencies:</big><ul><li>';
			
			$api = implode('</li><li>', $mod->dependencies);
			foreach($apilist as &$currApi) {
				if(stripos($api,'<li>'.$currApi["name"]) !== false) //Avoid collision like Render Player API vs Player API
					$api = str_ireplace('<li>'.$currApi["name"],'<li><a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a>',$api);
				else {
					$api = str_ireplace($currApi["name"].' R','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a> R',$api);
					$api = str_ireplace($currApi["name"].' C','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a> C',$api);
					$api = str_ireplace($currApi["name"].' I','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a> I',$api);
				}
			}
			echo $api;
			
			echo '</li></ul></span></td>';
			
			echo '<td>'.$mod->author.'</td>';
			echo '<td>'.implode(' ',$mod->type).'</td>';
			
			foreach($mod->dependencies as &$compatibility) {
				if(strpos($compatibility, 'Not Forge Compatible') !== false) {
					echo '<td class="nfc">Not Forge Compatible</td>';
					break;
				}
				if(strpos($compatibility, 'Forge Compatible') !== false) {
					echo '<td class="fc">Forge Compatible</td>';
					break;
				}
				if(strpos($compatibility, 'Forge Required') !== false) {
					echo '<td class="fr">Forge Required</td>';
					break;
				}
				echo '<td class="fr"></td>';
			}
			
			echo '</tr>';
			$modcount++;
		}
	}
	
	
	return $modcount;
}
?>