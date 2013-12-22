<?php

/*
 * api/v3/version.json
 * Return list for specified version
 * 
 * api/v3/version.md5
 * Return md5 hash for specified version
 * 
 * @return page
 */

$this->respond('GET', '/[*:version].[json|md5:filetype]', function ($request, $response, $service, $app) {
    if($request->param('version') !== '') {
        $modlist = json_decode(file_get_contents('data/modlist.json'), 1);
        $newlist = array();
        $mod_names = array();
        
        if($request->param('version') === 'all') {
            $newlist = $modlist;
            foreach($modlist as $mod) {
                array_push($mod_names, preg_replace("/[^a-z0-9]/", '', strtolower($mod['name'])));
            }
        } else {
            foreach($modlist as $mod) {
                if(in_array($request->param('version'),$mod['versions'],true)) {
                    array_push($newlist, $mod);
                    array_push($mod_names, preg_replace("/[^a-z0-9]/", '', strtolower($mod['name'])));
                }
            }
        }
        array_multisort($mod_names, SORT_ASC, $newlist);
        
        $response->noCache();
        if($request->param('filetype') === 'json') {
            $response->header('Content-Type', 'application/json');
            $response->body(json_encode($newlist, JSON_UNESCAPED_SLASHES));
        }
        if($request->param('filetype') === 'md5') {
            $response->header('Content-Type', 'text/plain');
            $response->body(md5(json_encode($newlist, JSON_UNESCAPED_SLASHES)));
        }
    }
});
