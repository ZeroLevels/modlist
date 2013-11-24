<?php

date_default_timezone_set('UTC');

require_once 'vendor/autoload.php';
require_once 'helpers/mods.php';
require_once 'data/config.php';

$klein = new \Klein\Klein();

/*
 * Attach the layout to the site and generate/check for cached mod list data.
 * TODO: incl. manual settings for no longer supported
 */
$klein->respond(function ($request, $response, $service, $app) use ($klein) {
    $klein->onError(function ($klein, $err_msg) {
        $klein->service()->flash($err_msg);
        if($err_msg === 'robot') {
            //TODO: Log and blacklist spambot IPs
        }
        $klein->service()->back();
    });
    
    $modlist_hash = filemtime('data/modlist.json');
    $modlist_cache = 'data/cache/' . $modlist_hash . '.json';
    if(!file_exists($modlist_cache)) {
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
    $service->layout('html/layouts/modlist.phtml');
});

$klein->with('/typeahead', 'routes/submission.php');
$klein->with('/panel', 'routes/panel.php');
$klein->with('/api/v3', 'routes/apiv3.php');

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
    $service->title = 'Version List';
    $service->render('html/changelog/index.phtml');
});

/*
 * version/1.6.4
 * Renders the modlist for the specified version. 
 * TODO: 404 if no mods exist in version
 * @return page
 */
$klein->respond('GET', '/version/[*:version]', function ($request, $response, $service, $app) {
    if($request->param('version') === 'latest')
        return;
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
    $mod_names = array();
    foreach ($mod_list as $mod) {
        if(in_array($request->param('version'),$mod['versions'],true)) {
            array_push($mods, $mod);
            array_push($mod_names, preg_replace("/[^a-z0-9]/", '', strtolower($mod['name'])));
        }
    }
    array_multisort($mod_names, SORT_ASC, $mods);
    
    $service->render('html/mods/list.phtml', array('version' => $request->param('version'), 'mods' => $mods, 'type' => $type, 'forge' => $forge));
});

/*
 * list/submit
 * Redirects to the submission page
 * @return redirect
 */
$klein->respond('GET', '/list/submit/[list.php]?', function($request, $response, $service, $app) {
    $response->redirect('/submit/', $code = 301);
});

/*
 * list/1.6/1.6.4.php
 * Redirects to the version page
 * @return redirect
 */
$klein->respond('GET', '/list/[*:major]?/[*:version]', function ($request, $response, $service, $app) {
    if($request->param('major') !== 'submit' || $request->param('version') !== 'submit') {
        if(substr($request->param('version'), -4, 4) === '.php')
            $response->redirect('/version/' . substr($request->param('version'), 0, -4), $code = 301);
        else
            $response->redirect('/version/' . $request->param('version'), $code = 301);
        $response->send();
    }
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
    $service->title = 'Changelog Version List';
    $service->render('html/changelog/index.phtml', array('changelogs' => $changelogs));
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
 * submit
 * Submission List
 * @return page
 */
$klein->respond('GET', '/submit', function ($request, $response, $service, $app) {
    $submission_list = json_decode(file_get_contents('panel/secrets/submissions.json'), true);
    $submissions = array();
    $amount['update'] = 0;
    $amount['new'] = 0;
    $amount['total'] = count($submission_list);
    foreach($submission_list as $submission) {
        if(!isset($submission['complete'])) {
            array_push($submissions, $submission);
        } else {
            if($submission['mode'] === 'Update Request') {
                $amount['update'] += 1;
            } else {
                $amount['new'] += 1;
            }
        }
    }
    $service->render('html/submit/index.phtml', array('versions' => $service->versions, 'submissions' => array_reverse($submissions), 'amount' => $amount));
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
        )), array('versions' => $service->versions));
});

/*
 * TODO: Process submission
 * submit/complete
 * Complete submission
 * @return redirect
 */

$klein->respond('POST', '/submit/complete', function ($request, $response, $service, $app) {    
    $service->validateParam('request-type')->notNull();
    $service->validateParam('name')->notNull();
    $service->validateParam('versions')->notNull();
    $service->validateParam('source')->isUrl();
    $service->validateParam('nothuman','robot')->null();
    
    if($request->param('request-type') === 'new') {
        $service->validateParam('link')->notNull()->isUrl();
        $service->validateParam('desc')->notNull();
        $service->validateParam('authors')->notNull();
        $service->validateParam('forge')->notNull();
        $service->validateParam('availability')->notNull();
    }
    $response->dump($_POST);
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host         = 'smtp.gmail.com';
    $mail->Port         = 587;
    $mail->SMTPSecure   = 'tls';
    $mail->SMTPAuth     = true;
    $mail->Username     = '';
    $mail->Password     = '';
    $mail->SetFrom('', 'MCF Modlist');
    $mail->AddReplyTo('', 'MCF Modlist');
    $mail->AddAddress('', '');
    $mail->AddAddress('', '');
    
    if($request->param('request-type') === 'new') {
        $mail->Subject  = 'New Mod - ' . $request->param('name');
    } else {
        $mail->Subject  = 'Update Request - ' . $request->param('name');
    }
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