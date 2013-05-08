<?php
$input = 'imagethread.php';
$output = '../resources/images/changelog.png';
file_put_contents($output, file_get_contents($input));
?>