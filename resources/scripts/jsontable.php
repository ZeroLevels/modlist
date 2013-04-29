<?php
/* JSON -> Table Parser Code
 * Written by GrygrFlzr
 */
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

function jsonTable($version) {
	$JSONfile = recode(file_get_contents($version . '.json'));
	$mods = json_decode($JSONfile);
	$apilist = array(array());
	foreach($mods as &$mod) { //first iteration - grab all APIs
		if(trim($mod->name) != "" && 
			(strtolower($mod->other) == "(api)" || strtolower($mod->other) == "(dependency)")) {
			$currCount = count($apilist);
			$apilist[$currCount]["name"] = trim($mod->name);
			$apilist[$currCount]["link"] = trim($mod->link);
			$apilist[$currCount]["desc"] = trim(strip_tags($mod->desc));
		}
	}
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
			}
		}
		echo '">';
		
		if($mod->desc != "")
			echo '<span class="tt">'.$mod->desc .'</br></br><big class="d bc">Dependencies:</big><ul><li>';
		else
			echo '<span class="tt"><big class="d bc">Dependencies:</big><ul><li>';
		
		$api = implode('</li><li>', $mod->dependencies);
		foreach($apilist as &$currApi) {
			$api = str_ireplace($currApi["name"],'<a href="'.$currApi["link"].'" title="'.$currApi["desc"].'">'.$currApi["name"].'</a>',$api);
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