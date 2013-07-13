<h3>Status:</h3>
<?php
function readJSON($filename) {
	if(!isset($GLOBALS[$filename])) {
		$JSONfile = recode(file_get_contents($filename));
		$GLOBALS[$filename] = json_decode($JSONfile);
	}
	return $GLOBALS[$filename];
}
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

$changelogfile = '../resources/images/changelog.png';
$modlistfile = '../list/modlist.json';
$submissions = readJSON('secrets/submissions.json');
$finalmods = readJSON($modlistfile);

$resolved = 0;
$progress = 0;

foreach($submissions as &$request) {
	if(isset($request->complete))
		$resolved++;
	elseif(isset($request->assigned))
		$progress++;
}

echo $resolved . ' out of '. count($submissions) . ' request(s) have been completed.</br>';
echo $progress . ' submission(s) currently in progress.</br>';
echo 'Currently listing ' . count($finalmods) . ' unique mods across all versions, excluding new submissions.</br>';
echo '</br>';
if(file_exists($modlistfile)) {
    echo 'The modlist was last updated on ' . date ("F d Y, H:i:s.", filemtime($modlistfile)) . '</br>';
}
if(file_exists($changelogfile)) {
    echo 'The automatic changelog was last generated on ' . date ("F d Y, H:i:s.", filemtime($changelogfile)) . '</br>';
}
echo '</br>';
if(accesslevel($_SESSION['usr']) == 0) {
	if(file_exists($modlistfile) && file_exists($changelogfile)) {
		if(filemtime($changelogfile) < filemtime($modlistfile))
			echo 'The changelog seems to be outdated... It is recommended that you <a href="panel.php?view=generate">generate the changelog</a>.';
	}
}
?>