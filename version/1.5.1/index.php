<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
require_once('resources/scripts/tablegen.php');
$page = new Page;
$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
$page->setTitle(end($path));
$page->startBody();


echo tableGenerate(end($path));

$page->endBody();
echo $page->render('resources/templates/modlist-template.php');