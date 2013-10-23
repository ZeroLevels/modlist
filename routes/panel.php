<?php

/*
 * Attach layout
 */
$this->respond(function ($request, $response, $service, $app) {
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