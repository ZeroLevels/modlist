<?php

function logfile($user, $type, $result) {
	$templogs['timestamp'] = microtime();
	$templogs['user'] = $user;
	$templogs['type'] = $type;
	$templogs['address'] = $_SERVER['REMOTE_ADDR'];
	if(isset($result))
		$templogs['success'] = $result;
	$logs = readJSON('logs.json');
	$logs[] = $templogs;
	file_put_contents('logs.json', json_encode($logs));
}

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
?>