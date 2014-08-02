<?php
require_once __DIR__ . '/../../bootstrap.php';

function p($string) { echo $string . "\n"; }

p('Installing Database');
require_once 'database.php';

p('Adding all the mods...');
require_once 'import.php';

p('Site is ready to go!');