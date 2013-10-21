<?php

/*
 * Attach the layout to the site and generate/check for cached mod list data.
 * TODO: incl. manual settings for no longer supported
 */
$this->respond(function ($request, $response, $service, $app) {
    $modlist_hash = md5_file('data/modlist.json');
    $modlist_cache = 'data/cache/' . $modlist_hash . '.json';
    if(file_exists($modlist_cache) || !file_exists($modlist_cache)) {
        $mod_list = json_decode(file_get_contents('data/modlist.json'), 1);
        $versions = array();
        $versions_count = array();
        foreach ($mod_list as $mod) {
            foreach ($mod['versions'] as $version) {
                if (!isset($versions_count[$version])) {
                    $versions_count[$version] = 0;
                }
                $versions_count[$version] += 1;
                if (!in_array($version, $versions, true)) {
                    array_push($versions, $version);
                }
            }
        }
        
        usort($versions, 'version_compare');

        foreach ($versions as $version) {
            $point = explode(".", $version);
            $major = $point[0] . '.' . $point[1];
            $versions_grouped[$major][$version] = $versions_count[$version];
        }
        
        foreach ($versions_grouped as $major => $verss) {
            $versions_grouped[$major] = array_reverse($verss);
        }
        
        $data = array(
            "versions" => $versions,
            "versions_grouped" => $versions_grouped,
            "versions_count" => $versions_count,
        );
        
        $encoded_data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($modlist_cache, $encoded_data);
    } else {
        $data = json_decode(file_get_contents($modlist_cache), true);
    }
    
    $service->versions = array_reverse($data['versions']);
    $service->versions_grouped = array_reverse($data['versions_grouped']);
    $service->versions_count = $data['versions_count'];
    $service->layout('html/layouts/panel.phtml');
});

/*
 * panel/login
 * Login form
 * @return page
 */

$this->respond('GET', '/login', function ($request, $response, $service, $app) {
    $service->render('html/panel/login.phtml');
});

/*
 * panel/process
 * Process login
 * @return page
 */

$this->respond('POST', '/login/process', function($request, $response, $service, $app) {
    $service->validateParam('username')->notNull()->isAlnum();
    $service->validateParam('password')->notNull();
    
    //TODO: Actually process the login
});