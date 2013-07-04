<?php
$version="1.3.2";
$cache = '../../panel/secrets/'.$version.'_cached.html';
if(file_exists($cache) &&
	(filemtime($cache) > filemtime('../modlist.json'))
	) {
	echo file_get_contents($cache);
	exit();
} else {
ob_start();
include('../../resources/scripts/jsontable.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>MCF Mod List - <?php echo $version; ?></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
	<script type="text/javascript" src="../../resources/js/betterTableSearch.js" defer>/*Search script courtesy of GrygrFlzr*/</script>
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/modlist.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/common.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/cloudy.css" media="screen" />
</head>
<body>

<div id="bannerTop" title="Developer of ComputerCraft along with Dan200 - a mod for Minecraft">
	<br/><a class="help" href="http://cloudhunter.co.uk/post/51553893017/an-appeal-please-help-me-rescue-my-daughter">&nbsp;Please help Cloudy rescue his daughter!&nbsp;</a>
	<br/>Visit the above URL to read the details. Please consider making a donation to <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3NL5NDTHGF4FW">Save Vanessa!</a><br/>Keep up to date with the situation by checking out <a href="https://twitter.com/Cloudhunter">Cloudy's Twitter</a> - <a href="https://twitter.com/search?q=%23GetCloudysDaughter&src=hash">#getCloudysdaughter</a>
</div>

<p>
	<img src="../../resources/images/<?php echo $version; ?>.png" width="128" height="58"/><br/>
	<span style="font-size:200%">Last Updated: <?php $content = file('changelog_'.$version.'.html'); echo $content[1]; ?></span><br/><a href="changelog_<?php echo $version; ?>.html" class="ns">Click here</a> to view the changelog.
</p>
<ul id="list-nav">
	<li><a href="/">Home</a></li>
	<li><a href="/credits/">Credits</a></li>
	<li><a href="/latest/">Current List</a></li>
	<li><a href="/banners/">Banners</a></li>

	<![if !IE]>
	<br/><li class="nh"><a href="/resources/igml3/" class="igml">Ingame Mod List</a></li>
	<![endif]>

	<!--[if IE]>
	<li><a href="/resources/igml2/">Ingame Mod List</a></li>
	<![endif]-->
</ul>
<br/>
<hr width="99%" size="6" noshade>
<p class="padded" style="font-size:2em">This list (<?php echo str_replace('_','/',$version); ?>) will no longer be updated. More recent lists are the priority. <a href="/latest/" class="ns">Click here</a> to the see the latest list.</p>
<?php listVersion($version); ?>
<table cellspacing="0" class="modlist" id="example">
	<thead>
		<?php beginTable(); ?>
	</thead>

	<tbody>
		<?php $modcount = jsonTable($version); ?>
	</tbody>
</table>
<br/><br/><br/>

<div class="footer count">
	Mod count: <b><?php echo $modcount; ?></b>
</div>

<div class="API">
	<?php showAPI($version); ?>
</div>

<!--Google Analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39433845-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<?php
file_put_contents($cache, ob_get_contents());
ob_end_flush();
}
?>