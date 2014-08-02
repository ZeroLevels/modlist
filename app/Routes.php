<?php

$router->add('GET', '/', 'HomeController@getIndex');
$router->add('GET', '/versions', 'VersionsController@getIndex');
$router->add('GET', '/versions/[:version]', 'VersionsController@getVersion');