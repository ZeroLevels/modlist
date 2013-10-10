<?php
$base = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$dir    = '..';
$versions = scandir($dir,1);
header("Location: $base" . 'changelog/' . $versions[2], true, 302);