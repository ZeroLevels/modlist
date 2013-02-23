<!doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Mod List</title>
	<link rel="stylesheet" type="text/css" href="resources/stylesheets/index.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="resources/stylesheets/nav.css" media="screen" />
  </head>
  
<body>

<center>
<img src="resources/images/mcmodlist.png" width="471" height="129" alt="MCModList"/><br>
<table class="nav">
	<tr>
		<td class="h">Home</td>
		<td class="nh"><a href="latest/">Current List</a></td>
		<td class="nh"><a href="credits/">Credits</a></td>
	</tr>
</table>

<p class="n">The goal is to list all the mods for the current version of Minecraft. This doesn't necessarily mean that the old lists won't be updated, but they're not a priority.<br/><br/>Select Minecraft version to display mods for below.</p>


<p class="select">
	<span class="section">Current:</span><br/>
	<span style="text-size:30px; font-style:italic">Last Updated: <?php $content = file('versions/changelog.txt'); echo $content[0]; ?></span><br/>
		<span class="selection"><a href="versions/1.4.6_1.4.7.php">1.4.6/1.4.7 List</a></span><br/>
		<span class="selection"><a href="versions/changelog.txt">Changelog</a></span><br/><br/>
		
	<span class="section">Older:</span><br>
		<span class="selection">1.4.4/1.4.5 List</span><br>
		<span class="selection">1.4.2 List</span><br>
		<span class="selection">1.3.2 List</span>
</p></center>


</body>