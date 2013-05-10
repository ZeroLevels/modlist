<?php
session_start();
unset($_SESSION['usr']);
session_destroy();
header('Location: login.php', true, 302);
?>