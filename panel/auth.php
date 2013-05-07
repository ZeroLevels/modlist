<?php
session_start();
require('magic.php');
include('logger.php');
switch($_GET['mode']) {
	case "reg":
		if(isset($_POST['pwd']) && isset($_POST['pwd2'])) {
			if($_POST['pwd'] === $_POST['pwd2']) {
				header("Content-Type: text/plain; charset=UTF-8");
				echo 'Type the following in IRC: /msg GrygrFlzr ' . crypt(urlencode($_POST['pwd']), '$2a$13$/.pMrcxhD.c/E4QdMO2W.w==');
			}
		}
		break;
	case "login":
		if(isset($_POST['usr']) && isset($_POST['pwd'])) {
			$match = false;
			foreach($valid as &$keys) {
				if($keys[0] == urlencode($_POST['usr']) &&
					$keys[2] == crypt(urlencode($_POST['pwd']), '$2a$13$/.pMrcxhD.c/E4QdMO2W.w==')) { //encrypt every iteration to slow down
					$_SESSION['usr'] = $keys[0];
					$match = true; //don't break so that delay is always the same for every iteration
				}
			}
			
			if($match) {
				logfile(urlencode($_POST['usr']), 'login', true);
				header('Location: testpage.php', true, 302);
			} else {
				logfile(urlencode($_POST['usr']), 'login', false);
				header('Location: login.php?mode=error', true, 302);
			}
		}
		break;
}
?>