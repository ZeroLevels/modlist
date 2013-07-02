<?php
$version="1.6.1";
include('../../resources/scripts/jsontable.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>MCF Mod List - <?php echo $version; ?></title>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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
	<li class="h"><a>Current List</a></li>
	<li><a href="/banners/">Banners</a></li>

	<![if !IE]>
	<br/><li class="nh"><a href="/resources/igml2/" class="igml">Ingame Mod List</a></li>
	<![endif]>

	<!--[if IE]>
	<li><a href="/resources/igml2/">Ingame Mod List</a></li>
	<![endif]-->
</ul>
<br/>
<hr width="99%" size="6" noshade>
<p class="padded">
	If you know of a mod that's not on this list, please let us know. There are three ways to inform us of new mods. If you have an account on the Minecraft Forums, leave a post in the suggestion thread <a href="http://bit.ly/13fsFlm" class="ns" title="The original Minecraft Forums post for the mod list">here</a>, or drop by the <span style="color: #0481ff">#mcf_modlist</span> IRC channel on <span style="color: purple">EsperNet</span>. If you wish to remain anonymous, you may use the submission form <a href="/list/submit/">here</a>. Please check to see if the mod is on the list already before suggesting.
	<br/>
	<br/>
	If there's an icon in the "Info" column, hover over it to read the description for that mod.
</p>
<table class="listnav nav major">
	<thead>
		<th colspan="3" style="color: black">List Version Navigation</th>
	</thead>
	<tbody>
		<tr class="c">
			<td class="nh" onclick="window.location.href='../1.4/'"><a href="../1.4/">1.4</a></td>
			<td class="nh" onclick="window.location.href='../1.5/'"><a href="../1.5/">1.5</a></td>
			<td class="h">1.6.1</td>
		</tr>
	</tbody>
</table>

<table class="minor listnav nav">
	<tr>
		<td class="h">1.6.1</td>
	</tr>
</table>
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