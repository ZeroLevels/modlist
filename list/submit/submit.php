<?php
date_default_timezone_set('Etc/UTC');

require '../../resources/scripts/class.phpmailer.php';
require '../../panel/secrets/magickeys.php';
require '../../panel/magic.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		
		<title>MCF Mod List - Submission Form</title>
		
		<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="application/javascript" src="../../resources/js/submissioncheck.js" defer></script>
		
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/index.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/common.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/submit.css" />
	</head>
	
<style type="text/css">
.padded {
	font-weight:bold;
}

pre {
	font-family:verdana,arial;
	white-space:pre-wrap;	/* css-3 */
	white-space:-moz-pre-wrap;	/* Mozilla, since 1999 */
	white-space:-pre-wrap;	/* Opera 4-6 */
	white-space:-o-pre-wrap;	/* Opera 7 */
	word-wrap: break-word;	/* Internet Explorer 5.5+ */
}
</style>

	<body id="submission_form">
		<center>
		<div class="nav">
		<ul id="list-nav" align="center">
			<li><a href="/">Home</a></li>
			<li><a href="/credits/">Credits</a></li>
			<li><a href="/latest/">Current List</a></li>
			<li><a href="/banners/">Banners</a></li>
		</ul>
		</div>
		
		<br/>

<?php
if(
	isset($_POST['new']) &&
	isset($_POST['name']) &&
	!empty($_POST['name']) &&
	isset($_POST['version']) &&
	isset($_POST['notbot']) &&
	$_POST['notbot'] == "true"
) {
	$submission['timestamp'] = time();
	$submission['name'] = $_POST['name'];
	foreach($_POST['version'] as $version) {
		$submission['versions'][] = $version;
	}
	$submission['other'] = $_POST['other'];
	
	if($_POST['new'] == "true") {
		$submission['mode'] = 'New Mod';
		$submission['link'] = $_POST['link'];
		$submission['desc'] = $_POST['desc'];
		$submission['author'] = $_POST['author'];
		$submission['source'] = $_POST['source'];
		$submission['compatibility'] = $_POST['forge'];
		foreach($_POST['availability'] as $availability) {
			$submission['availability'][] = $availability;
		}
	} else {
		$submission['mode'] = 'Update Request';
		$submission['source'] = $_POST['source'];
	}
	
	$logs = readJSON('../../panel/secrets/submissions.json');
	$submission['id'] = count($logs);
	$logs[] = $submission;
	file_put_contents('../../panel/secrets/submissions.json', json_encode($logs));
	
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
		$html = file_get_contents('templatemail.html');
	else
		$html = file_get_contents('templateupdate.html');
	$html = str_replace('$mode',$submission['mode'],$html);
	$html = str_replace('$idnumber',$submission['id'],$html);
	$html = str_replace('$name',$submission['name'],$html);
	$html = str_replace('$author',$submission['author'],$html);
	$html = str_replace('$source',$submission['source'],$html);
	$html = str_replace('$link',$submission['link'],$html);
	$html = str_replace('$availability',implode(', ',$submission['availability']),$html);
	$html = str_replace('$compatibility',$submission['compatibility'],$html);
	$html = str_replace('$versions',implode(', ',$submission['versions']),$html);
	$html = str_replace('$desc',$submission['desc'],$html);
	$html = str_replace('$other',$submission['other'],$html);
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
		$errorlog = readJSON('../../panel/secrets/submiterrors.json');
		$error['id'] = $errorlog[count($errorlog)-1]['id']+1;
		$error['timestamp'] = time();
		$error['error'] = $mail->ErrorInfo;
		$errorlog[] = $error;
		file_put_contents('../../panel/secrets/submiterrors.json', json_encode($errorlog));
		echo "Something went wrong...";//"Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Request submitted successfully.";
	}
} else {
	header('Location: ../submit', true, 302);
}
if(!empty($_POST['version'])) {
    foreach($_POST['version'] as $check) {
            //echo $check;
    }
}
?>
</body>

<!--Google Analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39433845-1']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
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
?>