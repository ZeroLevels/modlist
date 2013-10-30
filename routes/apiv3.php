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
        
        if($request->param('version') === 'all') {
            $newlist = $modlist;
        } else {
            foreach($modlist as &$mod) {
                if(in_array($request->param('version'),$mod['versions'],true)) {
                    array_push($newlist, $mod);
                }
            }
        }
        
        if($request->param('filetype') === 'json') {
            $response->json($newlist);
        }
        if($request->param('filetype') === 'md5') {
            $response->noCache();
            $response->header('Content-Type', 'text/plain');
            $response->body(md5(json_encode($newlist)));
        }
    }
});
