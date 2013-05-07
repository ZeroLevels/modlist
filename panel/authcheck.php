<?php
if(!isset($_SESSION['usr']))
	header('Location: login.php', true, 302);
?>