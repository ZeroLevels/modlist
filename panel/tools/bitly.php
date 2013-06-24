<?php
require '../secrets/magickeys.php';
header("Content-Type: application/json; charset=UTF-8");
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

function readJSON($link) {
	if(!isset($GLOBALS[urlencode($link)])) {
		$JSONfile = recode(file_get_contents($link));
		$GLOBALS[urlencode($link)] = json_decode($JSONfile);
	}
	return $GLOBALS[urlencode($link)];
}

if(isset($_GET['mode'])) {
	switch($_GET['mode']) {
		case "info":
			if(isset($_GET['link'])) {
				$data = readJSON('https://api-ssl.bitly.com/v3/info?access_token='.$auth['bitly']['key'].'&shortUrl=' . urlencode($_GET['link']));
				$dataExpand = readJSON('https://api-ssl.bitly.com/v3/expand?access_token='.$auth['bitly']['key'].'&shortUrl=' . urlencode($_GET['link']));
				$json['title'] = $data->data->info[0]->title;
				$json['link'] = $dataExpand->data->expand[0]->long_url;
				echo json_encode($json);
			}
			break;
		case "save":
			if(isset($_GET['link'])) {
				$data = readJSON('https://api-ssl.bitly.com/v3/shorten?access_token='.$auth['bitly']['key'].'&longUrl=' . urlencode($_GET['link']));
				$json['link'] = $data->data->url;
				echo json_encode($json);
			}
			break;
	}
}

?>