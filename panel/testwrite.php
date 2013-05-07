<?php    
$fp = fopen('test.txt', 'a') or die('fopen failed');

$ret = fwrite($fp, "testing!") or die('fwrite failed');

if ($ret === false)
	die("Fwrite failed");
echo ("fwrite wrote $ret bytes");
?>