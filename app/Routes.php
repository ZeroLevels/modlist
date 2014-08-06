<?php

$router->add('GET', '/', 'HomeController@getIndex');

$router->add('GET', '/versions', 'VersionsController@getIndex');
$router->add('GET', '/versions/[:version]', 'VersionsController@getVersion');

$router->add('GET', '/authors', 'AuthorsController@getIndex');
$router->add('GET', '/authors/[:slug]', 'AuthorsController@getAuthor');

$router->add('GET', '/panel', 'PanelController@getIndex');
$router->add('GET', '/panel/login', 'PanelController@getLogin');
$router->add('GET', '/panel/submissions', 'PanelController@getSubmissionList');
$router->add('GET', '/panel/submissions/[:id]', 'PanelController@getSubmission');


$router->add('GET', '/[banners|credits|faq|history|other:page]', 'StaticController@getPage');

$router->redirect('/version', '/versions');
$router->redirect('/version/[:version]', '/versions/{version}');