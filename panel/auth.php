<?php
session_start();
require('magic.php');
switch($_GET['mode']) {
	case "reg":
		if(isset($_POST['pwd']) && isset($_POST['pwd2'])) {
			if($_POST['pwd'] === $_POST['pwd2']) {
				header("Content-Type: text/plain; charset=UTF-8");
				echo 'Type the following in IRC: /msg GrygrFlzr REGISTRATION:' . $_POST['usr'] . ':' . crypt(urlencode($_POST['pwd']), '$2a$13$/.pMrcxhD.c/E4QdMO2W.w==');
			}
		}
		break;
	case "login":
		if(isset($_POST['usr']) && isset($_POST['pwd'])) {
			$match = false;
			foreach($valid as &$keys) {
				if(strtolower(base64_decode($keys[0])) == strtolower(urlencode($_POST['usr'])) &&
					$keys[2] == crypt(urlencode($_POST['pwd']), '$2a$13$/.pMrcxhD.c/E4QdMO2W.w==')) { //encrypt every iteration to slow down
					$_SESSION['usr'] = base64_decode($keys[0]);
					$match = true; //don't break so that delay is always the same for every iteration
				}
			}
			
			if($match) {
				if(isset($_SESSION['return'])) {
					$return = $_SESSION['return'];
					unset($_SESSION['return']);
					header('Location: ' . $return, true, 302);
				} else {
					header('Location: panel.php', true, 302);
				}
			} else {
				header('Location: login.php?mode=error', true, 302);
			}
		}
		break;
}
?>