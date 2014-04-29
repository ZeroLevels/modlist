<?php
session_start();

require_once 'helpers/permissions.php';
require_once 'helpers/bitly.php';

/*
 * Attach layout and load submissions for usage
 */
$this->respond(function ($request, $response, $service, $app) {
    $submissions = json_decode(file_get_contents('data/submissions.json'), true);
    
    $mode = array(
        'New Mod' => 'info',
        'Update Request' => 'primary'
    );
    
    //TODO: Make submissions.json consistent
    $forge = array(
        'required' => 'Forge Required',
        'Forge Required' => 'Forge Required',
        'compatible' => 'Forge Compatible',
        'Forge Compatible' => 'Forge Compatible',
        'notcompatible' => 'Not Forge Compatible',
        'Not Forge Compatible' => 'Not Forge Compatible'
    );
    
    $forgecolor = array(
        'required' => 'success',
        'Forge Required' => 'success',
        'compatible' => 'primary',
        'Forge Compatible' => 'primary',
        'notcompatible' => 'danger',
        'Not Forge Compatible' => 'danger'
    );
    
    $service->submissions = $submissions;
    $service->mode        = $mode;
    $service->forge       = $forge;
    $service->forgecolor  = $forgecolor;
    
    $service->permissions = new Modlist\Permissions();
    if(isset($_SESSION['access_level'])) {
        $service->permissions->setAccessLevel($_SESSION['access_level']);
    }
    
    $service->layout('html/layouts/panel.phtml');
});

/*
 * panel/*
 * Login check
 * @return redirect
 */

$this->respond('!@^/login', function ($request, $response, $service, $app) {
    if(!isset($_SESSION['access_token'])) {
        $_SESSION['prev_path'] = $request->pathname();
        $response->redirect('/panel/login/start');
        $response->send();
    }
});

/*
 * panel/
 * Panel Root
 * @return redirect
 */

$this->respond('GET', '/?', function ($request, $response, $service, $app) {
    $response->redirect('/panel/login');
    $response->send();
});

/*
 * panel/login
 * Initiate login or redirect back to home
 * @return page
 */

$this->respond('GET', '/login', function ($request, $response, $service, $app) {
    if(!isset($_SESSION['access_token'])) {
        //Not logged in
        $service->layout('html/layouts/panel_login.phtml');
        $service->render('html/panel/login.phtml');
    } else {
        //Logged in
        $response->redirect('/panel/home');
        $response->send();
    }
});

/*
 * panel/login/start
 * Initiate login or redirect back to home
 * @return redirect
 */

$this->respond('GET', '/login/start', function ($request, $response, $service, $app) {
    if(!isset($_SESSION['access_token'])) {
        //Redirect to github to initiate login process
        $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . session_id());
        $response->redirect('https://github.com/login/oauth/authorize?' .
                http_build_query(array(
                    'client_id'    => GITHUB_OAUTH_ID,
                    'redirect_uri' => GITHUB_CALLBACK_URL,
                    'scope'        => 'user:email',
                    'state'        => $_SESSION['state']
                )));
    } else {
        //Logged in
        $response->redirect('/panel/home');
    }
    $response->send();
});

/*
 * panel/login/process
 * Process login
 * @return redirect
 */

$this->respond('GET', '/login/process', function($request, $response, $service, $app) {
    if($request->param('state') === $_SESSION['state']) {
        //Valid session
        
        //Build request
        $post = http_build_query(array(
            'client_id'     => GITHUB_OAUTH_ID,
            'client_secret' => GITHUB_OAUTH_SECRET,
            'code'          => $request->param('code'),
            'redirect_uri'  => GITHUB_CALLBACK_URL
        ));
        $context = stream_context_create(array('http' => array(
            'method' => 'POST',
            'header' => 'User-Agent: MCF Modlist' . "\r\n" .
                        'Content-Type: application/x-www-form-urlencoded' . "\r\n" .
                        'Content-Length: ' . strlen($post) . "\r\n" . 
                        'Accept: application/json',
            'content' => $post
        )));
        
        //Request access token
        $token_data = json_decode(file_get_contents('https://github.com/login/oauth/access_token', false, $context), true);
        $access_token             = $token_data['access_token'];
        $_SESSION['access_token'] = $access_token;
        
        $users = array();
        
        $users_cache = 'data/users.json';
        
        if(file_exists($users_cache)) {
            $users = json_decode(file_get_contents($users_cache), 1);
        }
        
        if(!isset($users[$access_token])) {
            //New user - build request again
            $context = stream_context_create(array('http' => array(
                'method' => 'GET',
                'header' => 'User-Agent: MCF Modlist' . "\r\n" .
                            'Accept: application/json'
            )));

            //Request basic user information
            $user_data = json_decode(file_get_contents('https://api.github.com/user?access_token=' . $_SESSION['access_token'], false, $context), true);
            $_SESSION['id']     = $user_data['id'];
            $_SESSION['user']   = $user_data['login'];
            $_SESSION['avatar'] = $user_data['avatar_url'];
            
            //Build request again
            $context = stream_context_create(array('http' => array(
                'method' => 'GET',
                'header' => 'User-Agent: MCF Modlist' . "\r\n" .
                            'Accept: application/vnd.github.v3+json'
            )));
            
            //Request email
            $emails = json_decode(file_get_contents('https://api.github.com/user/emails?access_token=' . $_SESSION['access_token'], false, $context), true);
            $_SESSION['email'] = $emails[0]['email'];
            $_SESSION['access_level'] = 'user';
            $_SESSION['send_email'] = false;
            $_SESSION['registered'] = time();
            $_SESSION['last_login'] = time();
            
            //Check if user owns any open source mods
            $repo = 'https://github.com/' . $_SESSION['user'];
            $modlist = json_decode(file_get_contents('data/modlist.json'), true);
            foreach($modlist as $mod) {
                if(isset($mod['source'])) {
                    if(substr($mod['source'],0,strlen($repo)) === $repo) {
                        //Elevate to modder status automatically
                        $_SESSION['access_level'] = 'creator';
                        break;
                    }
                }
            }
            
            //Save data
            $users[$access_token] = $_SESSION;
            $encoded_data = json_encode($users, JSON_PRETTY_PRINT);
            file_put_contents($users_cache, $encoded_data);
        } else {
            //Load from cache - don't request to GitHub
            $prev_path         = $_SESSION['prev_path'];
            $_SESSION          = $users[$access_token];
            $_SESSION['state'] = $request->param('state');
            
            //Change last login time and save data
            $users[$access_token]['last_login'] = time();
            $encoded_data = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            file_put_contents($users_cache, $encoded_data);
        }
        
        //Redirect to home page
        if(isset($prev_path)) {
            $response->redirect($prev_path);
        } else {
            $response->redirect('/panel/home');
        }
        $response->send();
    } else {
        //A third party has tampered with the authentication
        $response->body('Someone tried to tamper with the request - it is recommended to change your password.');
    }
});

/*
 * panel/logout
 * Log out of the panel
 * @return redirect
 */
$this->respond('GET', '/logout', function ($request, $response, $service, $app) {
    session_destroy();
    $response->redirect('/panel/login');
    $response->send();
});

/*
 * panel/home
 * Panel Home
 * @return page
 */
$this->respond('GET', '/home', function ($request, $response, $service, $app) {
    $recent_list = array();
    foreach(array_reverse($service->submissions) as $sub) {
        if(!isset($sub['complete'])) {
            array_push($recent_list, $sub);
            if(count($recent_list) === 10) {
                break;
            }
        }
    }
    
    $missing = json_decode(file_get_contents('data/404.json'), true);
    arsort($missing);
    
    $userlist = json_decode(file_get_contents('data/users.json'), true);
    $registered = array();
    foreach($userlist as $user) {
        $registered[] = $user['registered'];
    }
    array_multisort($registered, SORT_DESC, $userlist);
    
    $service->render('html/panel/home.phtml', array(
        'recent'   => $recent_list,
        'missing'  => array_slice($missing,0,10,true),
        'userlist' => array_slice($userlist,0,10,true)
    ));
});

/*
 * panel/userlist
 * Panel Userlist
 * @return page
 */
$this->respond('GET', '/userlist', function ($request, $response, $service, $app) {
    if(!$service->permissions->canAccess('panel.userlist.view')) {
        $service->render('html/panel/forbidden.phtml');
        return;
    }
    
    $userlist = json_decode(file_get_contents('data/users.json'), true);
    $registered = array();
    foreach($userlist as $user) {
        $registered[] = $user['registered'];
    }
    array_multisort($registered, SORT_ASC, $userlist);
    
    $service->render('html/panel/userlist.phtml', array(
        'userlist' => $userlist
    ));
});

/*
 * panel/userlist/reload
 * Reload data from GitHub
 * @return redirect
 */
$this->respond('GET', '/userlist/reload/[*:apikey]', function ($request, $response, $service, $app) {
    if(!$service->permissions->canAccess('panel.userlist.reload')) {
        $service->render('html/panel/forbidden.phtml');
        return;
    }
    
    $users = array();
    $users_cache = 'data/users.json';
    if(file_exists($users_cache)) {
        $users = json_decode(file_get_contents($users_cache), 1);
    }
    $access_token = $request->param('apikey');
    $curruser = $users[$access_token];
    
    //New user - build request
    $context = stream_context_create(array('http' => array(
        'method' => 'GET',
        'header' => 'User-Agent: MCF Modlist' . "\r\n" .
                    'Accept: application/json'
    )));

    //Request basic user information
    $user_data = json_decode(file_get_contents('https://api.github.com/user?access_token=' . $curruser['access_token'], false, $context), true);
    $curruser['id']     = $user_data['id'];
    $curruser['user']   = $user_data['login'];
    $curruser['avatar'] = $user_data['avatar_url'];

    //Build request again
    $context = stream_context_create(array('http' => array(
        'method' => 'GET',
        'header' => 'User-Agent: MCF Modlist' . "\r\n" .
                    'Accept: application/vnd.github.v3+json'
    )));

    //Request email
    $emails = json_decode(file_get_contents('https://api.github.com/user/emails?access_token=' . $curruser['access_token'], false, $context), true);
    $curruser['email'] = $emails[0]['email'];

    //Save data
    $users[$access_token] = $curruser;
    $encoded_data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents($users_cache, $encoded_data);
    
    $response->redirect('/panel/userlist');
    $response->send();
});

/*
 * panel/elevate
 * Elevate user
 * @return redirect
 */
$this->respond('GET', '/elevate/[*:user]/[*:level]', function ($request, $response, $service, $app) {
    if(!$service->permissions->canAccess('panel.userlist.elevate')) {
        $service->render('html/panel/forbidden.phtml');
        return;
    }
    
    //TODO: Dynamic permissions
    $permlist = array('mod','creator','user');
    
    if(!in_array($request->param('level'), $permlist)) {
        return;
    }
    
    $userlist = json_decode(file_get_contents('data/users.json'), true);
    foreach($userlist as &$user) {
        if($user['user'] === $request->param('user')) {
            $user['access_level'] = $request->param('level');
            break;
        }
    }
    
    $encoded_data = json_encode($userlist, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents('data/users.json', $encoded_data);
    
    $response->redirect('/panel/userlist');
    $response->send();
});

/*
 * panel/submission
 * Submission list
 * @return page
 */

$this->respond('GET', '/[submission|submission-all:hidden]', function ($request, $response, $service, $app) {
    $hidden = $request->param('hidden') === 'submission' ? true : false;
    $final_list = array();
    foreach($service->submissions as $sub) {
        if(!$hidden || !isset($sub['complete'])) {
            if(
                !isset($sub['versions']) ||
                $sub['mode'] === 'New Mod' && (
                    empty($sub['link']) ||
                    empty($sub['desc']) ||
                    empty($sub['author']) ||
                    empty($sub['name'])
                )
            ) {
                $sub['incomplete'] = true;
            }
            array_push($final_list, $sub);
        }
    }
    $final_list = array_reverse($final_list);
    
    $service->render('html/panel/submission_list.phtml', array(
        'submissions' => $final_list,
        'mode'        => $service->mode,
        'forge'       => $service->forge,
        'forgecolor'  => $service->forgecolor
    ));
});

/*
 * panel/submission/download
 * Proxy to submissions.json
 * @return page
 */

$this->respond('GET', '/submission/download', function ($request, $response, $service, $app) {
    $response->noCache();
    $response->header('Content-Type', 'application/json');
    $response->body(file_get_contents('data/submissions.json'));
});

/*
 * panel/submission/1234
 * Submission page for specific request
 * @return page
 */

$this->respond('GET', '/submission/[*:id]', function ($request, $response, $service, $app) {
    if($request->param('id') === 'download') {
        return;
    }
    if(!$service->permissions->canAccess('panel.submission.view')) {
        $service->render('html/panel/forbidden.phtml');
        return;
    }
    
    //TODO: Restructure submissions.json?
    $submission = $service->submissions[$request->param('id')];
    
    $mode = isset($submission['edit_data']['mode']) ? $submission['edit_data']['mode'] : $submission['mode'];
    
    if($mode === 'Update Request') {
        $mods = json_decode(file_get_contents('data/modlist.json'), true);
        foreach($mods as $mod) {
            if(strtolower($mod['name']) === strtolower($submission['name'])) {
                $submission['author'] = implode(', ', $mod['author']);
                $submission['link'] = $mod['link'];
                $submission['desc'] = $mod['desc'];
                $submission['availability'] = $mod['type'];
                
                //TODO: Fix workaround code - relies on first of array being Forge
                $submission['compatibility'] = array_shift($mod['dependencies']);
                
                $submission['oldversions'] = $mod['versions'];
                
                break;
            }
        }
    }
    
    if(!isset($submission['edit_data'])) {
        $submission['edit_data']                 = $submission;
        $submission['edit_data']['author']       = array_map('trim', explode(',', $submission['author'],null));
        $submission['edit_data']['dependencies'] = array($service->forge[$submission['compatibility']]);
        $submission['edit_data']['type']         = $submission['availability'];
        $submission['edit_data']['other']        = '';
    }
    
    $duplicates = array();
    
    foreach($service->submissions as $sub) {
        if(!isset($sub['complete']) && $sub['id'] !== $submission['id']) {
            if(strtolower($sub['name']) === strtolower($submission['name'])) {
                array_push($duplicates, $sub);
            }
        }
    }
    
    $service->render('html/panel/submission.phtml', array(
        'submission'  => $submission,
        'duplicates'  => $duplicates,
        'mode'        => $service->mode,
        'forge'       => $service->forge,
        'forgecolor'  => $service->forgecolor
    ));
});

/*
 * panel/submission/1234/save
 * Save submission for later or add to queue
 * @return redirect|page
 */

$this->respond('POST', '/submission/[*:id]/save', function ($request, $response, $service, $app) {
    if(!$service->permissions->canAccess('panel.submission.edit')) {
        $service->render('html/panel/forbidden.phtml');
        return;
    }
    
    $submission_list = $service->submissions;
    $submission = $submission_list[$request->param('id')];
    
    $edit_data = array(
        'mode'         => $request->param('request-type') === 'new' ? 'New Mod' : 'Update Request',
        'name'         => $request->param('name'),
        'other'        => $request->param('other'),
        'link'         => $request->param('link',null),
        'desc'         => $request->param('desc',null),
        'author'       => array_map('trim', explode(',', $request->param('authors',null))),
        'type'         => $request->param('availability',array()),
        'source'       => $request->param('source'),
        'dependencies' => array_map('trim',explode(',',$request->param('dependencies',null))),
        'versions'     => $request->param('versions')
    );
    $submission['edit_data'] = $edit_data;
    if($request->param('queue') !== null) {
        $submission['queued'] = time();
    }
    if($request->param('delay') !== null) {
        $submission['delayed'] = time();
    } else {
        unset($submission['delayed']);
    }
    if($request->param('invalid') !== null) {
        $submission['complete'] = time();
    }
    $submission_list[$request->param('id')] = $submission;
    
    $encoded_data = json_encode($submission_list, JSON_UNESCAPED_SLASHES);
    file_put_contents('data/submissions.json', $encoded_data);
    
    $response->redirect('/panel/submission/' . $request->param('id'));
    $response->send();
});

/*
 * panel/queue
 * Queued list
 * @return page
 */

$this->respond('GET', '/queue', function ($request, $response, $service, $app) {
    $final_list = array();
    foreach(array_reverse($service->submissions) as $sub) {
        if(!isset($sub['complete']) && isset($sub['queued'])) {
            if($sub['edit_data']['source'] === '') {
                //TODO: Open source mods that don't have links
                unset($sub['edit_data']['source']);
            }
            $sub['edit_data']['id'] = $sub['id'];
            array_push($final_list, $sub['edit_data']);
        }
    }
    
    $type = array(
        'Universal' => 'Universal',
        'Client' => 'Clientside',
        'Server' => 'Serverside',
        'SSP' => 'SSP',
        'SMP' => 'SMP',
        'LAN' => 'LAN',
        'N/A' => 'N/A'
    );
    
    $service->render('html/panel/queue_list.phtml', array(
        'mods'       => $final_list,
        'mode'       => $service->mode,
        'type'       => $type,
        'forge'      => $service->forge,
        'forgecolor' => $service->forgecolor
    ));
});

/*
 * panel/queue/download
 * Download modlist.json
 * @return page
 */

$this->respond('GET', '/queue/[download|render:type]', function ($request, $response, $service, $app) {
    $updated = array();
    $mod_list = json_decode(file_get_contents('data/modlist.json'), true);
    foreach(array_reverse($service->submissions) as $sub) {
        if(!isset($sub['complete']) && isset($sub['queued'])) {
            if($sub['edit_data']['other'] === '') {
                unset($sub['edit_data']['other']);
            }
            if($sub['edit_data']['source'] === '') {
                //TODO: Open source mods that don't have links
                unset($sub['edit_data']['source']);
            }
            if($sub['edit_data']['mode'] === 'New Mod') {
                array_push($mod_list, $sub['edit_data']);
            } else {
                $updated[$sub['edit_data']['name']] = $sub['edit_data'];
            }
        }
    }
    
    $mod_names = array();
    foreach ($mod_list as &$mod) {
        if(isset($updated[$mod['name']])) {
            $new_data = $updated[$mod['name']];
            if($mod['author'] === $new_data['author']) {
                $mod['link'] = $new_data['link'];
                $mod['desc'] = $new_data['desc'];
                $mod['type'] = $new_data['type'];
                $mod['dependencies'] = $new_data['dependencies'];
                $mod['versions'] = $new_data['versions'];
                if(isset($new_data['source']) && $new_data['source'] !== '') {
                    $mod['source'] = $new_data['source'];
                }
            }
        }
        rsort($mod['versions']);
        array_push($mod_names, preg_replace("/[^a-z0-9]/", '', strtolower($mod['name'])));
    }
    array_multisort($mod_names, SORT_ASC, $mod_list);
    
    $service->partial('html/panel/download.phtml', array('mods' => $mod_list, 'last' => end($mod_list)));
    $response->noCache();
    $response->header('Content-Type', 'application/json');
    if($request->param('type') === 'download') {
        $response->header('Content-Disposition', 'attachment; filename="modlist.json"');
    }
    $response->body(ob_get_clean());
});

/*
 * panel/queue/changelog
 * Generate/add to a changelog based on the queue
 * @return page
 */

$this->respond('GET', '/queue/changelog', function ($request, $response, $service, $app) {
    //TODO: REFACTOR. Surely there's a much simpler way to do this?
    //TODO: JSON changelog
    $queue     = array();
    $changelog = array(
        'updated' => array(),
        'added'   => array()
    );
    $diffs     = array(
        'link'         => 'special',
        'desc'         => 'special',
        'dependencies' => 'normal',
        'type'         => 'normal'
    );
    
    foreach(array_reverse($service->submissions) as $sub) {
        if(!isset($sub['complete']) && isset($sub['queued'])) {
            $mod = $sub['edit_data'];
            if($mod['mode'] === 'New Mod') {
                foreach($mod['versions'] as $version) {
                    $changelog['added'][$version][$mod['name']] = $mod;
                }
            } else {
                $queue[$mod['name']] = $mod;
            }
        }
    }
    
    $modlist = json_decode(file_get_contents('data/modlist.json'), true);
    foreach($modlist as $mod) {
        if(isset($queue[$mod['name']])) {
            $new_data = $queue[$mod['name']];
            if($mod['author'] === $new_data['author']) {
                foreach($new_data['versions'] as $version) {
                    if(in_array($version, $mod['versions'])) {
                        if(isset($new_data['source']) && $new_data['source'] !== '') {
                            if(!isset($mod['source'])) {
                                $new_data['changes']['normal'][] = 'newsource';
                                $new_data['changes']['normal'][] = 'source';
                            } elseif($mod['source'] !== $new_data['source']) {
                                $new_data['changes']['normal'][] = 'source';
                            }
                        }
                        foreach($diffs as $diff => $type) {
                            if($mod[$diff] !== $new_data[$diff]) {
                                $new_data['changes'][$type][] = $diff;
                            }
                        }
                        
                        $changelog['updated'][$version][$mod['name']] = $new_data;
                    } else {
                        $changelog['added'][$version][$mod['name']] = $new_data;
                    }
                }
            }
        }
    }
    
    $changetext = array();
    foreach($changelog['updated'] as $version => $mods) {
        ksort($mods);
        foreach($mods as $mod) {
            $text = "\t*" . 'Updated "' . $mod['name'] . '"';
            if(isset($mod['changes']['special'])) {
                if(isset($mod['changes']['normal'])) {
                    array_unshift($mod['changes']['special'], 'info');
                }
                $special = array_unique($mod['changes']['special']);
                switch(count($special)) {
                    case 1:
                        $text .= ' ' . $special[0];
                        break;
                    case 2:
                        $text .= ' ' . $special[0] . ' and ' . $special[1];
                        break;
                    case 3:
                        $text .= ' ' . $special[0] . ', ' . $special[1] . ' and ' . $special[2];
                        break;
                }
            }
            if(isset($mod['changes']['normal'])) {
                $text .= ': ';
                $changes = array();
                if(in_array('newsource',$mod['changes']['normal'],true)) {
                    $changes[] = 'Added source';
                } elseif(in_array('source',$mod['changes']['normal'],true)) {
                    $changes[] = 'Updated source';
                }
                if(in_array('dependencies',$mod['changes']['normal'],true)) {
                    $changes[] = 'Now "' . $mod['dependencies'][0] . '"';
                }
                if(in_array('type',$mod['changes']['normal'],true)) {
                    $changes[] = 'Now "' . implode(', ',$mod['type']) . '"';
                }
                $text .= implode(', ', $changes);
            }
            if(isset($mod['changes'])) {
                $changetext[$version][] = $text;
            }
        }
    }
    foreach($changelog['added'] as $version => $mods) {
        ksort($mods);
        foreach($mods as $mod) {
            $text = "\t+" . 'Added "' . $mod['name'] . '"';
            $changetext[$version][] = $text;
        }
    }
    
    krsort($changetext);
    
    $service->render('html/panel/changelog.phtml', array(
        'changes' => $changetext,
        'debug' => $changelog['added']
    ));
});

/*
 * panel/queue/complete
 * Mark queue as complete
 * @return redirect
 */

$this->respond('GET', '/queue/complete', function ($request, $response, $service, $app) {
    $sub_list = $service->submissions;
    foreach($sub_list as &$sub) {
        if(!isset($sub['complete']) && isset($sub['queued'])) {
            $sub['complete'] = time();
        }
        //TODO: Archive completed to separate file
    }
    $encoded_data = json_encode($sub_list, JSON_UNESCAPED_SLASHES);
    file_put_contents('data/submissions.json', $encoded_data);
    
    //TODO: Page showing simple statistics
    $response->redirect('/panel/queue');
    $response->send();
});

/*
 * panel/errors
 * @return page
 */

$this->respond('GET', '/errors', function ($request, $response, $service, $app) {
    $service->layout('html/layouts/panel_error.phtml');
    
    $service->render('errors.php');
});

/*
 * panel/bitly/save
 * Save a new bit.ly link
 * @return page
 */

$this->respond('GET', '/bitly/save', function ($request, $response, $service, $app) {
    $response->noCache();
    $response->header('Content-Type', 'application/json');
    
    if(!$service->permissions->canAccess('panel.submission.bitly.shorten')) {
        $response->body('');
        return;
    }
    
    $output = \Modlist\bitly::shorten($request->param('link'));
    
    $response->body(json_encode($output, JSON_UNESCAPED_SLASHES));
});

/*
 * panel/bitly/info
 * Get the info of the bit.ly link
 * @return page
 */

$this->respond('GET', '/bitly/info', function ($request, $response, $service, $app) {
    $response->noCache();
    $response->header('Content-Type', 'application/json');
    
    if(!$service->permissions->canAccess('panel.submission.bitly.expand')) {
        $response->body('');
        return;
    }

    $output = \Modlist\bitly::expand($request->param('link'));
    
    $response->body(json_encode($output, JSON_UNESCAPED_SLASHES));
});