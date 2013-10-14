<?php

require_once 'vendor/autoload.php';

$klein = new \Klein\Klein();

// using /v/ so as not to conflict with the current /version/ folder
$klein->respond('GET', '/v/[*:version]', function ($request, $response, $service){
    $mod_list = json_decode(file_get_contents('resources/data/modlist.json'), 1);
    foreach($mod_list as $mod) {
        if(in_array($request->param('version'), $mod['versions'])) {
            $mods[] = $mod;
        }
    }
    $service->render('html/list.phtml', array('mods' => $mods));
});

$klein->dispatch();