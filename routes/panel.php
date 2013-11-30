<?php
session_start();

/*
 * Attach layout
 */
$this->respond(function ($request, $response, $service, $app) {
    $service->layout('html/layouts/panel.phtml');
});

/*
 * panel/*
 * Login check
 * @return redirect
 */

$this->respond('!@^/login', function ($request, $response, $service, $app) {
    if(!isset($_SESSION['access_token'])) {
        $response->redirect('/panel/login');
        $response->send();
    }
});

/*
 * panel/
 * Panel Root
 * @return redirect
 */

$this->respond('GET', '/', function ($request, $response, $service, $app) {
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
        $_SESSION['access_token'] = $token_data['access_token'];
        
        //Build request again
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
        
        //Redirect to home page
        $response->redirect('/panel/home');
        $response->send();
    } else {
        //A third party has tampered with the authentication
        $response->body('Someone tried to tamper with the request - it is recommended to change your password.');
    }
});

$this->respond('GET', '/logout', function ($request, $response, $service, $app) {
    session_destroy();
    $response->redirect('/panel/login');
    $response->send();
});

$this->respond('GET', '/home', function ($request, $response, $service, $app) {
    $service->render('html/panel/home.phtml');
});

/*
 * panel/submission
 * Submission list
 * @return page
 */

$this->respond('GET', '/submission', function ($request, $response, $service, $app) {
    $sub_list = json_decode(file_get_contents('data/submissions.json'), true);
    
    $mode = array(
        'New Mod' => 'info',
        'Update Request' => 'primary'
    );
    
    $forge = array(
        'required' => 'Forge Required',
        'compatible' => 'Forge Compatible',
        'notcompatible' => 'Not Forge Compatible'
    );
    
    $forgecolor = array(
        'required' => 'success',
        'compatible' => 'primary',
        'notcompatible' => 'danger'
    );
    
    $final_list = array();
    foreach($sub_list as $sub) {
        if(!isset($sub['complete'])) {
            array_push($final_list, $sub);
        }
    }
    $final_list = array_reverse($final_list);
    
    $service->render('html/panel/submission_list.phtml', array(
        'submissions' => $final_list,
        'mode'       => $mode,
        'forge'       => $forge,
        'forgecolor'  => $forgecolor
    ));
});