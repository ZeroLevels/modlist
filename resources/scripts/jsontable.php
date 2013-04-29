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
	foreach($mods as &$mod) {
		echo '<tr>';
		
		echo '<td><a href="'.
			$mod->link.'">'.
			$mod->name.'</a>';
		if($mod->other != "")
			echo ' '.$mod->other;
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
		echo '<span class="tt">'.$mod->desc .'</br></br><big class="d bc">Dependencies:</big><ul><li>'. implode('</li><li>', $mod->dependencies).'</li></ul></span>';
		echo '</td>';
		
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