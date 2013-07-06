<?php
session_start();
date_default_timezone_set('UTC');
if(!isset($_SESSION['usr'])) {
	$_SESSION['return'] = $_SERVER['REQUEST_URI'];
	header('Location: login.php', true, 302);
	exit();
}
if(!isset($_GET['view'])) {
	header('Location: panel.php?view=home', true, 302);
	exit();
}
include('magic.php');
if($_GET['view'] == "userlist" && accesslevel($_SESSION['usr']) > 0) {
	header('Location: panel.php?view=home', true, 302);
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MCF Modlist Webpanel</title>
	<link rel="stylesheet" type="text/css" href="../resources/stylesheets/panel.css" />
	<script type="application/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="application/javascript" src="../resources/js/jquery.min.js"></script>
	<script type="application/javascript" src="../resources/js/ZeroClipboard.min.js"></script>
	<script type="application/javascript" src="../resources/js/listcreator.js" defer></script>
</head>
<body>
<h1>MCF Modlist Webpanel</h1>
<div id="nav">
	<?php
	if(accesslevel($_SESSION['usr']) == 0)
		echo '<ul id="navigation" class="admin">';
	else
		echo '<ul id="navigation">';
	?>
		<?php
		if($_GET['view'] == "home")
			echo '<li class="current"><a href="panel.php?view=home">Home</a></li>';
		else
			echo '<li><a href="panel.php?view=home">Home</a></li>';
		if(accesslevel($_SESSION['usr']) == 0) {
			if($_GET['view'] == "userlist")
				echo '<li class="current"><a href="panel.php?view=userlist">Userlist</a></li>';
			else
				echo '<li><a href="panel.php?view=userlist">Userlist</a></li>';
			
			if($_GET['view'] == "creator")
				echo '<li class="current"><a href="panel.php?view=creator">List Creator</a></li>';
			else
				echo '<li><a href="panel.php?view=creator">List Creator</a></li>';
			
			if($_GET['view'] == "generate")
				echo '<li class="current"><a href="panel.php?view=generate">Generate Changelog</a></li>';
			else
				echo '<li><a href="panel.php?view=generate">Generate Changelog</a></li>';
			
			if($_GET['view'] == "upload")
				echo '<li class="current"><a href="panel.php?view=upload">Upload Files</a></li>';
			else
				echo '<li><a href="panel.php?view=upload">Upload Files</a></li>';
			
			if($_GET['view'] == "submission")
				echo '<li class="current"><a href="panel.php?view=submission">Submissions</a></li>';
			else
				echo '<li><a href="panel.php?view=submission">Submissions</a></li>';
		}
		if($_GET['view'] == "api")
			echo '<li class="current"><a href="panel.php?view=api">API Key</a></li>';
		else
			echo '<li><a href="panel.php?view=api">API Key</a></li>';
		?>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
<div id="content">
	<?php
	switch($_GET['view']) {
		case "home":
			include('pages/home.php');
			break;
		case "api":
			switch($_GET['mode']) {
				case "generate":
					include('pages/apikey.php');
					break;
				default:
					include('pages/api.html');
					break;
			}
			break;
		case "userlist":
			include('pages/userlist.php');
			break;
		case "creator":
			include('pages/listcreator.php');
			break;
		case "generate":
			include('pages/imagethread.php');
			break;
		case "upload":
			switch($_GET['mode']) {
				case "upload":
					include('pages/upload.php');
					break;
				default:
					include('pages/upload.html');
					break;
			}
			break;
		case "submission":
			include('pages/submission.php');
			break;
	}
	?>
</div>
</body>
</html>