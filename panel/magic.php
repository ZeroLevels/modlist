<?php
$valid[0][0] = 'R3J5Z3JGbHpy';
$valid[0][1] = 'Z3J5Z3JmbHpyQGhvdG1haWwuY29t';
$valid[0][2] = '$2a$13$/.pMrcxhD.c/E4QdMO2W.um5x/Q4n6GQBKHCXf7oZdW8HuQWWaZ1O';
$valid[0][3] = 0;
$valid[1][0] = 'WmVyb0xldmVscw==';
$valid[1][1] = 'bW9kbGlzdC5tY2YubGlAZ21haWwuY29t';
$valid[1][2] = '$2a$13$/.pMrcxhD.c/E4QdMO2W.uNvsvYfWclbp6ReL1Hhgrg2ouwlqkswC';
$valid[1][3] = 0;
$valid[2][0] = 'V3VwcHk=';
$valid[2][1] = 'V3VwcHkyOUBnbWFpbC5jb20=';
$valid[2][2] = '$2a$13$/.pMrcxhD.c/E4QdMO2W.umSrGOjgeZB/FmeWL875.WnCmoREGN3S';
$valid[2][3] = 3;
$valid[2][4] = '';
$valid[3][0] = 'RGFCYW5hbmFib2F0';
$valid[3][1] = '';
$valid[3][2] = '$2a$13$/.pMrcxhD.c/E4QdMO2W.uRmCbokVLu302cwl4iNGxI7VU8NgyOuq';
$valid[3][3] = 3;
$valid[3][4] = '';
function accesslevel($keyname) {
	global $valid;
	foreach($valid as &$key) {
		if(base64_encode($keyname) == $key[0]) {
			return $key[3];
			break;
		}
	}
	return 3;
}
function textLevel($keyname) {
	$level = accesslevel($keyname);
	switch($level) {
		case 0:
			return 'admin';
			break;
		case 3:
			return 'api-dev';
			break;
		default:
			return 'undefined';
			break;
	}
}
function extractmail($keyname) {
	global $valid;
	foreach($valid as &$key) {
		if(base64_encode($keyname) == $key[0]) {
			return base64_decode($key[1]);
			break;
		}
	}
	return '';
}
function getAPIkey($keyname) {
	global $valid;
	foreach($valid as &$key) {
		if(base64_encode($keyname) == $key[0]) {
			return $key[4];
			break;
		}
	}
	return '';
}
?>