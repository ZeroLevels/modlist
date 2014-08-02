<?php

$mod_list = json_decode(file_get_contents(__DIR__ . '/../../data/modlist.json'));
$import = new Modlist\Import($mod_list);
$import->convert();