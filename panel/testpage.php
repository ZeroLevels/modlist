<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>
<?php
echo 'Hi, ' . $_SESSION['usr'];
echo '</br><a href="logout.php">Log out</a>';
?>
</body>
</html>