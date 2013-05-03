<?php

header("Content-Type: text/plain; charset=UTF-8");

if(isset($_GET['request'])) {
	switch($_GET['request']) {
		case "hash":
			if(isset($_GET['version'])) {
				if ($location = getVersion($_GET['version'])) {
					echo md5_file($location);
				}
			} else {
				echo "Version?";
			}
			break;
			
		case "json":
			if(isset($_GET['version'])) {
				if ($location = getVersion($_GET['version'])) {
					echo file_get_contents($location);
				}
			} else {
				echo "Version?";
			}
			break;

		default:
			echo "Non-existent request";
			break;
	}
} else {
	echo "No request?";
}

function getVersion($version) {
	switch($version) {
		case "1.5.1":
		case "1.5.2":
			return 'list/1.5/1.5.1.json';
			break;
		case "1.5.0":
		case "1.5":
			return 'list/1.5/1.5.0.json';
			break;
		case "1.4.7":
		case "1.4.6":
		case "1.4.7_1.4.6":
		case "1.4.6_1.4.7":
			return 'list/1.4/1.4.6_1.4.7.json';
			break;
		case "1.4.5":
		case "1.4.4":
		case "1.4.5_1.4.4":
		case "1.4.4_1.4.5":
			return 'list/1.4/1.4.4_1.4.5.json';
			break;
		case "1.4.2":
			return 'list/1.4/1.4.2.json';
			break;
		default:
			return false;
			break;
	}
}

