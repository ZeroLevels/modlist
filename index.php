<?php

require_once 'vendor/autoload.php';

$klein = new \Klein\Klein();

/*
 * latest/version or latest/changelog
 * Redirects to the latest version or changelog. TODO: caching as this is super inefficient (maybe generate a rendered list on new submission?)
 * @return redirect
 */
$klein->respond('GET', '/latest/[version|changelog:option]', function ($request, $response, $service) {
    $mod_list = json_decode(file_get_contents('resources/data/modlist.json'), 1);
    $versions = array();
    foreach ($mod_list as $mod) {
        foreach ($mod['versions'] as $version) {
            if (!in_array($version, $versions)) {
                array_push($versions, $version);
            }
        }
    }
    usort($versions, 'version_compare');
    $latest_version = array_reverse($versions)[0];
    $response->redirect('/' . $request->param('option') . '/' . $latest_version);
});

/*
 * version/latest or changelog/latest
 * Redirects to the correct latest page for version or changelog
 * @return redirect
 */
$klein->respond('GET', '/[version|changelog:option]/latest', function ($request, $response, $service) {
    $response->redirect('/latest/' . $request->param('option'));
});

/*
 * version/1.6.4
 * Renders the modlist for the specified version. TODO: 404 if no mods exist in version
 * @return page
 */
$klein->respond('GET', '/version/[*:version]', function ($request, $response, $service) {
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
$klein->respond('GET', '/list/[*:version]', function ($request, $response, $service) {
    $response->redirect('/version/' . $request->param('version'));
});

/*
 * changelog/1.6.4
 * Renders the changelog for the specified version. TODO: 404 if the changelog doesn't exist
 * @return page
 */
$klein->respond('GET', '/changelog/[*:version]', function ($request, $response, $service) {
    $changelog = file_get_contents('resources/data/changelogs/' . $request->param('version') . '.txt');
    $service->render('html/changelog/log.phtml', array('changelog' => $changelog));
});

/*
 * content
 * Version content pages (eg: banners, credits, faq, history)
 * @return page
 */
$klein->respond('GET', '/[banners|credits|faq|history|igml:page]', function ($request, $response, $service) {
    $service->render('html/content/' . $request->param('page') . '.phtml');
});

$klein->dispatch();