<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('resources/scripts/engine.php');
$page = new Page;
$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
$page->setTitle(end($path));
$page->startBody();

echo '<pre>';
echo file_get_contents('resources/data/changelogs/'.end($path).'.txt',true);
echo '</pre>';

$page->endBody();
echo $page->render('resources/templates/modlist-template.php');