<?php

require_once 'vendor/autoload.php';

$klein = new \Klein\Klein();

/*
 * Attach the layout to the site and generate/check for cached mod list data.
 * TODO: incl. manual settings for no longer supported
 */
$klein->respond(function ($request, $response, $service, $app) {
    $modlist_hash = md5_file('resources/data/modlist.json');
    $modlist_cache = 'resources/data/cache/' . $modlist_hash . '.json';
    if(file_exists($modlist_cache) && time() - filemtime($modlist_cache) >= 600 || !file_exists($modlist_cache)) {
        $mod_list = json_decode(file_get_contents('resources/data/modlist.json'), 1);
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
        
        $data = array(
            "versions" => $versions,
            "versions_grouped" => $versions_grouped
        );
        
        $encoded_data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($modlist_cache, $encoded_data);
    } else {
        $data = json_decode(file_get_contents($modlist_cache), true);
    }
    
    $app->versions = array_reverse($data['versions']);
    $app->versions_grouped = array_reverse($data['versions_grouped']);
    $service->layout('html/layouts/modlist.phtml');
});

/*
 * /
 * homepage
 * @return page
 */
$klein->respond('GET', '/', function ($request, $response, $service, $app) {
   echo 'index!!!';
});

/*
 * latest/version or latest/changelog
 * Redirects to the latest version or changelog. 
 * TODO: caching as this is super inefficient (maybe generate a rendered list on new submission?)
 * @return redirect
 */
$klein->respond('GET', '/latest/[version|changelog:option]', function ($request, $response, $service, $app) {
    $response->redirect('/' . $request->param('option') . '/' . $app->versions[0]);
});

/*
 * version/latest or changelog/latest
 * Redirects to the correct latest page for version or changelog
 * @return redirect
 */
$klein->respond('GET', '/[version|changelog:option]/latest', function ($request, $response, $service, $app) {
    $response->redirect('/latest/' . $request->param('option'));
});

/*
 * version/1.6.4
 * Renders the modlist for the specified version. 
 * TODO: 404 if no mods exist in version
 * @return page
 */
$klein->respond('GET', '/version/[*:version]', function ($request, $response, $service, $app) {
    $mod_list = json_decode(file_get_contents('resources/data/modlist.json'), 1);
    foreach ($mod_list as $mod) {
        if(in_array($request->param('version'), $mod['versions'])) {
            $mods[] = $mod;
        }
    }
    $service->render('html/version/list.phtml', array('mods' => $mods));
});

/*
 * list/1.6.4
 * Redirects to the version page
 * @return redirect
 */
$klein->respond('GET', '/list/[*:version]', function ($request, $response, $service, $app) {
    $response->redirect('/version/' . $request->param('version'));
});

/*
 * changelog/1.6.4
 * Renders the changelog for the specified version. 
 * TODO: 404 if the changelog doesn't exist
 * @return page
 */
$klein->respond('GET', '/changelog/[*:version]', function ($request, $response, $service, $app) {
    $changelog = file_get_contents('resources/data/changelogs/' . $request->param('version') . '.txt');
    $service->render('html/changelog/log.phtml', array('changelog' => $changelog));
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
 * 404
 * If a page doesn't exist!
 * @return page
 */
$klein->respond('404', function ($request, $response, $service, $app) {
    echo '404';
});

$klein->dispatch();