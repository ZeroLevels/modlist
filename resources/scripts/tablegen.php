<?php
/* Table generation code
 * Written by GrygrFlzr
 */
set_include_path($_SERVER['DOCUMENT_ROOT']);
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

function readJSON() {
	if(!isset($GLOBALS['mods'])) {
		$JSONfile = recode(file_get_contents('resources/data/modlist.json',true));
		$GLOBALS['mods'] = sortAlpha(json_decode($JSONfile));
	}
	return $GLOBALS['mods'];
}

function filtersort($data) {
	return PREG_REPLACE("/[^0-9a-zA-Z]/i", '', $data);
}
function filtersortspace($data) {
	return PREG_REPLACE("/[^0-9a-zA-Z -]/i", '', $data);
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

function countList($version) {
	if($version == '1.5')
	 $version = '1.5.0';
	$modlist = readJSON();
	$modcount = 0;
	foreach($modlist as &$mod) {
		if(in_array($version,$mod->versions))
			$modcount++;
	}
	return $modcount;
}

function tableGenerate($version) {
	$supported = array('1.6.4','1.6.2','1.6.1','1.5.2');
	$modlist = readJSON();
	$displayversion = $version;
	if($displayversion == '1.5.0')
		$displayversion = '1.5';
	echo '<div class="page-header">';
	echo '<h1>' . $displayversion . '<br /><small>Tracking ' . countList($version) . ' mods for this version</small></h1>';
	echo '</div>';
	
	if(!in_array($version,$supported))
		echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning:</strong> This version is no longer supported and will no longer recieve updates.</div>';
	
	echo '<div class="input-group hidden-print">' . "\n";
	echo '<span class="input-group-addon"><i class="icon-search"></i><span class="sr-only">Search</span></span>' . "\n";
	echo '<input type="text" id="search" class="form-control" placeholder="Type to search" autofocus />' . "\n";
	echo '</div>' . "\n";
	echo '<table id="modlist" class="table table-hover">';
	echo '<thead>
		<tr>
			<th>Mod Name</th>
			<th class="hidden-xs">Author</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>';
	$forge = Array('Forge Required','Forge Compatible', 'Not Forge Compatible');
	foreach($modlist as &$mod) {
		if(in_array($version,$mod->versions)) {
			echo '<tr id="'.filtersort(strtolower($mod->name)).'">' . "\n";
			echo '<td><a href="' . $mod->link . '">';
			echo $mod->name;
			echo '</a>';
			if(isset($mod->other))
				echo ' ' . $mod->other;
			echo '</td>' . "\n";
			echo '<td class="hidden-xs">' . authorParse($mod->author) . '</td>' . "\n";
			echo '<td>' . "\n";
			if(isset($mod->desc) && $mod->desc != "") {
				echo $mod->desc;
				echo '<br />' . "\n";
			}
			if(isset($mod->source)) {
				if($mod->source != "") {
					echo '<a href="' . $mod->source . '">' . "\n";
					echo '<i class="icon-globe pull-right opensource"></i><span class="sr-only">Open Source</span>';
					//echo '<span class="badge pull-right opensource hidden-xs">Open Source</span>' . "\n";
					echo '</a>' . "\n";
				} else
					//echo '<span class="badge pull-right opensource-contained hidden-xs">Open Source</span>' . "\n";
					echo '<i class="icon-globe pull-right opensource-contained"></i><span class="sr-only">Open Source</span>';
			}
			foreach($mod->type as &$type) {
				switch($type) {
					case "Universal":
						echo '<span class="label label-default universal">Universal</span>' . "\n";
						break;
					case "Client":
						echo '<span class="label label-default client">Clientside</span>' . "\n";
						break;
					case "Server":
						echo '<span class="label label-default server">Serverside</span>' . "\n";
						break;
					case "SSP":
						echo '<span class="label label-default ssp">SSP</span>' . "\n";
						break;
					case "SMP":
						echo '<span class="label label-default smp">SMP</span>' . "\n";
						break;
					case "LAN":
						echo '<span class="label label-default lan">LAN</span>' . "\n";
						break;
				}
			}
			if(in_array('Forge Required',$mod->dependencies))
				echo '<a href="#forge" class="depends"><span class="label label-success dependency forge-required">Forge Required</span></a>' . "\n";
			if(in_array('Forge Compatible',$mod->dependencies))
				echo '<a href="#forge" class="depends"><span class="label label-primary dependency forge-compatible">Forge Compatible</span></a>' . "\n";
			if(in_array('Not Forge Compatible',$mod->dependencies))
				echo '<a href="#forge" class="depends"><span class="label label-danger dependency not-forge-compatible">Not Forge Compatible</span></a>' . "\n";
			if(count($mod->dependencies) > 1) {
				foreach($mod->dependencies as &$dependency) {
					if(!in_array($dependency,$forge))
						echo '<a href="#' . dependTag($dependency) . '" class="depends"><span class="label label-warning dependency">' . $dependency . '</span></a>' . "\n";
				}
			}
			echo '</td>' . "\n";
			echo '</tr>' . "\n";
		}
	}
	echo '</tbody></table>' . "\n";
}

function dependTag($name) {
	$name = str_replace(' Compatible','',$name);
	$name = str_replace(' Required','',$name);
	return filtersort(strtolower($name));
}

function authorParse($authors) {
	if(count($authors) == 1)
		return $authors[0];
	else {
		$last = array_pop($authors);
		return implode(', ',$authors) . ' &amp; ' . $last;
	}
}

function authorParseAllComma($authors) {
	if(count($authors) == 1)
		return $authors[0];
	else {
		return implode(', ',$authors);
	}
}

function readSubmissions() {
	if(!isset($GLOBALS['requests'])) {
		$JSONfile = file_get_contents('panel/secrets/submissions.json',true);
		$GLOBALS['requests'] = json_decode($JSONfile);
	}
	return $GLOBALS['requests'];
}

function loadMod($name,$author) {
	$mods = readJSON();
	foreach ($mods as &$mod) {
		if($mod->name == $name && authorParse($mod->author) == $author) {
			$mod->parsedauthors = authorParseAllComma($mod->author);
			return $mod;
		}
	}
	return false;
}

function listAllMods($query) {
	$query = trim($query);
	$mods = readJSON();
	$newlist = array();
	foreach ($mods as &$mod) {
		if(stristr($mod->name, $query) !== false) {
			$entry['author'] = authorParse($mod->author);
			$entry['desc'] = $mod->desc;
			$entry['value'] = $mod->name;
			if(isset($mod->other))
				$entry['tokens'] = array_merge(
					explode(' ',filtersortspace($mod->name)),
					explode(' ',filtersortspace($mod->other))
				);
			else
				$entry['tokens'] = explode(' ',filtersortspace($mod->name));
			$notfound = true;
			foreach($newlist as $previous) {
				if($previous == $entry)
					$notfound = false;
			}
			if($notfound)
				$newlist[] = $entry;
		}
		if(count($newlist) >= 10)
			break;
	}
	return $newlist;
}

function countCompleteNew() {
	$requests = readSubmissions();
	$count = 0;
	foreach($requests as &$request) {
		if($request->mode == "New Mod" && isset($request->complete) && $request->complete == true)
			$count++;
	}
	return $count;
}

function countCompleteUpdate() {
	$requests = readSubmissions();
	$count = 0;
	foreach($requests as &$request) {
		if($request->mode == "Update Request" && isset($request->complete) && $request->complete == true)
			$count++;
	}
	return $count;
}

function countAll() {
	return count(readSubmissions());
}

function percentage($numerator, $denominator) {
	return 100 * ($numerator / $denominator);
}

function submissionTable() {
	$submissions = array_reverse(readSubmissions());
	echo '<div class="input-group hidden-print">' . "\n";
	echo '<span class="input-group-addon"><i class="icon-search"></i><span class="sr-only">Search</span></span>' . "\n";
	echo '<input type="text" id="search" class="form-control" placeholder="Type to search queue" autofocus />' . "\n";
	echo '</div>' . "\n";
	echo '<table id="modlist" class="table table-hover">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Mod Name</th>';
	echo '<th>Description</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	foreach($submissions as &$submission) {
		if(!isset($submission->complete)) {
			echo '<tr>';
			if(isset($submission->link))
				echo '<td><a href="' . htmlspecialchars($submission->link,ENT_QUOTES) . '">' . htmlspecialchars($submission->name,ENT_QUOTES) . '</a></td>';
			else
				echo '<td>' . htmlspecialchars($submission->name,ENT_QUOTES) . '</td>';
			echo '<td>';
			if(isset($submission->desc))
				echo htmlspecialchars($submission->desc,ENT_QUOTES) . '<br />';
			if($submission->mode == "Update Request")
				echo '<span class="label label-primary">' . $submission->mode . '</span>' . "\n";
			else
				echo '<span class="label label-info">' . $submission->mode . '</span>' . "\n";
			foreach($submission->versions as &$version) {
				if($version == '1.5.0')
					$version = '1.5';
				echo '<span class="label label-default">' . $version . '</span>' . "\n";
			}
			echo '</td>';
			echo '</tr>';
		}
	}
	echo '</tbody>';
	echo '</table>';
}