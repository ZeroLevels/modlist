<?php
date_default_timezone_set('UTC');
function readJSON($filename) {
	if(!isset($GLOBALS[$filename])) {
		$JSONfile = recode(file_get_contents($filename));
		$GLOBALS[$filename] = json_decode($JSONfile);
	}
	return $GLOBALS[$filename];
}
function recode($strIn) {
	return mb_convert_encoding($strIn, 'UTF-8', 'auto');
}

$modlistfile = '../modlist.json';
$submissions = array_reverse(readJSON('../../panel/secrets/submissions.json'));
$count = 0;
foreach($submissions as &$mod) {
	if($mod->timestamp > filemtime($modlistfile) ||
		!isset($mod->complete))
		$count++;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	
	<title>MCF Mod List - Requested Submissions</title>
	
	<script type="application/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="application/javascript" src="../../resources/js/submissioncheck.js" defer></script>
	
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/nav.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/index.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/common.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../resources/stylesheets/submit.css" />
</head>
<style type="text/css">
table {
	background: #222222;
	border: 1px solid #afafaf;
	padding: 0;
	margin: 0;
	border-spacing: 1px;
}
th {
	border-bottom: 1px solid #8a8a8a;
	text-align: center;
	font-weight: bold;
	background: #444444;
}
tr:hover {
	background: #555555;
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
<h1>MCF Mod List - List of Requests</h1>
<p>Below is the list of mods requested since the last modlist update (<?php echo date ("F d Y, H:i:s", filemtime($modlistfile)); ?> UTC Time), listed from most recent to oldest.</br>
The list will not show older submissions that are in the final stage of being added.</br>
Our workflow for mod requests is as follows:</br>
<ol style="width:600px; text-align: left;">
<li>Players/Modders request a mod to be added, filtered by the system</li>
<li>Request is added to queue</li>
<li>ZeroLevels and GrygrFlzr are notified of the request</li>
<li>Request is worked on by ZeroLevels or GrygrFlzr.</li>
<li>Request is competed and added to queue (Final Stage)</li>
<li>All requests that are in the queue will be bulk-added to the modlist</li>
</ol>
For technical reasons we cannot add mod requests in realtime and have to do them in bulk.</br>
Showing <?php echo $count; ?> requests out of a total of <?php echo count($submissions); ?> requests.</p>
<table>
<tr>
<th>Request Type</th>
<th>Mod Name</th>
<th>Author</th>
<th>Versions requested</th>
<th>Requested Time (UTC)</th>
</tr>
<?php
foreach($submissions as &$mod) {
	if($mod->timestamp > filemtime($modlistfile) ||
		!isset($mod->complete)) {
		echo '<tr>';
		echo '<td>'.$mod->mode.'</td>';
		if($mod->mode == "New Mod")
			echo '<td><a href="'.$mod->link.'">'.$mod->name.'</a></td>';
		else
			echo '<td>'.$mod->name.'</td>';
		if(isset($mod->author))
			echo '<td>'.$mod->author.'</td>';
		else
			echo '<td></td>';
		echo '<td>'.implode(', ',$mod->versions).'</td>';
		echo '<td>'.date ("F d Y, H:i:s", $mod->timestamp).'</td>';
		echo '</tr>';
	}
}
?>
</table>
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