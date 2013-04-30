<?php
/* JSON -> Table Parser Code
 * Written by GrygrFlzr
 */
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

function apiList($version) {
	$JSONfile = recode(file_get_contents($version . '.json'));
	$mods = json_decode($JSONfile);
	$apilist = array(array());
	foreach($mods as &$mod) { //first iteration - grab all APIs
		if(trim($mod->name) != "" && 
			(strtolower($mod->other) == "(api)" ||
			strtolower($mod->other) == "(dependency)" ||
			strpos(trim($mod->name), 'API') !== false)) {
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
	
	return $apilist;
}

function showAPI($version) {
	$apilist = apiList($version);
	$listing = array();
	foreach($apilist as &$api) {
		if(isset($api["api"]) && $api["api"] == true)
			$listing[] = '<a href="'.$api["link"].'" title="'.$api["desc"].'">'.$api["name"].'</a>';
	}
	if(empty($listing)) {	//FALLBACK!
		foreach($apilist as &$api) {
			$listing[] = '<a href="'.$api["link"].'" title="'.$api["desc"].'">'.$api["name"].'</a>';
		}
	}
	echo implode(' | ', $listing);
}

function jsonTable($version) {
	$JSONfile = recode(file_get_contents($version . '.json'));
	$mods = json_decode($JSONfile);
	$apilist = apiList($version);
	foreach($mods as &$mod) { //second iteration - output table
		echo '<tr>';
		
		echo '<td><a href="'.
			$mod->link.'">'.
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
				$api = str_ireplace('<li>'.$currApi["name"],'<li><a href="'.$currApi["link"].'" title="'.$currApi["desc"].'">'.$currApi["name"].'</a>',$api);
			else {
				$api = str_ireplace($currApi["name"].' R','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'">'.$currApi["name"].'</a> R',$api);
				$api = str_ireplace($currApi["name"].' C','<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'">'.$currApi["name"].'</a> C',$api);
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
		}
		
		echo '</tr>';
	}
	
	
	return count($mods);
}
?>