<?php
session_start();
include('logger.php');
logfile($_SESSION['usr'],'logout');
unset($_SESSION['usr']);
session_destroy();
header('Location: login.php', true, 302);
?>