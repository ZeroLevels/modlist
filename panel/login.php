<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>MC Modlist Webpanel</title>
<link rel="stylesheet" type="text/css" href="../resources/stylesheets/panel.css" />
</head>
<body>
<form method="POST" action="auth.php?mode=login" id="login">
Username: <input type="text" name="usr" /></br>
Password: <input type="password" name="pwd" /></br>
<input type="submit" value="Login" />
<?php
if(isset($_GET['mode']) && $_GET['mode'] == "error")
	echo "</br>Something went wrong?";
?>
</form>
</body>
</html>