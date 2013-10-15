<?php

date_default_timezone_set('UTC');

require_once 'vendor/autoload.php';
require_once 'helpers/mods.php';

$klein = new \Klein\Klein();

$klein->with('/typeahead', 'routes/submission.php');

/*
 * Attach the layout to the site and generate/check for cached mod list data.
 * TODO: incl. manual settings for no longer supported
 */
$klein->respond(function ($request, $response, $service, $app) {
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
                if (!in_array($version, $versions)) {
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
    $service->layout('html/layouts/modlist.phtml');
});

/*
 * /
 * homepage
 * @return page
 */
$klein->respond('GET', '/', function ($request, $response, $service, $app) {
   $service->render('html/home/index.phtml');
});

/*
 * latest/version or latest/changelog
 * Redirects to the latest version or changelog. 
 * TODO: caching as this is super inefficient (maybe generate a rendered list on new submission?)
 * @return redirect
 */
$klein->respond('GET', '/latest/[version|changelog:option]', function ($request, $response, $service, $app) {
    $response->redirect('/' . $request->param('option') . '/' . $service->versions[0]);
    $response->send();
});

/*
 * version/latest or changelog/latest
 * Redirects to the correct latest page for version or changelog
 * @return redirect
 */
$klein->respond('GET', '/[version|changelog:option]/latest', function ($request, $response, $service, $app, $klein) {
    $response->redirect('/latest/' . $request->param('option'));
    $response->send();
});

/*
 * version
 * List all available versions
 * @return page
 */
$klein->respond('GET', '/version', function ($request, $response, $service, $app) {
    $service->render('html/changelog/index.phtml', array('title' => 'Version List'));
});

/*
 * version/1.6.4
 * Renders the modlist for the specified version. 
 * TODO: 404 if no mods exist in version
 * @return page
 */
$klein->respond('GET', '/version/[*:version]', function ($request, $response, $service, $app) {
    $mod_list = json_decode(file_get_contents('data/modlist.json'), true);
    
    $forge = array(
        'forge-required' => 'success',
        'forge-compatible' => 'primary',
        'not-forge-compatible' => 'danger'
    );

    $type = array(
        'Universal' => 'Universal',
        'Client' => 'Clientside',
        'Server' => 'Serverside',
        'SSP' => 'SSP',
        'SMP' => 'SMP',
        'LAN' => 'LAN',
        'N/A' => 'N/A'
    );
    
    $mods = array();
    foreach ($mod_list as $key => $mod) {
        foreach($mod['versions'] as $version) {
            if($version == $request->param('version')) {
                $mod_key = array_push($mods, $mod);
                $mod_names[$mod_key] = preg_replace("/[^A-Za-z0-9 ]/", '', $mod['name']);
            }
        }
    }
    
    asort($mod_names);
    
    $sorted_mods = array();
    foreach ($mod_names as $key => $mod_name) {
        $sorted_mods[] = $mods[$key - 1];
    }
    
    $service->render('html/mods/list.phtml', array('version' => $request->param('version'), 'mods' => $sorted_mods, 'type' => $type, 'forge' => $forge));
});

/*
 * list/1.6/1.6.4.php
 * Redirects to the version page
 * @return redirect
 */
$klein->respond('GET', '/list/[*]?/[*:version]', function ($request, $response, $service, $app) {
    if(substr($request->param('version'), -4, 4) == '.php')
        $response->redirect('/version/' . substr($request->param('version'), 0, -4));
    else
        $response->redirect('/version/' . $request->param('version'));
    $response->send();
});

/*
 * changelog
 * List all available changelogs
 * @return page
 */
$klein->respond('GET', '/changelog', function ($request, $response, $service, $app) {
    $logs = scandir('data/changelogs', 1);
    foreach ($logs as $log) {
        $changelogs[] = substr($log, 0, -4);
    }
    $service->render('html/changelog/index.phtml', array('title' => 'Changelog Version List','changelogs' => $changelogs));
});

/*
 * changelog/1.6.4
 * Renders the changelog for the specified version. 
 * TODO: 404 if the changelog doesn't exist
 * @return page
 */
$klein->respond('GET', '/changelog/[*:version]', function ($request, $response, $service, $app) {
    $changelog = file_get_contents('data/changelogs/' . $request->param('version') . '.txt');
    $service->render('html/changelog/log.phtml', array('changelog' => $changelog));
});

/*
 * submit/form
 * Submission Form
 * @return page
 */
$klein->respond('GET', '/submit/form', function ($request, $response, $service, $app) {
    $service->render('html/submit/form.phtml', array('specialjavascripts' => array(
            "//cdnjs.cloudflare.com/ajax/libs/hogan.js/2.0.0/hogan.min.js",
            "//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.9.3/typeahead.min.js",
            "/resources/js/submission.js"
        )));
});

/*
 * content
 * Version content pages (eg: banners, credits, faq, history)
 * @return page
 */
$klein->respond('GET', '/[banners|credits|faq|history|igml|api_docs:page]', function ($request, $response, $service, $app) {
    $service->render('html/content/' . $request->param('page') . '.phtml');
});

/*
 * old
 * Redirect /old to old.modlist.mcf.li for ZeroLevels's history :-)
 * @return page
 */
$klein->respond('GET', '/old', function ($request, $response, $service, $app) {
    $response->redirect('http://old.modlist.mcf.li/');
    $response->send();
});

/*
 * 404
 * If a page doesn't exist!
 * @return page
 */
$klein->respond('404', function ($request, $response, $service, $app) {
    $service->render('html/404.html');
});

$klein->dispatch();