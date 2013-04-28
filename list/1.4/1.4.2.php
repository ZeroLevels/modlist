<?php
$version="1.4.2";
include('../../resources/scripts/jsontable.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>MCF Mod List - <?php echo $version; ?></title>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../resources/js/tableSearch.js">/*Search script courtesy of Vattic*/</script>
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/modlist.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/common.css" media="screen" />
</head>
<body>
<p>
	<img src="../../resources/images/<?php echo $version; ?>.png" width="130" height="58"/><br/>
	<span style="font-size:200%">Last Updated: <?php $content = file('changelog_'.$version.'.html'); echo $content[1]; ?></span><br/><a href="changelog_<?php echo $version; ?>.html" class="ns">Click here</a> to view the changelog.
</p>
<ul id="list-nav">
	<li><a href="/">Home</a></li>
	<li><a href="/credits/">Credits</a></li>
	<li><a href="/latest/">Current List</a></li>
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
		<th colspan="2" style="color: black">List Version Navigation</th>
	</thead>
	<tbody>
		<tr class="c">
			<td class="h">1.4</td>
			<td class="nh" onclick="window.location.href='../1.5/'"><a href="../1.5/">1.5</a></td>
		</tr>
	</tbody>
</table>

<table class="minor listnav nav">
	<tr>
		<td class="h">1.4.2</td>
		<td class="nh" onclick="window.location.href='1.4.4_1.4.5.php'"><a href="1.4.4_1.4.5.php">1.4.4/1.4.5</td>
		<td class="nh" onclick="window.location.href='1.4.6_1.4.7.php'"><a href="1.4.6_1.4.7.php">1.4.6/1.4.7</a></td>
	</tr>
</table>

<table cellspacing="0" class="modlist" id="example">
	<thead>
		<th style="min-width:262px">Mod Name<br/><input style="display:none" class="searchEmpty" /></th>
		<th style="min-width: 50px; max-width:51px">Info</th>
		<th>Author</th>
		<th>Availability</th>
		<th>Compatibility with Forge</th>
	</thead>

	<tbody>
	<?php jsonTable($version); ?>
	</tbody>
</table>
<br/><br/><br/>

<div class="footer count">
	Mod count: <b><?php echo count($mods); ?></b>
</div>

<div class="API">
	<a href="http://bit.ly/forge-dl">Forge</a> |
	<a href="http://bit.ly/TGlcZA">GuiAPI</a> | 
	<a href="http://bit.ly/WnFEuT">LiteLoader</a> | 
	<a href="http://bit.ly/WnSwBj">ModLoader</a> | 
	<a href="http://bit.ly/WnR9CL">Player API</a> | 
	<a href="http://bit.ly/13U9b8y">Render Player API</a>
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