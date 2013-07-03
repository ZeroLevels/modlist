<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		
		<title>MCF Mod List - Submission Form</title>
		
		<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="application/javascript" src="../../resources/js/submissioncheck.js" defer></script>
		
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/index.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/common.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/submit.css" />
	</head>
	
<style type="text/css">
.padded {
	font-weight:bold;
}

pre {
	font-family:verdana,arial;
	white-space:pre-wrap;	/* css-3 */
	white-space:-moz-pre-wrap;	/* Mozilla, since 1999 */
	white-space:-pre-wrap;	/* Opera 4-6 */
	white-space:-o-pre-wrap;	/* Opera 7 */
	word-wrap: break-word;	/* Internet Explorer 5.5+ */
}
</style>

	<body id="submission_form">
		<center>
		<div class="nav">
		<ul id="list-nav" align="center">
			<li><a href="/">Home</a></li>
			<li><a href="/credits/">Credits</a></li>
			<li><a href="/latest/">Current List</a></li>
			<li><a href="/banners/">Banners</a></li>
		</ul>
		</div>
		
		<br/>
	
<div class="listcontain">
<form id="listcreator" action="submit.php" method="POST">
<h1>MCF Mod List - Entry Suggestions</h1>
<p>Request for a mod to be added to the list. ** = Required for all submissions. * = Required for new mods.</p>
<label>Status**
<span class="small" id="compattext">Are you submitting a new mod not on the list yet?</span>
</label>
<fieldset class="radiocontain">
<input id="newmod" type="radio" name="new" value=true checked="checked"><label for="newmod">New Mod</label>
<input id="oldmod" type="radio" name="new" value=false><label for="oldmod">Update</label>
</fieldset>
<label>Mod Name**
<span class="small" id="nametext">The name of the mod</span>
</label>
<input type="text" id="name" name="name" /></br>
<label>Link*
<span class="small" id="linktext">Enter the full URL to the mod's page here.</span>
</label>
<input type="url" id="link" name="link" /></br>
<label>Description*
<span class="small">Provide a (preferably concise) description of what the mod does here.</span>
</label>
<textarea id="desc" name="desc"></textarea></br>
<label>Mod Author*
<span class="small" id="authortext">Enter the username of the mod's author here.</span>
</label>
<input type="text" id="author" name="author" /></br>
<label>Forge Compatibility*
<span class="small" id="compattext">Is it compatible with Forge?</span>
</label>
<fieldset class="radiocontain">
<input id="fr" type="radio" name="forge" value="Forge Required" title="The mod must use Forge" checked="checked"><label for="fr" title="The mod must use Forge">Required</label>
<input id="fc" type="radio" name="forge" value="Forge Compatible" title="The mod can use Forge (usually ModLoader mod)"><label for="fc" title="The mod can use Forge (usually ModLoader mod)">Compatible</label>
<input id="nfc" type="radio" name="forge" value="Not Forge Compatible" title="The mod cannot be used with Forge"><label for="nfc" title="The mod cannot be used with Forge">Not Compatible</label>
</fieldset>
<label>Availability*
<span class="small">Choose (if you're sure) whether or not the mod is available for singleplayer, multiplayer, etc...</span>
</label>
<fieldset class="checkcontain">
<input id="ssp" type="checkbox" name="availability[]" value="SSP" title="Singleplayer"><label for="ssp" title="Singleplayer">SSP</label>
<input id="smp" type="checkbox" name="availability[]" value="SMP" title="Multiplayer"><label for="smp" title="Multiplayer">SMP</label>
<input id="lan" type="checkbox" name="availability[]" value="LAN" title="Local Multiplayer"><label for="lan" title="Local Multiplayer">LAN</label>
<input id="universal" type="checkbox" name="availability[]" value="Universal" title="Same file for client and server"><label for="universal" title="Same file for client and server">Universal</label>
<input id="client" type="checkbox" name="availability[]" value="Client" title="Installed on client only, but works on servers (eg. Minimaps)"><label for="client" title="Installed on client only, but works on servers (eg. Minimaps)">Clientside</label>
<input id="server" type="checkbox" name="availability[]" value="Server" title="Installed only on server, works for anyone who joins (eg. Additional Commands)"><label for="server" title="Installed only on server, works for anyone who joins (eg. Additional Commands)">Serverside</label>
</fieldset></br>
<label>Versions**
<span class="small">What Minecraft version are you submitting this for?</span>
</label>
<fieldset class="checkcontain">
<input id="ver161" type="checkbox" name="version[]" value="1.6.1"><label for="ver161">1.6.1</label>
<input id="ver152" type="checkbox" name="version[]" value="1.5.2"><label for="ver152">1.5.2</label>
<input id="ver151" type="checkbox" name="version[]" value="1.5.1"><label for="ver151">1.5.1</label>
<input id="ver150" type="checkbox" name="version[]" value="1.5.0"><label for="ver150">1.5</label>
<input id="ver147" type="checkbox" name="version[]" value="1.4.7"><label for="ver147">1.4.7/1.4.6</label>
<input id="ver145" type="checkbox" name="version[]" value="1.4.5"><label for="ver145">1.4.5/1.4.4</label>
<input id="ver142" type="checkbox" name="version[]" value="1.4.2"><label for="ver142">1.4.2</label>
<input id="ver132" type="checkbox" name="version[]" value="1.3.2"><label for="ver132">1.3.2</label>
</fieldset></br>
<label>Other
<span class="small">Anything else you want to add?</span>
</label>
<textarea id="other" name="other"></textarea></br>
<label>Human Check**
<span class="small">You're not a bot, right?</span>
</label>
<fieldset class="checkcontain">
<input id="notbot" type="checkbox" name="notbot" value=true><label for="notbot">I'm human</label>
</fieldset>
<input id="submit" type="submit" value="Submit" />
<input id="reset" type="reset" value="Reset" />
</form>
</div>

	
	</body>

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
</html>