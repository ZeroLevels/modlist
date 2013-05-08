<?php
$input = 'index.php';
$output = '../../resources/images/changelog.php';
file_put_contents($output, file_get_contents($input));
?>