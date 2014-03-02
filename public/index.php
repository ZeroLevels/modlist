<?php

date_default_timezone_set('UTC');

chdir('..');

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
        if($err_msg === 'submission') {
            $klein->response()->redirect('/submit/incomplete');
        }
        if($err_msg !== 'api' && $err_msg !== 'submission') {
            $klein->service()->back();
        }
    });
    
    $modlist_mtime = filemtime('data/modlist.json');
    $modlist_cache = 'data/cache/' . $modlist_mtime . '.json';
    if(!file_exists($modlist_cache)) {
        //Clear cache folder
        $obsolete = glob('data/cache/*');
        array_map('unlink',$obsolete);
        
        //Start saving new cache
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
    
    $service->uri = $request->uri();
    if($request->cookies()->theme === 'dark') {
        $service->themed = true;
    } else {
        $service->themed = false;
    }
    $service->cssVer = filemtime('public/resources/stylesheets/modlist.css');
    $service->cssPanelVer = filemtime('public/resources/stylesheets/panel.css');
    
    $service->layout('html/layouts/modlist.phtml');
});

$klein->with('/typeahead', 'routes/submission.php');
$klein->with('/panel', 'routes/panel.php');
$klein->with('/api/v3', 'routes/apiv3.php');

/*
 * Variable to allow programmatic 404 calls
 */
$notfound = function ($request, $response, $service, $app) {
   $logfile = 'data/404.json';
    $logs = file_exists($logfile) ? json_decode(file_get_contents($logfile), true) : array();
    
    $uri = $request->uri();
    $logs[$uri] = isset($logs[$uri]) ? ++$logs[$uri] : 1;
    
    $encoded_data = json_encode($logs, JSON_UNESCAPED_SLASHES);
    file_put_contents($logfile, $encoded_data);
    $service->uri = '';
    $service->render('html/404.html');
};

/*
 * /
 * homepage
 * @return page
 */
$klein->respond('GET', '/', function ($request, $response, $service, $app) {
   $service->render('html/home/index.phtml', array('specialjavascripts' => array(
            "/resources/js/home.min.js"
        )));
});

/*
 * latest/
 * Redirects to version/latest
 * @return redirect
 */
$klein->respond('GET', '/latest', function ($request, $response, $service, $app) {
    $response->redirect('/version/latest', 301);
    $response->send();
});

/*
 * latest/version or latest/changelog
 * Redirects to the correct latest page for version or changelog
 * TODO: caching as this is super inefficient (maybe generate a rendered list on new submission?)
 * @return redirect
 */
$klein->respond('GET', '/latest/[version|changelog:option]', function ($request, $response, $service, $app) {
    $response->redirect('/' . $request->param('option') . '/latest');
    $response->send();
});

/*
 * version/latest or changelog/latest
 * Redirects to the latest version or changelog
 * @return redirect
 */
$klein->respond('GET', '/[version|changelog:option]/latest', function ($request, $response, $service, $app, $klein) {
    $response->redirect('/' . $request->param('option') . '/' . $service->versions[0]);
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
 * @return page
 */
$klein->respond('GET', '/version/[*:version]', function ($request, $response, $service, $app) use ($notfound) {
    $version = $request->param('version');
    if($version === 'latest') {
        return;
    }
    if(!in_array($version, $service->versions)) {
        if($version === '1.4.6_1.4.7.php' || $version === '1.4.6_1.4.7') {
            $response->redirect('/version/1.4.7', 301);
            return;
        } else {
            return $notfound($request, $response, $service, $app);
        }
    }
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
        if(in_array($version,$mod['versions'],true)) {
            array_push($mods, $mod);
            array_push($mod_names, preg_replace("/[^a-z0-9]/", '', strtolower($mod['name'])));
        }
    }
    array_multisort($mod_names, SORT_ASC, $mods);
    
    $service->title = $version;
    $service->description = $service->versions_count[$version] . " mods listed on $version";
    $service->render('html/mods/list.phtml', array('version' => $version, 'mods' => $mods, 'type' => $type, 'forge' => $forge));
});

/*
 * random
 * Redirects to a random mod in the supported list
 * @return redirect
 */
$klein->respond('GET', '/random', function($request, $response, $service, $app) {
    //TODO: Use configurable json from panel
    $supported = array('1.7.2','1.6.4','1.5.2');
    $random = array();
    $version_redirect = '';
    $modlist = json_decode(file_get_contents('data/modlist.json'), true);
    while(empty($random)) {
        $id = mt_rand(0,count($modlist)-1);
        $mod = $modlist[$id];
        foreach($supported as $version) {
            if(in_array($version,$mod['versions'])) {
                $random = $mod;
                $version_redirect = max($mod['versions']);
                break;
            }
        }
        if(empty($random)) {
            unset($modlist[$id]);
        }
    }
    $anchor = preg_replace("/[^0-9a-zA-Z]/i", '', strtolower($random['name']));
    
    $response->redirect('/version/' . $version_redirect . '#' . $anchor);
});

/*
 * list
 * Redirects to the version listing
 * @return redirect
 */
$klein->respond('GET', '/list', function($request, $response, $service, $app) {
    $response->redirect('/version', 301);
});

/*
 * versions
 * Redirects to the version listing
 * @return redirect
 */
$klein->respond('GET', '/versions', function($request, $response, $service, $app) {
    $response->redirect('/version', 301);
});

/*
 * list/submit
 * Redirects to the submission page
 * @return redirect
 */
$klein->respond('GET', '/list/submit/[list.php]?', function($request, $response, $service, $app) {
    $response->redirect('/submit/', 301);
});

/*
 * list/1.6/1.6.4.php
 * Redirects to the version page
 * @return redirect
 */
$klein->respond('GET', '/list/[*:major]?/[*:version].[php]?', function ($request, $response, $service, $app) {
    if($request->param('major') !== 'submit' || $request->param('version') !== 'submit') {
        $version = $request->param('version');
        if(substr($version, -4, 4) === '.php') {
            $version = substr($version, 0, -4);
        }
        
        $version_ex = explode('_',$version);
        $version = array_pop($version_ex);
        
        $response->redirect("/version/$version");//, $code = 301);
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
        if($log !== '..' && $log !== '.') {
            $changelogs[] = substr($log, 0, -4);
        }
    }
    $service->title = 'Changelog Version List';
    $service->description = "List of changelogs for all listed versions";
    $service->render('html/changelog/index.phtml', array('changelogs' => $changelogs));
});

/*
 * changelog/1.6.4
 * Renders the changelog for the specified version.
 * @return page
 */
$klein->respond('GET', '/changelog/[*:version]', function ($request, $response, $service, $app) use ($notfound) {
    $version = $request->param('version');
    if($version === 'latest') {
        return;
    }
    $file = "data/changelogs/$version.txt";
    if(!file_exists($file)) {
        return $notfound($request, $response, $service, $app);
    }
    $changelog = file_get_contents($file);
    $service->title = "$version Changelog";
    $service->description = "Changelog for $version";
    $service->render('html/changelog/log.phtml', array('changelog' => $changelog));
});

/*
 * submit
 * Submission List
 * @return page
 */
$klein->respond('GET', '/submit', function ($request, $response, $service, $app) {
    $submission_list = json_decode(file_get_contents('data/submissions.json'), true);
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
    $service->title = 'Submission List';
    $service->description = "List of all queued submissions";
    $service->render('html/submit/index.phtml', array('submissions' => array_reverse($submissions), 'amount' => $amount));
});

/*
 * submit/form
 * Submission Form
 * @return page
 */
$klein->respond('GET', '/submit/[form|failed|success|incomplete:state]', function ($request, $response, $service, $app) {
    //TODO: Recode blacklist for panel access
    //TODO: Force blacklist on actual processing as well
    $blacklist = array();
    if(in_array($request->ip(),$blacklist)) {
        $service->render('html/submit/abuse.phtml');
    } else {
        $service->title = 'Submission Form';
        $service->description = "Submission form for requests";
        $service->render('html/submit/form.phtml', array('specialjavascripts' => array(
                "//cdnjs.cloudflare.com/ajax/libs/hogan.js/2.0.0/hogan.min.js",
                "//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.9.3/typeahead.min.js",
                "/resources/js/submission.min.js"
            ), 'state' => $request->param('state')));
    }
});

/*
 * submit/complete
 * Complete submission
 * @return redirect
 */

$klein->respond('POST', '/submit/complete', function ($request, $response, $service, $app) use ($klein) {
    $service->validateParam('request-type','submission')->notNull();
    $service->validateParam('name','submission')->notNull();
    $service->validateParam('versions','submission')->notNull();
    $service->validateParam('nothuman','robot')->null();
    
    if($request->param('request-type') === 'new') {
        $service->validateParam('link','submission')->notNull()->isUrl();
        $service->validateParam('desc','submission')->notNull();
        $service->validateParam('authors','submission')->notNull();
        $service->validateParam('forge','submission')->notNull();
        $service->validateParam('availability','submission')->notNull();
    }
    
    $id = 0;
    //Read existing submissions and add new one
    $submissions = 'data/submissions.json';
    if(file_exists($submissions)) {
        $submissions_data = json_decode(file_get_contents($submissions), true);
        if(count($submissions_data) > 0) {
            $last_submission = end($submissions_data);
            $id = $last_submission['id'] + 1;
        }
    }
    
    $mod = array(
        'id'            => $id,
        'timestamp'     => time(),
        'mode'          => $request->param('request-type') === 'new' ? 'New Mod' : 'Update Request',
        'name'          => $request->param('name'),
        'link'          => $request->param('link',null),
        'desc'          => $request->param('desc',null),
        'author'        => $request->param('authors',null),
        'source'        => $request->param('source'),
        'compatibility' => $request->param('forge',null),
        'availability'  => $request->param('availability',null),
        'versions'      => $request->param('versions'),
        'other'         => $request->param('other'),
        'origin'        => $request->ip()
    );
    
    array_push($submissions_data, $mod);
    
    //Save submissions
    $encoded_data = json_encode($submissions_data, JSON_UNESCAPED_SLASHES);
    file_put_contents($submissions, $encoded_data);
    
    //Create new PHPMailer instance
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug    = 0;
    $mail->Host         = 'smtp.gmail.com';
    $mail->Port         = 587;
    $mail->SMTPSecure   = 'tls';
    $mail->SMTPAuth     = true;
    $mail->Username     = GMAIL_USER;
    $mail->Password     = GMAIL_PASS;
    $mail->setFrom(GMAIL_USER, GMAIL_NAME);
    $mail->addReplyTo(GMAIL_USER, GMAIL_NAME);
    
    //Load e-mails to send to
    $users_cache = 'data/users.json';
    if(file_exists($users_cache)) {
        $users = json_decode(file_get_contents($users_cache), 1);
        foreach($users as $user) {
            if($user['send_email'] === true) {
                if(isset($user['alt_email'])) {
                    $mail->addAddress($user['alt_email'], $user['user']);
                } else {
                    $mail->addAddress($user['email'], $user['user']);
                }
            }
        }
    }
    
    //Select type of Subject
    if($request->param('request-type') === 'new') {
        $mail->Subject  = 'New Mod - ' . $request->param('name');
    } else {
        $mail->Subject  = 'Update Request - ' . $request->param('name');
    }
    
    //Use Klein to render partial and extract render
    $service->partial('html/layouts/mail.phtml',array('mod' => $mod));
    $mail->msgHTML(ob_get_clean());
    
    $service->partial('html/layouts/mail_alt.phtml',array('mod' => $mod));
    $mail->AltBody = ob_get_clean();
    
    if(!$mail->Send()) {
        $response->redirect('/submit/failed');
    } else {
        $response->redirect('/submit/success');
    }
    $response->send();
    exit();
});

/*
 * options/theme/light or options/theme/dark
 * Change the theme and return to previous page
 * @return redirect
 */
$klein->respond('GET', '/options/theme/[light|dark:color]', function ($request, $response, $service, $app) {
    $response->cookie(
            'theme',
            $request->param('color'),
            2147483647
            );
    $service->back();
});

/*
 * apiv2.php
 * Legacy APIv2 - removed key requirement
 * TODO: remove on next version
 * @deprecated
 * @return page
 */
$klein->respond('GET', '/apiv2.php', function ($request, $response, $service, $app) {
    $service->validateParam('request','api')->notNull()->isAlpha();
    $service->validateParam('version','api')->notNull();
    
    $modlist = json_decode(file_get_contents('data/modlist.json'), true);
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
    if($request->param('request') === 'json') {
        $response->header('Content-Type', 'application/json');
        $response->body(json_encode($newlist, JSON_UNESCAPED_SLASHES));
    }
    if($request->param('request') === 'hash') {
        $response->header('Content-Type', 'text/plain');
        $response->body(md5(json_encode($newlist, JSON_UNESCAPED_SLASHES)));
    }
    
});

/*
 * api.php
 * Legacy APIv1 - responds with notification
 * @deprecated
 * @return page
 */
$klein->respond('GET', '/api.php', function ($request, $response, $service, $app) {
    $service->validateParam('request','api')->notNull()->isAlpha();
    $service->validateParam('version','api')->notNull();
    
    $newlist = array();
    $newlist['name']            = 'Outdated API';
    $newlist['other']           = '';
    $newlist['link']            = 'http://modlist.mcf.li';
    $newlist['desc']            = 'This application is using an outdated API version. The developer has likely created a new version of the app, update to the latest version!';
    $newlist['author']          = 'GrygrFlzr';
    $newlist['type']            = array('Universal');
    $newlist['dependencies']    = array('Forge Required');
    $newlist['versions']        = array('1.7.2','1.6.4','1.5.2');
    
    $response->noCache();
    if($request->param('request') === 'json') {
        $response->header('Content-Type', 'application/json');
        $response->body(json_encode($newlist, JSON_UNESCAPED_SLASHES));
    }
    if($request->param('request') === 'hash') {
        $response->header('Content-Type', 'text/plain');
        $response->body(md5(json_encode($newlist, JSON_UNESCAPED_SLASHES)));
    }
});

/*
 * content
 * Version content pages (eg: banners, credits, faq, history)
 * @return page
 */
$klein->respond('GET', '/[banners|credits|faq|history|igml|options:page]', function ($request, $response, $service, $app) {
    $service->render('html/content/' . $request->param('page') . '.phtml');
});

/*
 * API docs redirect
 * @return redirect
 */
$klein->respond('GET', '/api_docs', function ($request, $response, $service, $app) {
    $response->redirect('/api/v3/docs');
});

/*
 * old
 * Redirect /old to old.modlist.mcf.li for ZeroLevels's history :-)
 * @return redirect
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
$klein->respond('404', $notfound);

$klein->dispatch();