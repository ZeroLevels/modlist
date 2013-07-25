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
		$GLOBALS['mods'] = sortAlpha(json_decode($JSONfile));
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

function apiList($version) {
	if(!isset($GLOBALS['apilist'])) {
		$mods = readJSON();
		$apilist = array(array());
		foreach($mods as &$mod) { //first iteration - grab all APIs
			if(trim($mod->name) != "" &&
				findVersion($version,$mod->versions) &&
				(strpos(trim($mod->name), 'API') !== false ||
					(isset($mod->other) &&
						(strpos(strtolower($mod->other), "(api)") !== false ||
						strtolower($mod->other) == "(dependency)")
					)
				)
			) {
				$currCount = count($apilist);
				$apilist[$currCount]["name"] = trim($mod->name);
				$apilist[$currCount]["link"] = trim($mod->link);
				$apilist[$currCount]["desc"] = trim(strip_tags($mod->desc));
				
				if(!isset($mod->other) || (isset($mod->other) && strtolower($mod->other) != "(dependency)"))
					$apilist[$currCount]["api"] = true;
			}
		}
			
		for($i=0;$i<count($apilist);$i++) { //remove invalid APIs
			if(isset($apilist[$i]["name"]) && $apilist[$i]["name"] == "")
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

function supportedCheck($version) {
	$supported[] = '1.6.2';
	$supported[] = '1.6.1';
	$supported[] = '1.5.2';
	if(in_array($version,$supported))
		include '../supported.php';
	else
		include '../oldversion.php';
}

function listVersion($version) {
	echo '<table class="listnav nav major">';
	echo '<thead>';
	echo '<th colspan="4" style="color: black">List Version Navigation</th>';
	echo '</thead>';
	echo '<tbody>';
	echo '<tr class="c">';
	
	if(floatval($version) == 1.3)
		echo '<td class="h">1.3</td>';
	else
		echo '<td class="nh" onclick="window.location.href=\'../1.3/\'"><a href="../1.3/">1.3</a></td>';
	
	if(floatval($version) == 1.4)
		echo '<td class="h">1.4</td>';
	else
		echo '<td class="nh" onclick="window.location.href=\'../1.4/\'"><a href="../1.4/">1.4</a></td>';
	
	if(floatval($version) == 1.5)
		echo '<td class="h">1.5</td>';
	else
		echo '<td class="nh" onclick="window.location.href=\'../1.5/\'"><a href="../1.5/">1.5</a></td>';
	
	if(floatval($version) == 1.6)
		echo '<td class="h">1.6</td>';
	else
		echo '<td class="nh" onclick="window.location.href=\'../1.6/\'"><a href="../1.6/">1.6</a></td>';
	
	echo '</tr>';
	echo '</tbody>';
	echo '</table>';
	
	echo '<table class="minor listnav nav">';
	echo '<tr>';
	switch(floatval($version)) {
		case 1.3:
			if($version == "1.3.2")
				echo '<td class="h">1.3.2</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.3.2.php\'"><a href="1.3.2.php">1.3.2</a></td>';
			break;
		case 1.4:
			if($version == "1.4.2")
				echo '<td class="h">1.4.2</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.4.2.php\'"><a href="1.4.2.php">1.4.2</a></td>';
			
			if($version == "1.4.4_1.4.5")
				echo '<td class="h">1.4.4/1.4.5</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.4.4_1.4.5.php\'"><a href="1.4.4_1.4.5.php">1.4.4/1.4.5</a></td>';
			
			if($version == "1.4.6_1.4.7")
				echo '<td class="h">1.4.6/1.4.7</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.4.6_1.4.7.php\'"><a href="1.4.6_1.4.7.php">1.4.6/1.4.7</a></td>';
			break;
		case 1.5:
			if($version == "1.5.0")
				echo '<td class="h">1.5.0</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.5.0.php\'"><a href="1.5.0.php">1.5.0</a></td>';
			
			if($version == "1.5.1")
				echo '<td class="h">1.5.1</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.5.1.php\'"><a href="1.5.1.php">1.5.1</a></td>';
			
			if($version == "1.5.2")
				echo '<td class="h">1.5.2</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.5.2.php\'"><a href="1.5.2.php">1.5.2</a></td>';
			break;
		case 1.6:
			if($version == "1.6.1")
				echo '<td class="h">1.6.1</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.6.1.php\'"><a href="1.6.1.php">1.6.1</a></td>';
			
			if($version == "1.6.2")
				echo '<td class="h">1.6.2</td>';
			else
				echo '<td class="nh" onclick="window.location.href=\'1.6.2.php\'"><a href="1.6.2.php">1.6.2</a></td>';
			break;
	}
	echo '</tr>';
	echo '</table>';
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

function parseAuthors($authors) {
	switch(count($authors)) {
		case 1:
			return $authors[0];
			break;
		case 2:
			return $authors[0] . ' and ' . $authors[1];
			break;
		default:
			return $authors[0] . ' and ' . (count($authors)-1) . ' more...';
	}
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
			if(isset($mod->other) && $mod->other != "") {
				echo ' '.$mod->other;
			}
			if(isset($mod->source) && $mod->source != "") {
				echo '<a href="'.$mod->source.'" target="blank"><img class="opensource" src="../../resources/images/opensource.png" alt="(Open Source)" title="Open Source Mod" /></a>';
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
					echo ' d';
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
				if(isset($currApi["name"]) && stripos($api,'<li>'.$currApi["name"]) !== false) //Avoid collision like Render Player API vs Player API
					$api = str_ireplace('<li>'.$currApi["name"],'<li><a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a>',$api);
				else {
					if(isset($currApi["name"])) {
						if(stripos($api,$currApi["name"].' R') !== false)
							$api = str_ireplace($currApi["name"].' R','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a> R',$api);
						elseif(stripos($api,$currApi["name"].' C') !== false)
							$api = str_ireplace($currApi["name"].' C','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a> C',$api);
						elseif(stripos($api,$currApi["name"].' I') !== false)
							$api = str_ireplace($currApi["name"].' I','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'" target="blank">'.$currApi["name"].'</a> I',$api);
					}
				}
			}
			echo $api;
			
			echo '</li></ul>';
			
			echo '<big class="d bc">Author(s):</big><ul><li>' .
				implode('</li><li>',$mod->author) .
				'</li></ul>';
			
			if(isset($mod->source) && $mod->source != "")
				echo 'This mod is <a href="'.$mod->source.'" target="blank">Open Source</a>.';
			
			echo '</span></td>';
			
			echo '<td>'.parseAuthors($mod->author).'</td>';
			$typelist = array();
			foreach($mod->type as &$types) {
				$typelist[] = str_replace('Client','Clientside',
					str_replace('Server','Serverside',
					$types));
			}
			//echo '<td>'.implode(' ',$mod->type).'</td>';
			echo '<td>'.implode(' ',$typelist).'</td>';
			
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