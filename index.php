<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
$page = new Page;
$page->setTitle('Home');
$page->startBody();
?>
<div class="jumbotron">
	<h1>MCF Modlist</h1>
	<p>A list of Minecraft mods compiled by the community</p>
	<p>
		<a href="/version/latest" class="btn btn-primary btn-lg">Check out the latest mod list!</a>
		<a href="/history" class="btn btn-default btn-lg">What happened to the site?</a>
	</p>
</div>
<div class="row">
	<div class="col-sm-6 col-lg-3">
		<h2>1.6.4</h2>
		<p><i>Last Updated 30th September, 2013</i></p>
		<p><?php echo changelogParse('1.6.4') ?></p>
		<p><a class="btn btn-primary" href="/version/1.6.4">View list &raquo;</a> <a class="btn btn-default" href="/changelog/1.6.4">View all changes &raquo;</a></p>
	</div>
	<div class="col-sm-6 col-lg-3">
		<h2>1.6.2</h2>
		<p><i>Last Updated 24th September, 2013</i></p>
		<p><?php echo changelogParse('1.6.2') ?></p>
		<p><a class="btn btn-primary" href="/version/1.6.2">View list &raquo;</a> <a class="btn btn-default" href="/changelog/1.6.2">View all changes &raquo;</a></p>
	</div>
	<div class="col-sm-6 col-lg-3">
		<h2>1.6.1</h2>
		<p><i>Last Updated 10th September, 2013</i></p>
		<p><?php echo changelogParse('1.6.1') ?></p>
		<p><a class="btn btn-primary" href="/version/1.6.1">View list &raquo;</a> <a class="btn btn-default" href="/changelog/1.6.1">View all changes &raquo;</a></p>
	</div>
	<div class="col-sm-6 col-lg-3">
		<h2>1.5.2</h2>
		<p><i>Last Updated 24th September, 2013</i></p>
		<p><?php echo changelogParse('1.5.2') ?></p>
		<p><a class="btn btn-primary" href="/version/1.5.2">View list &raquo;</a> <a class="btn btn-default" href="/changelog/1.5.2">View all changes &raquo;</a></p>
	</div>
</div>
<?php
$page->endBody();
echo $page->render('resources/templates/modlist-template.php');

function changelogDate($version) {
	$file = file('resources/data/changelogs/'.$version.'.txt');
	return substr(trim($file[0]),1,-1);
}

function changelogParse($version) {
	$file = file('resources/data/changelogs/'.$version.'.txt');
	$latestchanges = array();
	for($i=1;$i<count($file);$i++) {
		if($file[$i] == "\r\n" || $file[$i] == "\n")
			break;
		else
			if(strpos($file[$i], '(Which are the following)') === false)
				$latestchanges[] = $file[$i];
	}
	return convertChangelog($latestchanges, $version);
}

function convertChangelog($mods, $version) {
	$added = array();
	$updated = array();
	$removed = array();
	$new = array();
	foreach($mods as &$mod) {
		$arr = explode(' ',trim($mod));
		$type = substr($arr[0],1);
		if($type == "Added")
			$added[] = extractName($mod);
		elseif($type == "Updated")
			$updated[] = extractName($mod);
		elseif($type == "Removed")
			$removed[] = extractName($mod);
	}
	
	$result = '';
	
	if(count($updated) > 3) {
		$result .= 'Updated ' . formatMod($updated[0],$version) . ', ' . formatMod($updated[1],$version) . ', and ' . (string)(count($updated)-2) . ' other mods... ';
	} elseif(count($updated) > 1) {
		$last = array_pop($updated);
		$addedlist = array();
		foreach($updated as &$mod)
			$addedlist[] = formatMod($mod,$version);
		$result .= 'Updated ' . implode(', ',$addedlist) . ' and ' . formatMod($last,$version) . '. ';
	} elseif(count($updated) == 1) {
		$result .= 'Updated ' . formatMod($updated[0],$version) . '. ';
	}
	
	if(count($added) > 3) {
		$result .= 'Added ' . formatMod($added[0],$version) . ', ' . formatMod($added[1],$version) . ', and ' . (string)(count($added)-2) . ' other mods... ';
	} elseif(count($added) > 1) {
		$last = array_pop($added);
		$addedlist = array();
		foreach($added as &$mod)
			$addedlist[] = formatMod($mod,$version);
		$result .= 'Added ' . implode(', ',$addedlist) . ' and ' . formatMod($last,$version) . '. ';
	} elseif(count($added) == 1) {
		$result .= 'Added ' . formatMod($added[0],$version) . '. ';
	}
	
	if(count($removed) > 3) {
		$result .= 'Removed ' . formatMod($removed[0],$version) . ', ' . formatMod($removed[1],$version) . ', and ' . (string)(count($removed)-2) . ' other mods... ';
	} elseif(count($removed) > 1) {
		$last = array_pop($removed);
		$addedlist = array();
		foreach($removed as &$mod)
			$addedlist[] = formatMod($mod,$version);
		$result .= 'Removed ' . implode(', ',$addedlist) . ' and ' . formatMod($last,$version) . '. ';
	} elseif(count($removed) == 1) {
		$result .= 'Removed ' . formatMod($removed[0],$version) . '. ';
	}
	
	return $result;
}

function formatMod($mod,$version) {
	return '<a href="/version/'.$version.'/#'.tagformat($mod).'">'.$mod.'</a>';
}

function extractName($line) {
	preg_match('#\"(.*?)\"#', $line, $match);
	return $match[1];
}

function tagformat($data) {
	return strtolower(PREG_REPLACE("/[^0-9a-zA-Z]/i", '', $data));
}

