<?php
header("Content-Type: text/plain; charset=UTF-8");
include('../magic.php');

if(isset($_GET['key'])) {
	echo base64_encode($_GET['key']) . "\n";
}
?>