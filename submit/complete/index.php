<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/class.phpmailer.php');
require_once('panel/secrets/magickeys.php');
require_once('panel/magic.php');

$base = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
if(
	!isset($_POST['request-type']) ||
	!isset($_POST['name']) ||
	empty($_POST['name']) ||
	!isset($_POST['versions']) ||
	empty($_POST['versions']) ||
	0
)
	header("Location: $base" . 'submit/form/?incomplete', true, 302);

$submission['timestamp'] = time();
$submission['name'] = $_POST['name'];
foreach($_POST['versions'] as $version) {
	$submission['versions'][] = $version;
}
$submission['other'] = $_POST['other'];

if($_POST['request-type']) {
	$submission['mode'] = 'New Mod';
	$submission['link'] = $_POST['link'];
	$submission['desc'] = $_POST['desc'];
	$submission['author'] = $_POST['authors'];
	$submission['source'] = $_POST['source'];
	$submission['compatibility'] = $_POST['forge'];
	foreach($_POST['availability'] as $availability) {
		$submission['availability'][] = $availability;
	}
} else {
	$submission['mode'] = 'Update Request';
	$submission['source'] = $_POST['source'];
}

$logs = readJSON('panel/secrets/submissions.json');
$submission['id'] = count($logs);
$logs[] = $submission;
file_put_contents('panel/secrets/submissions.json', json_encode($logs), FILE_USE_INCLUDE_PATH);

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug  = 0;
$mail->Debugoutput = 'html';
$mail->Host       = 'smtp.gmail.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username   = $auth['gmail']['user'];
$mail->Password   = $auth['gmail']['pass'];
$mail->SetFrom($auth['gmail']['user'], 'MCF Modlist');
$mail->AddReplyTo($auth['gmail']['user'],'MCF Modlist');
$mail->AddAddress(base64_decode($valid[0][1]), base64_decode($valid[0][0]));
$mail->AddAddress(base64_decode($valid[1][1]), base64_decode($valid[1][0]));
$mail->Subject = $submission['mode'] . ' - ' . $submission['name'];

if($submission['mode'] == 'New Mod')
	$html = file_get_contents('resources/templates/templatemail.html',true);
else
	$html = file_get_contents('resources/templates/templateupdate.html',true);
$html = str_replace('$mode',$submission['mode'],$html);
$html = str_replace('$idnumber',$submission['id'],$html);
$html = str_replace('$name',htmlspecialchars($submission['name'],ENT_QUOTES),$html);
$html = str_replace('$author',htmlspecialchars($submission['author'],ENT_QUOTES),$html);
$html = str_replace('$source',htmlspecialchars($submission['source'],ENT_QUOTES),$html);
$html = str_replace('$link',htmlspecialchars($submission['link'],ENT_QUOTES),$html);
$html = str_replace('$availability',implode(', ',$submission['availability']),$html);
$html = str_replace('$compatibility',$submission['compatibility'],$html);
$html = str_replace('$versions',implode(', ',$submission['versions']),$html);
$html = str_replace('$desc',htmlspecialchars($submission['desc'],ENT_QUOTES),$html);
$html = str_replace('$other',htmlspecialchars($submission['other'],ENT_QUOTES),$html);
$html = str_replace('$origin',$_SERVER['REMOTE_ADDR'],$html);

$mail->MsgHTML($html, dirname(__FILE__));
$plaintext = 'Submission for ' . $submission['name'] . "\n";
$plaintext .= 'Name: ' . $submission['name'] . "\n";
$plaintext .= 'Author: ' . $submission['author'] . "\n";
$plaintext .= 'Source: ' . $submission['source'] . "\n";
$plaintext .= 'Link: ' . $submission['link'] . "\n";
$plaintext .= 'Availability: ' . implode(', ',$submission['availability']) . "\n";
$plaintext .= 'Compatibility: ' . $submission['compatibility'] . "\n";
$plaintext .= 'Description: ' . $submission['desc'] . "\n";
$plaintext .= 'Other: ' . $submission['other'] . "\n";
$plaintext .= 'Requested by ' . $_SERVER['REMOTE_ADDR'] . "\n";
$mail->AltBody = $plaintext;

if(!$mail->Send()) {
	$errorlog = readJSON('panel/secrets/submiterrors.json');
	$error['id'] = end($errorlog)['id']+1;
	$error['timestamp'] = time();
	$error['error'] = $mail->ErrorInfo;
	$errorlog[] = $error;
	file_put_contents('../../panel/secrets/submiterrors.json', json_encode($errorlog));
	header("Location: $base" . 'submit/form/?failed', true, 302);
} else {
	header("Location: $base" . 'submit/form/?success', true, 302);
}

function readJSON($filename) {
	if(!isset($GLOBALS[$filename])) {
		$JSONfile = recode(file_get_contents($filename, true));
		$GLOBALS[$filename] = json_decode($JSONfile);
	}
	return $GLOBALS[$filename];
}
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}