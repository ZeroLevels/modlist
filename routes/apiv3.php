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
    $service->validateParam('version','api')->notNull();
    
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
});

/*
 * api/v3/recent.json
 * Returns latest changes
 * 
 * @return page
 */

$this->respond('GET', '/recent.json', function ($request, $response, $service, $app) {
    //TODO: Configurable supported versions from panel
    $supported = array('1.7.2','1.6.4','1.5.2');
    $recent = array();
    foreach($supported as $ver) {
        $changelog_file = file("data/changelogs/$ver.txt");
        foreach($changelog_file as $line_num => $line) {
            if($line !== "\r\n" && $line !== "\n") {
                $recent[$ver][] = rtrim(str_replace("\t",'  ',$line));
            } else {
                break;
            }
        }
    }
    
    $response->noCache();
    $response->header('Content-Type', 'application/json');
    $response->body(json_encode($recent, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});

/*
 * api/v3/docs
 * Documentation
 * @return page
 */
$this->respond('GET', '/docs', function ($request, $response, $service, $app) {
    $service->render('html/content/apiv3.phtml');
});