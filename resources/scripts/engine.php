<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
class Page {
	private $title, $stylesheets=array(), $javascripts=array(), $lastjavascripts=array(), $prefetches=array(), $body;
	
	function Page() {
		//$this->addCSS('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css');
		$this->addCSS('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css');
		$this->addCSS('//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css');
		$this->addCSS('/resources/stylesheets/modlist-blue.css');
		$this->prefetchDomain('//www.google-analytics.com');
		//$this->prefetchDomain('//ssl.google-analytics.com');
		$this->prefetchDomain('//ajax.googleapis.com/');
		$this->prefetchDomain('//cdnjs.cloudflare.com/');
		$this->prefetchDomain('//bit.ly/');
		$this->prefetchDomain('//www.minecraftforum.net/');
		$this->addJavascript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
		$this->addJavascript('//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js');
		$this->addJavascript('/resources/js/jquery.stickytableheaders.min.js');
		$this->addLastJavascript('/resources/js/tooltips.js');
	}
	
	function setTitle($title) {
		$this->title = $title;
	}
	
	function addCSS($path) {
		$this->stylesheets[] = $path;
	}
	
	function addJavascript($path) {
		$this->javascripts[] = $path;
	}
	
	function addLastJavascript($path) {
		$this->lastjavascripts[] = $path;
	}
	
	function prefetchDomain($path) {
		$this->prefetches[] = $path;
	}
	
	function startBody() {
		ob_start();
	}
	
	function endBody() {
		$this->body = ob_get_clean();
	}
	
	function render($path) {
		ob_start();
		include($path);
		return ob_get_clean();
	}
	
}