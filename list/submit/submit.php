<?php
header("Content-Type: text/plain; charset=UTF-8");
date_default_timezone_set('Etc/UTC');

require '../../resources/scripts/class.phpmailer.php';
require '../../panel/secrets/magickeys.php';
if(
	isset($_POST['new']) &&
	isset($_POST['name']) &&
	!empty($_POST['name']) &&
	isset($_POST['version']) &&
	isset($_POST['notbot']) &&
	$_POST['notbot'] == "true"
) {
	$submission['timestamp'] = microtime();
	$submission['name'] = $_POST['name'];
	foreach($_POST['version'] as $version) {
		$submission['versions'][] = $version;
	}
	$submission['other'] = $_POST['other'];
	
	if($_POST['new'] == "true") {
		$submission['type'] = 'new';
		$submission['link'] = $_POST['link'];
		$submission['desc'] = $_POST['desc'];
		$submission['author'] = $_POST['author'];
		$submission['forge'] = $_POST['forge'];
		foreach($_POST['availability'] as $availability) {
			$submission['availability'][] = $availability;
		}
	} else {
		$submission['type'] = 'update';
	}
	
	$logs = readJSON('../../panel/secrets/submissions.json');
	$logs[] = $submission;
	file_put_contents('../../panel/secrets/submissions.json', json_encode($logs));
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug  = 2;
	$mail->Debugoutput = 'html';
	$mail->Host       = 'smtp.gmail.com';
	$mail->Port       = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth   = true;
	$mail->Username   = $auth['gmail']['user'];
	$mail->Password   = $auth['gmail']['pass'];
	$mail->SetFrom($auth['gmail']['user'], 'MCF Modlist');
	$mail->AddReplyTo($auth['gmail']['user'],'MCF Modlist');
	$mail->AddAddress('grygrflzr@hotmail.com', 'GrygrFlzr');
	$mail->AddAddress('modlist.mcf@gmail.com', 'ZeroLevels');
	$mail->Subject = 'Submission Request - ' . $submission['name'];
	
	$html = file_get_contents('templatemail.html');
	$html = str_replace('$name',$submission['name'],$html);
	$html = str_replace('$author',$submission['author'],$html);
	$html = str_replace('$link',$submission['link'],$html);
	$html = str_replace('$availability',implode(', ',$submission['availability']),$html);
	$html = str_replace('$compatibility',implode(', ',$submission['compatibility']),$html);
	$html = str_replace('$desc',$submission['desc'],$html);
	$html = str_replace('$other',$submission['other'],$html);
	$html = str_replace('$origin',$_SERVER['REMOTE_ADDR'],$html);
	
	$mail->MsgHTML($html, dirname(__FILE__));
	$plaintext = 'Submission for ' . $submission['name'] . "\n";
	$plaintext .= 'Name: ' . $submission['name'] . "\n";
	$plaintext .= 'Author: ' . $submission['author'] . "\n";
	$plaintext .= 'Link: ' . $submission['link'] . "\n";
	$plaintext .= 'Availability: ' . implode(', ',$submission['availability']) . "\n";
	$plaintext .= 'Compatibility: ' . implode(', ',$submission['compatibility']) . "\n";
	$plaintext .= 'Description: ' . $submission['desc'] . "\n";
	$plaintext .= 'Other: ' . $submission['other'] . "\n";
	$plaintext .= 'Requested by ' . $_SERVER['REMOTE_ADDR'] . "\n";
	$mail->AltBody = $plaintext;
	
	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}
} else {
	header('Location: ../submit', true, 302);
}
if(!empty($_POST['version'])) {
    foreach($_POST['version'] as $check) {
            //echo $check;
    }
}
var_dump($_POST);

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